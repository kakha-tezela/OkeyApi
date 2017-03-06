<?php

namespace App\Http\Controllers\Admin;

use App\Personal;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Facades\Datatables;

class PersonalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $personal = Personal::select(['id', 'name', 'email']);
            return Datatables::of($personal)
                ->addColumn('role', function ($user) {
                    return $user->roles->first()->name;
                })
                ->addColumn('action', function ($user) {
                    $editUrl = action('Admin\PersonalsController@edit', $user->id);
                    return '<a href="' . $editUrl . '" data-toggle="tooltip" data-placement="top" class="edit"><i class="fa fa-pencil text-warning"></i></a>
                    &nbsp; &nbsp;<a href="javascript:" data-toggle="modal" data-id="' . $user->id . '" data-target="#modal-17"><i class="fa fa-trash-o"></i></a>';
                })
                ->make(true);
        }

        return view('admin.personal.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('admin.personal.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, Personal::$rules, Personal::$messages);
        $password = Hash::make($request->password);
        $person = Personal::create($request->all());
        $person->password = $password;
        $person->save();
        $person->roles()->attach($request->role_id);
        $request->session()->flash('status', $person->name.' წარმატებით შეიქმნა');
        return redirect()->action('Admin\PersonalsController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Personal::findOrFail($id);
        $roles = Role::all();

        return view('admin.personal.edit', compact(['item', 'roles']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, Personal::$updateRules, Personal::$messages);


        $item = Personal::findOrFail($id);
        $item->update([
            'name' =>   $request->name,
            'email' =>  $request->email
        ]);

        if (strlen($request->password)>5) {
            $password = Hash::make($request->password);
            $item->password = $password;
            $item->save();
        }


        $item->roles()->sync([$request->role_id]);
        $request->session()->flash('status', $item->name.' წარმატებით განახლდა');
        return redirect()->action('Admin\PersonalsController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $user = Personal::findOrFail($id);
        $user->delete();
        $request->session()->flash('status', $user->name.' წარმატებით წაიშალა');
        return redirect()->action('Admin\PersonalsController@index');
    }
}

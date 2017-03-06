<?php

namespace App\Http\Controllers\Admin;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;

class RoleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $role = Role::select(['id', 'description', 'name']);
            return Datatables::of($role)
                ->addColumn('action', function ($role) {
                    $editUrl = action('Admin\RoleController@edit', $role->id);
                    return '<a href="' . $editUrl . '" data-toggle="tooltip" data-placement="top" class="edit"><i class="fa fa-pencil text-warning"></i></a>
                    &nbsp; &nbsp;<a href="javascript:" data-toggle="modal" data-id="' . $role->id . '" data-target="#modal-17"><i class="fa fa-trash-o"></i></a>';
                })
                ->make(true);
        }

        return view('admin.role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Role::$rules, Role::$messages);

        $role = Role::create($request->all());


        $role->permissions()->attach($request->permissions);

        $request->session()->flash('status','როლი წარმატებით შეიქმნა');

        return redirect()->action('Admin\RoleController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Role::findOrFail($id);

        return view('admin.permission.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, Role::$rules, Role::$messages);
        $item = Role::findOrFail($id);
        $item->update($request->all());
        $request->session()->flash('status', $item->name.' როლი წარმატებით განახლდა');
        return redirect()->action('Admin\RoleController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {

        $role = Role::findOrFail($id);

        $role->delete();

        $request->session()->flash('status', $role->name.' როლი წარმატებით წაიშალა');
        return redirect()->action('Admin\RoleController@index');
    }
}

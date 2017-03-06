<?php

namespace App\Http\Controllers\Admin;

use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $permission = Permission::select(['id', 'description', 'name']);
            return Datatables::of($permission)
                ->addColumn('action', function ($permission) {
                    $editUrl = action('Admin\PermissionController@edit', $permission->id);

                    return '<a href="' . $editUrl . '" data-toggle="tooltip" data-placement="top" class="edit"><i class="fa fa-pencil text-warning"></i></a>
                    &nbsp; &nbsp;<a href="javascript:" data-toggle="modal" data-id="' . $permission->id . '" data-target="#modal-17"><i class="fa fa-trash-o"></i></a>';
                })
                ->make(true);
        }


        return view('admin.permission.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Permission::$rules, Permission::$messages);

        Permission::create($request->all());

        return redirect()->action('Admin\PermissionController@index');
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
        $item = Permission::findOrFail($id);

        return view('admin.permission.edit', compact('item'));
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
        $this->validate($request, Permission::$rules, Permission::$messages);

        $item = Permission::findOrFail($id);
        $item->update($request->all());
        return redirect()->action('Admin\PermissionController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $perms = Permission::findOrFail($id);

        $perms->forceDelete();

        $request->session()->flash('status', $perms->name.'  წარმატებით წაიშალა');
        return redirect()->action('Admin\PermissionController@index');
    }
}

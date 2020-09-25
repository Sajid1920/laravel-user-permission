<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Role;
use Facades\App\Repositories\PermissionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('view_role'), 403);

        $roles = Role::all();
        $permissions = PermissionRepository::all();

        return view('admin.roles.index', compact('roles', 'permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('create_role'), 403);

        return view('admin.roles.create')->withPermissions(PermissionRepository::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\RoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        abort_if(Gate::denies('create_role'), 403);

        if (Role::create($request->validated())) {
            return redirect()->route('admin.roles.index')->with(['status' => true, 'message' => 'Role Added!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $role = Role::find($id);

        return view('admin.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('edit_role'), 403);

        $role = Role::findOrFail($id);
        return view('admin.roles.edit', compact('role'))->withPermissions(PermissionRepository::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\RoleRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {
        abort_if(Gate::denies('edit_role'), 403);

        if (Role::findOrFail($id)->update($request->validated())) {
            return back()->with(['status' => true, 'message' => 'Role Updated!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('delete_role'), 403);

        if (Role::findOrFail($id)->delete()) {
            return back()->with(['status' => true, 'message' => 'Role Deleted!']);
        }
    }
}

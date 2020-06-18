<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    public function index()
    {
        Gate::authorize('haveaccess','role.index');
        $roles=Role::all();
        return view('role.index',compact('roles'));
    }

    public function create()
    {
        Gate::authorize('haveaccess','role.create');
        $permissions=Permission::Get();
        return view ('role.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        Gate::authorize('haveaccess','role.create');

        $request->validate([
            'name'          => 'required|max:20|unique:roles,name',
            'slug'          => 'required|max:20|unique:roles,slug',
            'full-access'   => 'required|in:yes,no',
        ]);
        $role=Role::create($request->all());

        //if ($request->get('permission')) {
            //return $request->all();
            $role->permissions()->sync($request->get('permission'));
        //}
        return redirect()->route('role.index')->with('status_success','Role saved successfully');
    }

    public function show(Role $role)
    {
        Gate::authorize('haveaccess','role.show');
       // $permissions=Permission::All();
        $permission_role=[];
        foreach($role->permissions as $permission){
            $permission_role[]=$permission->id;
        }
        $permissions = Permission::get();
        return view ('role.view', compact('permissions','role', 'permission_role'));
    }

    public function edit(Role $role)
    {
        Gate::authorize('haveaccess','role.edit');
        $permission_role=[];

        foreach($role->permissions as $permission){
            $permission_role[]=$permission->id;
        }
        $permissions=Permission::get();
        return view ('role.edit', compact('permissions','role', 'permission_role'));
    }

    public function update(Request $request, Role $role)
    {
        Gate::authorize('haveaccess','role.edit');
        $request->validate([
            'name'          => 'required|max:20|unique:roles,name,'.$role->id,
            'slug'          => 'required|max:20|unique:roles,slug,'.$role->id,
            'full-access'   => 'required|in:yes,no',
        ]);

        $role->update($request->all());
        $role->permissions()->sync($request->get('permission'));
        return redirect()->route('role.index')->with('status_success','Role updated successfully');
    }

    public function destroy(Role $role)
    {
        Gate::authorize('haveaccess','role.destroy');
        $role->delete();
        return redirect()->route('role.index')->with('status_success','Role successfully removed');
    }
}

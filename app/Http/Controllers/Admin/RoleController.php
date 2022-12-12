<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::whereNotIn('name', ['admin'])->get();
        return view('admin.roles.index', compact("roles"));
    }

    public function create()
    {
        return view("admin.roles.create");
    }

    public function store(Request $request)
    {
        $validate = $request->validate(['name' => ['required', 'min:3']]);
        Role::create($validate);
        return to_route('admin.roles.index')->with("message", "Role Created Success");
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view("admin.roles.edit", compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $validate = $request->validate(['name' => 'required']);
        $role->update($validate);
        return to_route("admin.roles.index")->with("message", "Role Updated Success");
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return back()->with("message", "Role Deleted");
    }

    public function givePermission(Request $request, Role $role)
    {
        if ($role->hasPermissionTo($request->permission)) {
            return back()->with("message", "Permission exists.");
        }
        $role->givePermissionTo($request->permission);
        return back()->with("message", "Permission added.");
    }

    public function revokePermission(Role $role, Permission $permission)
    {
        if ($role->hasPermissionTo($permission)) {
            $role->revokePermissionTo($permission);
            return back()->with("message", "Permission revoked.");
        }
        return back()->with("message", "Permission not exists.");
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view("admin.permissions.create");
    }

    public function store(Request $request)
    {
        $validate = $request->validate(['name' => ['required', 'min:3']]);
        Permission::create($validate);
        return to_route('admin.permissions.index');
    }

    public function edit(Permission $permission)
    {
        return view("admin.permissions.edit", compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $validate = $request->validate(['name' => 'required']);
        $permission->update($validate);
        return to_route("admin.permissions.index");
    }
}

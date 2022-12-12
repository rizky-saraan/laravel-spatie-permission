<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
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
        return to_route('admin.roles.index');
    }
}

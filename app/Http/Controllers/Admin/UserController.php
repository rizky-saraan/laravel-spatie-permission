<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact("users"));
    }

    public function create()
    {
        # code...
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with("message", "User Deleted");
    }
}

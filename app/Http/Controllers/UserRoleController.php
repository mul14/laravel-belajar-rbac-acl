<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function index(User $user)
    {
        $roles = Role::all();

        return view('users.roles.index', compact('roles', 'user'));
    }

    public function update(User $user, Request $request)
    {
        $user->roles()->sync($request->role ?? []);

        return back()->withStatus('Success');
    }
}

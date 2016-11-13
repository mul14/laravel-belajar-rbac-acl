<?php

namespace App\Http\Controllers;

use App\Role;
use App\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::paginate();

        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|alphanum|unique:roles',
            'label' => 'required',
        ]);

        Role::create($request->only('name', 'label'));

        return back()->withStatus('Success');
    }

    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    public function update(Role $role, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|alphanum|unique:roles',
            'label' => 'required',
        ]);

        $role->update($request->only('name', 'label'));

        return back()->withStatus('Success');
    }
}

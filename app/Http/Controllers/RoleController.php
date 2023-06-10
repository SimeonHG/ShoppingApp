<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:roles',
        ]);

        Role::create($validatedData);

        return redirect()->route('roles.index')->with('success', 'Role created successfully');
    }


    public function assign(Role $role)
    {
        $user = User::find(request('user'));
        $user->assignRole($role);

        return redirect()->route('roles.show', $role)->with('success', 'Role assigned to user successfully.');
    }


    public function destroy(Role $role)
    {
        // Check if the authenticated user has the 'access_admin_panel' permission
        if (Gate::denies('access_admin_panel')) {
            return redirect()->back()->with('error', 'You do not have permission to delete roles.');
        }

        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully');
    }

    public function show(Role $role)
    {
        $users = User::all();

        return view('roles.show', compact('role', 'users'));
    }


}

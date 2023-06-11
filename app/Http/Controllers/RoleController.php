<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware(function ($request, $next) {
    //         if (Gate::denies('access_admin_panel')) {
    //             abort("403");
    //         }

    //         return $next($request);
    //     });
    // }

    public function index()
    {
        $roles = Role::with('permissions')->get();
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
            'permissions' => 'array',
        ]);

        $role = Role::create($validatedData);

        if ($request->has('permissions')) {
            $permissions = Permission::whereIn('id', $request->input('permissions'))->get();
            $role->permissions()->sync($permissions);
        }

        return redirect()->route('roles.index')->with('success', 'Role created successfully');
    }



    public function assign(Role $role)
    {
        $user = User::find(request('user'));
        $user->assignRole($role);

        return redirect()->route('roles.show', $role)->with('success', 'Role assigned to user successfully.');
    }

    public function unassign(Role $role)
    {
        $user = User::find(request('user'));
        $user->removeRole($role);

        return redirect()->route('roles.show', $role)->with('success', 'Role unassigned from user successfully.');
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

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Shop;
use App\Models\Bank;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $user->syncRoles($request->input('roles', []));
        return redirect()->route('users.index')->with('success', 'Roles assigned successfully');
    }

    public function addBank(Request $request)
    {
        $request->validate([
            'bank_name' => 'required',
            'bank_account_number' => 'required',
        ]);

        $user = Auth::user();

        $bankData = $request->only(['bank_name', 'bank_account_number']);

        $bank = $user->banks()->create($bankData);

        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    public function createBank()
    {
        return view('banks.create');
    }

}

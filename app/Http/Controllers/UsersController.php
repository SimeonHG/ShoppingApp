<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UsersController extends Controller
{
    public function index(){
        return view('users.users');
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required'
        ]);

        User::where('id', $id)
        ->update([
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'address' => $request->input('address'),
            'gender' => $request->input('gender'),
            'age' => $request->input('age'),
            'email' => $request->input('email'),
        ]);
    
        return redirect('/users')->with('message', 'User Updated!');
    }
}

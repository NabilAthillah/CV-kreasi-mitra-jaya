<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function edit(User $user)
{
    return view('admin.user.edit', compact('user'));
}

public function update(Request $request, User $user)
{
    $this->validate($request, [
        'name'     => 'required',
        'email'   => 'required',
        'role'   => 'required'
    ]);

    $user = User::findOrFail($user->id);

        $user->update([
            'name'     => $request->name,
            'email'   => $request->email,
            'role'   => $request->role,
        ]);

    if($user){
        return redirect()->route('user.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }else{
        return redirect()->route('user.edit')->with(['error' => 'Data Gagal Diupdate!']);
    }
}
}

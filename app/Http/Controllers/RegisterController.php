<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;

class RegisterController extends Controller
{
    public function register()
    {
        return view('register');
    }
    
    public function actionregister(Request $request)
    {
        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        Session::flash('message', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan email dan password.');
        return redirect('login');
    }
}

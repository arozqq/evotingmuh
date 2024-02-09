<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request)
    {   
        if (Auth::check()) {
            return redirect('/');
        }else{
            return view('auth.login');
        }
    }

    public function cek_login(Request $request)
    {   
        $request->validate([
            'username' => 'required|min:5',
            'password' => 'required'
        ], [
            'username.required' => 'Kolom Username harus diisi',
            'username.min' => 'Kolom username harus memiliki panjang minimal 5 karakter',
            'password.required' => 'Kolom Password wajib diisi',
        ]);

        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ];
        

        if(Auth::attempt($data)) {
            return redirect('/');
        } else {
            return back()->with('error', 'Username atau Password salah');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}

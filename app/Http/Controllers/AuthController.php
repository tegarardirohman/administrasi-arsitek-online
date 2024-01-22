<?php

namespace App\Http\Controllers;

use App\Models\tb_akun;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function Login_action(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            // return redirect()->intended('/cekRole');
            return redirect('cekRole');
        }

        return back()->withErrors([
            'password' => 'Wrong username or password',
        ]);
        
    }

    public function Role()
    {
        if(Auth::user()->level == 'pelanggan'){
            return redirect('/');
        }elseif(Auth::user()->level == 'admin'){
            return redirect('/admin');
        }elseif(Auth::user()->level == 'cs'){
            return redirect('/cs');
        }else{  
            return redirect('/masuk');
        }
    }

    public function Daftar()
    {
        return view('daftar');
    }

    public function Daftar_action(Request $request)
    {
      

        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'telepon' => 'required|min:10|regex:/^([0-9\s\-\+\(\)]*)$/|unique:App\Models\tb_akun,telp',
            'gender' => 'required|max:1',
            'email' => 'required|unique:App\Models\tb_akun,email',
            'password' => 'required|confirmed|min:6'
        ]);

        $user = tb_akun::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nama' => $request->nama,
            'gender' => $request->gender,
            'telp' => $request->telepon,
            'alamat' => "",
            'img' => "",
            'level' => 'pelanggan'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            // return redirect()->intended('/cekRole');
            return redirect('cekRole');
        }

    }

    public function Logout()
    {
        Session::flush();
        Auth::logout();

        return redirect("/");
    }
}

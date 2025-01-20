<?php

namespace App\Http\Controllers\auth;

use Carbon\Carbon;
use App\Models\User;
use App\Models\pegawai;
use App\Models\attendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\sop;
use App\Models\task;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerView() {

        return view('auth.register');
    }

    public function register(Request $request) {
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'type' => $request->input('type')
        ];

        User::create($data);
        return redirect()->route('login')->with('success','Data berhasil disimpan!');
    }

    public function loginView() {

        return view('auth.login');
    }

    public function loginSubmit(Request $request) {
        $data = $request->only('email','password');

        if(Auth::attempt($data)){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }else {
            return redirect()->route('login')->with('gagal','Email atau Password salah');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:web')->except('do_logout');
    }
    public function index()
    {
        return view('page.auth.login');
    }
    public function index_register()
    {
        return view('page.auth.register');
    }
    public function do_login(Request $request)
    {
        $request->validate([
            'username' => 'required|max:255',
            'password' => 'required|min:8',
        ]);
        $user = User::where('username',$request->username)->first();
        if($user){
            if (Auth::guard('web')->attempt(['username' => $request->username, 'password' => $request->password])) {
                return redirect()->intended('/dashboard');
            }else{
                return back()->with('loginError', 'Password anda salah!'); 
            }
        }else {
            return back()->with('loginError', 'Username anda salah atau tidak terdaftar!');
        }
    }
    public function do_register(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'username' => 'required|max:255|unique:users',
            'password' => 'required|min:8',
        ]);
        
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);

        $user->save();
        return redirect('auth')->with('success', 'Berhasil mendaftar');
    }
    public function do_logout()
    {
        $user = Auth::guard('web')->user();
        Auth::logout($user);
        return redirect('/');
    }
}
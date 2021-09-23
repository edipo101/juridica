<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct(){
        $this->middleware('guest', ['only' => 'showLoginForm']);
        // $this->middleware('guest')->except('logout');
    }

    public function showLoginForm(){
        return view('auth.login');
    }

    public function login(){
        $credentials = $this->validate(request(), [
            'username' => 'required|string',
            'password' => 'required|string'
        ]);


        
        if (Auth::attempt($credentials)){
            if (Auth::user()->status == 1)
                return redirect()->route('home');
            else{
                Auth::logout();
                return back()
                ->withErrors(['username' => 'Usuario deshabilitado!'])
                ->withInput(request(['username']));
            }
        }

        return back()
            ->withErrors(['username' => '¡Las credenciales de acceso son incorrectas!'])
            ->withInput(request(['username']));
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}

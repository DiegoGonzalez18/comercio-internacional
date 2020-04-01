<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mensaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm(){
        return view('auth.login');
    }

    public function login(Request $request){
        $this->validateLogin($request);
        $count=Mensaje::where("estado","=",0)->count();
        session(['mensajes' => $count]);
        session(['correo' => $request->usuario]);
        if (Auth::attempt(['email' => $request->usuario,'password' => $request->password])){
            return redirect()->route('admin');
        }

        return back()
        ->withErrors(['usuario' => trans('auth.failed')])
        ->withInput(request(['usuario']));

    }

    protected function validateLogin(Request $request){
        $this->validate($request,[
            'usuario' => 'required|string',
            'password' => 'required|string'
        ]);

    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/login');
    }
}

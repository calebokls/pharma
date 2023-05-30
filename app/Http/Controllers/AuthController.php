<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function Login()
    {
        return view('auth.login');
    }

    public function doLogin(LoginRequest $request)
    {
        $credential = $request->validated();
        if(Auth::attempt($credential))
        {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.product.index'));
        }
        return back()->withErrors([
          'email'=>'Identifiant Invalide'
        ])->onlyInput('email');
    }

    public function Logout()
    {
     Auth::logout();
     return to_route('login')->with('success','Vous etes déconnecter');
    }
}

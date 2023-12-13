<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login.index', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    public function authenticate(Request $request)
    {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {

        $request->session()->regenerate();
        $user = Auth::user();

        if ($user->is_admin) {
            // Redirect admin to the dashboard
            return redirect()->intended('/dashboard');
        } else {
            // Redirect non-admin to the home page
            return redirect()->intended('/');
        }
    }

    return back()->with('loginError', 'Login Failed!');
    }

    public function logout(){
        Auth::logout();
 
        request()->session()->invalidate();
    
        request()->session()->regenerateToken();
    
        return redirect('/');
    }
}

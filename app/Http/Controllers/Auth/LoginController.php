<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    protected $redirectTo = '/';

    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
        $this->middleware('auth');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'user') {
                return redirect()->route('user.dashboard');
            }
        }

        // Authentication failed...
        return redirect()->route('login')->withErrors(['loginError' => 'Invalid credentials.']);
    }
}

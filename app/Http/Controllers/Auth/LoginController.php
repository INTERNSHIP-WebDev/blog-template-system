<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'email';
    }

    protected function attemptLogin(Request $request)
    {
        // Attempt to log in as a regular user
        $regularUserAttempt = Auth::guard('web')->attempt($this->credentials($request));

        // If regular user login is successful, redirect to '/home'
        if ($regularUserAttempt) {
            return true;
        }

        // Attempt to log in as a guest
        $guestUserAttempt = Auth::guard('guests')->attempt($this->credentials($request));

        // If guest user login is successful, redirect to '/guests'
        if ($guestUserAttempt) {
            return true;
        }

        return false;
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->hasRole(['Guest'])) {
            return redirect('/newsfeed');
        } else {
            return redirect('/home');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}

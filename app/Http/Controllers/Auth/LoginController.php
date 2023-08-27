<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Modify the authenticated method to check pending status
    protected function authenticated(Request $request, $user)
    {
        if ($user->pending) {
            auth()->logout();
            return redirect('/login')->with('message', 'Your email is pending verification.');
        }

        return redirect()->intended($this->redirectPath());
    }
}

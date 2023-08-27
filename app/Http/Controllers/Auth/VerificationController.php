<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\VerifiesEmails;
use App\Http\Controllers\Controller;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Import the User model

class VerificationController extends Controller
{
    use VerifiesEmails;

    protected function guard()
    {
        return Auth::guard('web');
    }

    protected function verify(Request $request)
    {
        $user = User::find($request->route('id'));

        if (! $user) {
            throw new AuthenticationException;
        }

        if (! hash_equals((string) $request->route('hash'), sha1($user->getEmailForVerification()))) {
            throw new AuthenticationException;
        }

        if ($user->hasVerifiedEmail()) {
            return redirect($this->redirectPath());
        }

        if ($user->markEmailAsVerified()) {
            // Update the 'pending' column to 0
            $user->update(['pending' => 0]);

            event(new Verified($user));
        }

        if ($response = $this->verified($request)) {
            return $response;
        }

        return redirect($this->redirectPath())->with('verified', true);
    }

    // ...
}

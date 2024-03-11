<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class EmailVerificationController extends Controller
{
    public function notice () {
        $isEmailVerified = Auth::user()->email_verified_at;
            if(is_null($isEmailVerified)){
                return view('auth.verify');
            }
            else{
                return redirect('user/dashboard');
            }
    }

    public function verify (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('user/dashboard');
    }

    public function resend (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    }
}

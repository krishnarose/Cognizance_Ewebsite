<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/';

    public function authenticated(){
        $isEmailVerified = Auth::user()->email_verified_at;
        if(is_null($isEmailVerified)){
            return redirect()->route('verification.notice')->with('message', 'An email is already to to your email address. Please check your email account.');
        }
        else{
            return redirect('/user/dashboard')->with('message', 'Login successful!');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        // $this->validate([
        //     'email' => 'requi'
        // ]);

        if(auth()->attempt(['email' =>$request-> email, 'password' =>$request-> password]))
        {
            if(auth()->user()->type == 'admin'){
                return redirect('/admin/dashboard');
            }
            else{
                return redirect('user/dashboard');
            }
        }
    }
}

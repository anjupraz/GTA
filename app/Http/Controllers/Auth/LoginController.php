<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
    //protected $redirectTo = '/?success=Login Successfull';
    protected function redirectTo(){
        if(Auth::user() != null){
            if(Auth::user()->role == UserType::Admin || Auth::user()->role == UserType::Staff){
                toastr()->success('Welcome to GTA Nepal '. Auth::user()->name .'.','Success');
                return '/dashboard';
            }
            else{
                toastr()->success('Welcome to GTA Nepal '. Auth::user()->name .'.','Success');
                return '/';
            }
        }
        return '/';
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

    public function logout(Request $request)
    {
        if(Auth::user() != null){
            toastr()->success('Bye '. Auth::user()->name .'.Hope to see you soon again.','Success');
        }
        Auth::logout();
        return redirect('/');
    }
}

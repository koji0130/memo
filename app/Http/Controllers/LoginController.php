<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Auth;

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


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginView()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $userData = $request -> only('mail_address', 'password');
        if (Auth::attempt($userData)) {
            return redirect('/top');
        }else{
            return redirect('/login')->with('flash_message', 'name or password is incorrect');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

}

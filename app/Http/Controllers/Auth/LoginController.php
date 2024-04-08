<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    //protected $redirectTo = '/home';

    public function authenticated()
    {
        if(Auth::user()->role_as == '1') // 1 for Admin
        {
            return redirect('admin/dashboard')->with('status', 'Welcome to Admin Dashboard');
        }
        elseif(Auth::user()->role_as == '2') // 2 for HR
        {
            return redirect('hr/dashboard')->with('status', 'Welcome to Hr Dashboard');
        }
        elseif(Auth::user()->role_as == '0') // 0 for User
        {
            return redirect('user/dashboard')->with('status', 'Welcome to User Dashboard');
        }
        else
        {
            return redirect('/home')->with('status', 'Normal Page');
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
}

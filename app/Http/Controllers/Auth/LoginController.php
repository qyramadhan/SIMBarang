<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Session;

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

    public function logout()
    {
        Auth::logout();
 
        return redirect()->route('login');
    }

    public function register()
    {
        Auth::register();

        return redirect()->route('register');
    }

    public function login(Request $request){
        $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (auth()->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect('home');
        }
        return redirect()->back()->with(['failed' => 'Username and Password invalid !']);
    }
    

    public function failed()
    {
		Session::flash('failed','Username atau Password Anda Salah');
		return redirect()->route('login');
	}
}

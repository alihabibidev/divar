<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Login;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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

   // use AuthenticatesUsers;

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

    public function  showlogin()
    {
        return view('users.login');
    }


    public function login(Login $request,User $user)
    {
        $user = $request->validated();
        if($user->phone_number === $request->phone_number){
            $user = User::update([
                'verification_code' => rand(0, 1000)
            ]);
        }
        return view('users.verify', ['user' => $user]);

//        if (Auth::attempt(['verification_code' => $request["verification_code"], 'phone_number' => $request['phone_number']])) {
//            return redirect()->route('home.index');
//        } else {
//            echo "<div style='background: red;color: #256355'>did not match</div>";
//        }
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;

use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    //use VerifiesEmails;

    /**
     * Where to redirect users after verification.
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

    }


    public function showverify(User $user)
    {
        print_r($user->phone_number);
        die();
        return view('users.verify', ['user' => $user]);
    }


    public function verify(Request $request)
    {
//        echo $request["verification_code"];
//        echo $request['phone_number'];


        if (Auth::attempt(['verification_code' => $request["verification_code"], 'phone_number' => $request['phone_number']])) {
            return redirect()->route('home.index');
        } else {
            echo "<div style='background: red;color: #1a202c'>did not match</div>";
        }
    }

}

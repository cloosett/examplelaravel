<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetpasswordController extends Controller
{
    public function forgotview(){
        return view('forgotpassword');
    }

    public function resetview(Request $request)
    {
        return view('reset-password', ['request' => $request]);
    }


//    Логіка відправлення повідомлення на емейл
    public function forgotlogic(Request $request){
        $status = Password::sendResetLink(
            $request -> only('email')
        );

        if($status === Password::RESET_LINK_SENT){
            return back() -> with('status', 'successfull sent');
        }

        return back() -> withInput($request->only('email')) -> withErrors([
            'email' => 'invalid email'
        ]);
    }

//    Логіка заміни пароля
    public function resetlogic(Request $request){
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => $request->password,
                    'remember_token' => Str::random(60)
                ])->save();
            }
        );
        return redirect()->route('login') -> with('status', 'successfull resetpassword');

    }
}

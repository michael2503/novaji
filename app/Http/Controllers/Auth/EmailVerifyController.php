<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserVerification;
use Illuminate\Support\Facades\Auth;

class EmailVerifyController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */


    // use EmailTrait;

    public function emailVerifyVeiw()
    {
        if(Auth::user()->email_verify == 1){
            return redirect()->route('dashboard');
        }

        return view('auth.verify-email');
    }




    public function submitMailVerify($token, $userID)
    {
        // return Carbon::now();
        $check = UserVerification::where([
            ['email_code', $token], ['user_id', $userID]
        ])->first();
        if($check){
            UserVerification::where('id', $check->id)->update([
                'email_verify' => 1
            ]);
            User::where('id', $check->user_id)->update([
                'email_verify' => 1
            ]);
            // return 'succes';
            return redirect()->route('dashboard')->with('success', 'Email successfully verified');
        } else {
            return redirect()->route('emailVerifyVeiw')->with('failed', 'Sorry you email can not be verify');
        }
    }



}

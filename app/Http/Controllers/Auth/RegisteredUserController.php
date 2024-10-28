<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerificationEmail;
use App\Models\EmailTemplate;
use App\Models\User;
use App\Models\UserVerification;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // RedirectResponse
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'phone' => ['required'],
            'dob' => ['required', 'max:255'],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        //check email
        $expEmail = explode('@', $request->email);
        $expDote = explode('.', $expEmail[1]);
        if(strtolower($expDote[0]) == 'gmail' || strtolower($expDote[0]) == 'yahoo' || strtolower($expDote[0]) == 'outlook'){
            if(strlen($request->phone) == 11){
                //validate date of birth
                $yearsago = Carbon::now()->subYears(18);
                if($yearsago > $request->dob){
                    $user = User::create([
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                        'phone' => $request->phone,
                        'email' => $request->email,
                        'dob' => $request->dob,
                        'password' => Hash::make($request->password),
                    ]);
                    if($user){
                        //send email
                        $code = random_int(100000, 999999);
                        $link = url('').'/user/verify-email/verify/'.$code.'/'.$user->id;

                        UserVerification::create([
                            'user_id'           => $user->id,
                            'email_code'        => $code,
                            'email_verify'      => 0,
                            'email_time'        => Carbon::now()->addMinutes(20),
                        ]);

                        $mailData = [
                            "link" => $link,
                            "name" => ucwords($user->first_name.' '.$user->last_name),
                            'mailTitle' => "Email Verification",
                        ];
                        Mail::to($user->email)->send(new VerificationEmail($mailData));
                        event(new Registered($user));

                        Auth::login($user);

                        return redirect(RouteServiceProvider::HOME);
                    }
                } else {
                    return back()->with('failed', 'Sorry you must be above 18years');
                }
            } else {
                return back()->with('failed', 'Phone number must be 11 characters');
            }
        } else {
            return back()->with('failed', 'Email must be either gmail or yahoo or outlook');
        }
    }
}

<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\GeneralSetting;
use App\Mail\ResetPasswordEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rule;


class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
        return view('admin.auth.passwords.email');
    }
    public function forget(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', Rule::exists('users', 'email')],
        ],[
            
            'email.required'=>admin('Email Is Required'),
            'email.exists'=>admin('Email Is Not Exists')
            
        ]);
        $user = User::query()->where('email',$request['email'])->firstOrFail();
        {
            $hiddenCode = generateRandomString(8);
        }while(User::query()->where('forget_code',$hiddenCode)->first());

        $user->forget_code = $hiddenCode;
        $user->save();
        $app_name = optional(GeneralSetting::query()->find(1))->name?? '';
        Mail::to($user->email)->send(new ResetPasswordEmail($app_name,$user,$hiddenCode));
        return [
            'result'=>'ok',
            'message'=>admin('Please check your email to reset your password'),
            //'url'=> route('admin.changePassword',['forgetCode'=>$hiddenCode, 'email'=>$user->email,]),
        ];
    }

    public function changePasswordForm($forgetCode,$email)
    {
        return view('admin.auth.reset',[
            'forgetCode'=>$forgetCode,
            'email'=>$email,
        ]);
    }
    public function reset(Request $request)
    {

        $request->validate([

            'password' => 'required',

            'confirm_password' => 'required|same:password',

        ],[


            'password.required' =>admin('New Password Is Required'),

            'confirm_password.required' =>admin('Confirm Password Is Required'),

            'confirm_password.same' =>admin('Check Confirmation'),

        ]);
        $user = User::query()->where('email',$request['email'])->firstOrFail();
        if($user->forget_code == $request->forgetCode){
            $user->password = bcrypt($request->password);
            $user->forget_code = null;
            $user->save();

            return ['result'=>'ok','message'=> admin('Your Password Has Been Changed Successfuly'),'url'=>route('admin.login')];
        }else{
            return ['result'=>'error','message'=> admin('you can\'t reset password please contact support for more details')];

        }

    }
    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker('admins');
    }
}

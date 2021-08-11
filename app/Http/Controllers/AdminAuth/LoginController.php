<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

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


    protected $guard = 'admin';

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    public $redirectTo = '/admintz';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }


    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => ['required', 'email', Rule::exists('users')->where(function ($query) use ($request) {
                return $query->where('deleted_at', NULL);
            })],
            'password' => 'required|min: 6',
        ], [
            'email.required' => admin("Email is required"),
            'email.email' => admin("Email is not correct"),
            'email.exists' => admin("Email is not exists"),
            'password.required' => admin("Password is required"),
            'password.min' => admin("Password at least must be 6 digits"),
        ]);
        $count = User::where('email', $request->email)->where('status', '!=', 'inactive')->where('deleted_at', null)->count();
        if ($count > 0) {
            $user = User::where('email', $request->email)->first();
            $is_admin = $user->is_admin;


            if ($is_admin == 1) {
                if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 'active'])) {
                    $language = User::where('email', $request->email)->first()->main_language;
                    $id = User::where('email', $request->email)->first()->id;
                    Session::put('user_id', $id);
                    Session::put('locale', $language);
                    $return = ["result" => "ok", "message" => admin("Welcome back , Login Successfully"),"url" => route('admin.home')];
                    return $return;
                }
                $return = ["result" => "error", "message" => admin("Password is not correct")];
            }
            else {
                if (auth()->guard('web')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 'active'])) {
                    $language = User::where('email', $request->email)->first()->main_language;
                    $id = User::where('email', $request->email)->first()->id;
                    Session::put('user_id', $id);
                    Session::put('locale', $language);
                    $return = ["result" => "ok", "message" => admin("Welcome back , Login Successfully"),"url" => '/home'];
                    return $return;
                }
                $return = ["result" => "error", "message" => admin("Password is not correct")];
            }

        } else {
            $return = ["result" => "error", "message" => admin("Account is not active")];
        }
        return $return;

    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->guest(route('login'));
    }

}

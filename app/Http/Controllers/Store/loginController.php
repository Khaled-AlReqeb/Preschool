<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\ClientRequest;
use App\Model\Category;
use App\Model\SubCategory;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
Use App\Model\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;


class loginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:client')->except('logout');
    }

    public function index()
    {
        $categories = Category::where('status' , 'active')->get();
        $subCategories = SubCategory::where(['status' => 'active'])->get();

        return view('store.auth.login' ,compact('categories','subCategories'));
    }

    public function register()
    {
        $categories = Category::where('status' , 'active')->get();
        $subCategories = SubCategory::where(['status' => 'active'])->get();
        return view('store.auth.register' ,compact('categories','subCategories'));
    }

    public function postLogin(Request $request)
    {
        request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (auth()->guard('client')->attempt($credentials)) {

//            return Auth::guard('client')->id();
            return redirect()->intended('store/index');
        }
        return Redirect::to("store/login")->withSuccess('Oppes! You have entered invalid credentials');
    }


    public function postRegister(ClientRequest $request)
    {

        $client = new Client();


        $client->name = $request->get('name');
        $client->email = $request->get('email');
        $client->mobile = $request->get('mobile');
        $client->password = Hash::make($request->get('password'));

        $client->save();

        $this->guard()->login($client);

        return redirect()->intended(url('store/index'));

    }

    public function create(array $data)
    {
        return Client::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'password' => Hash::make($data['password'])
        ]);
    }


    public function broker()
    {
        return Password::broker('clients');
    }

    protected function guard()
    {
        return auth()->guard('client');
    }


    public function logout(Request $request)
    {
        Auth::guard('client')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('store/index');
    }

}

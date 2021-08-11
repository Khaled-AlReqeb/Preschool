<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Model\User;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function edit($id)
    {
        //
        $data = User::query()->findOrFail($id);
        return view('admin.pages.profile.edit', ['data' => $data]);

    }

    public function update(Request $request)
    {
        $request['mobile'] = (int)$request->get('mobile');
        $request->validate([
            'first_name' => 'min: 2|required',
            'email' => ['email', 'required', 'unique:users,email,' . $request['id']],
            'mobile' => ['numeric', 'required','digits_between:6 ,11', 'unique:users,mobile,' . $request['id']],
            'country_id' => ['required'],
            'phone_code_id' => ['required'],
            'currency_id' => ['required'],
            'main_language' => ['required'],

        ], [
            'first_name.required' => admin('First Name is required'),
            'first_name.min' => admin('First Name at least must be 2 digits'),
            'last_name.min' => admin('Last Name at least must be 2 digits'),
            'email.required' => admin('Email is required'),
            'email.email' => admin('Email is not correct'),
            'email.unique' => admin('Email is exist'),
            'unique.unique' => admin('Mobile is exist'),
            'mobile.required' => admin('Mobile is required'),
            'mobile.numeric' => admin('Mobile is not correct'),
            'mobile.digits_between' => admin('Mobile must be between 6 & 11 digits'),
            'country_id.required' => admin('Country is required'),
            'phone_code_id.required' => admin('Phone Code is required'),
            'currency_id.required' => admin('Currency is required'),
            'main_language.required' => admin('Language is required'),
        ]);
        $data = $request->only([
            'first_name', 'last_name', 'email', 'country_id', 'phone_code_id', 'currency_id', 'main_language',
        ]);
        $data['mobile'] = (int)$request->get('mobile');
        if ($request->hasFile('profile_image')) {
            $profile_image = $request->file('profile_image');
            $data['profile_image'] = uploadFileImage($profile_image, 'users/administration');
        }
        $password = $request->get('password', false);
        if ($password) {
            $data['password'] = bcrypt($password);
        }
        $item = User::query()->findOrFail($request->get('id'))->update($data);
        if ($item) {
            $return = ["result" => "ok", "message" => admin("Edit Operation Successfully")];
        } else {
            $return = ["result" => "error", "message" => admin("Edit Operation Failed")];
        }
        return $return;

    }

}

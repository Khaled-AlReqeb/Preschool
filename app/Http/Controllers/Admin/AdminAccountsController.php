<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Model\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;

class AdminAccountsController extends Controller
{
       /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('can:root-user');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('admin.pages.settings.users.index');
    }

    public function load(Request $request)
    {
        $items = User::query()->where('is_admin',1);
        $search = $request->get('search', false);
        if ($search) {
            $items = $items->where(function ($query) use ($search) {
                $query->where('first_name', 'like', '%' . $search . '%')
                    ->orWhere('last_name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('mobile', 'like', '%' . $search . '%')
                    ->orWhere('id', 'like', '%' . $search . '%')
                    ->orWhere('status', 'like', '%' . $search . '%');
                if (strpos('فعال', $search) !== false) {
                    $query->orwhere('status', 'active');
                }
                if (strpos('معطل', $search) !== false) {
                    $query->orwhere('status', 'like', '%' . 'inactive' . '%');
                }

            });
        }
        return DataTables::make($items)
            ->escapeColumns([])
            ->addColumn('created_at', function ($item) {
                return Carbon::parse($item->created_at)->toDateString();
            })
            ->addColumn('full_name', function ($item) {
                return $item->full_name;
            })
            ->addColumn('country_name', function ($item) {
                return $item->country->_name;
            })
            ->addColumn('actions', function ($item) {
                return null;
            })
            ->make();
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function create()
    {
        return view('admin.pages.settings.users.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'min: 2|required',
            'email' => ['email', 'nullable', 'unique:users,email,NULL,id,deleted_at,NULL'],
            'main_language' => ['required'],
            'password' => ['min: 6|max: 11|required'],
            'mobile' => ['required', 'numeric'],
            'role_id'=>['required','exists:roles,id'],
            'country_id' => ['required'],
            'phone_code_id' => ['required'],
            'currency_id' => ['required'],
        ],
        [
            'email.email' => admin('Email is not correct'),
            'email.unique' => admin('Email is exist'),
            'first_name.required' => admin('Name is required'),
            'first_name.min' => admin('Name at least must be 2 digits'),
            'main_language.required' => admin('Language is required'),
            'mobile.required' => admin('Mobile is required'),
            'mobile.numeric' => admin('Mobile is not correct'),
            'role_id'=>admin('Role is required'),
            'mobile.min' => admin('Mobile at least must be between 6  to 11 digits'),
            'mobile.max' => admin('Mobile at least must be between 6  to 11 digits'),
            'password.required' => admin('Password is required'),
            'password.min' => admin('Password at least must be 6 digits'),
            'country_id.required' => admin('Country is required'),
            'phone_code_id.required' => admin('Phone Code is required'),
            'currency_id.required' => admin('Currency is required'),
        ]);
        $data = $request->only([
            'first_name','last_name', 'email', 'country_id','role_id', 'phone_code_id', 'currency_id', 'main_language',
        ]);
        $data['is_admin'] = 1;
        $data['mobile'] = (int)$request->get('mobile');
        $data['password'] = bcrypt($request->get('password'));
        $data['status'] = $request['status'] == 'on' ? 'active' : 'inactive';
        if ($request->hasFile('profile_image')) {
            $profile_image = $request->file('profile_image');
            $data['profile_image'] = uploadFileImage($profile_image, 'users/lawyers');
        }
        $item = User::query()->create($data);
        if ($item) {
            $return = ["result" => "ok", "message" => admin("Add Operation Successfully")];
        } else {
            $return = ["result" => "error", "message" => admin("Add Operation Failed")];
        }
        return $return;

    }
    public function edit($id)
    {
        //
        $data = User::query()->findOrFail($id);
        return view('admin.pages.settings.users.edit', ['data' => $data]);

    }

    public function update(Request $request)
    {

        $request->validate([
            'first_name' => 'min: 2|required',
            'email' => ['email', 'nullable', 'unique:users,email,' . $request->get('id').',id,deleted_at,NULL'],
            'main_language' => ['required'],
            'password' => ['nullable','min: 6'],
            'mobile' => ['required', 'numeric'],
            'role_id'=>['required','exists:roles,id'],
            'country_id' => ['required'],
            'phone_code_id' => ['required'],
            'currency_id' => ['required'],
        ],
        [
            'email.email' => admin('Email is not correct'),
            'email.unique' => admin('Email is exist'),
            'first_name.required' => admin('Name is required'),
            'first_name.min' => admin('Name at least must be 2 digits'),
            'main_language.required' => admin('Language is required'),
            'mobile.required' => admin('Mobile is required'),
            'mobile.numeric' => admin('Mobile is not correct'),
            'mobile.min' => admin('Mobile at least must be between 6  to 11 digits'),
            'mobile.max' => admin('Mobile at least must be between 6  to 11 digits'),
            'password.min' => admin('Password at least must be 6 digits'),
            'role_id'=>admin('Role is required'),
            'country_id.required' => admin('Country is required'),
            'phone_code_id.required' => admin('Phone Code is required'),
            'currency_id.required' => admin('Currency is required'),
        ]);
        $data = $request->only([
            'first_name','last_name', 'email', 'country_id','role_id', 'phone_code_id', 'currency_id', 'main_language',
        ]);
        $data['mobile'] = (int)$request->get('mobile');
        if($request->hasFile('password')){
            $data['password'] = bcrypt($request->get('password'));
        }
        if ($request->hasFile('profile_image')) {
            $profile_image = $request->file('profile_image');
            $data['profile_image'] = uploadFileImage($profile_image, 'users/lawyers');
        }
        $item = User::query()->findOrFail($request->get('id'))->update($data);
        if ($item) {
            $return = ["result" => "ok", "message" => admin("Edit Operation Successfully")];
        } else {
            $return = ["result" => "error", "message" => admin("Edit Operation Failed")];
        }
        return $return;

    }

    public function destroy(Request $request)
    {
        $data = User::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        if ($data->delete()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }

    public function disable(Request $request)
    {
        $data = User::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        $data->status = 'inactive';
        if ($data->save()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }

    public function activate(Request $request)
    {
        $data = User::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        $data->status = 'active';
        if ($data->save()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }
}

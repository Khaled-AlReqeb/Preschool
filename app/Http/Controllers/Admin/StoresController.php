<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Model\User;
use App\Model\Store;
use App\Model\UserDetail;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;

class StoresController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:store-edit', ['only' => ['edit','update','activate','disable']]);
        $this->middleware('can:store-view', ['only' => ['index','load']]);
        $this->middleware('can:store-create', ['only' => ['create','store']]);
        $this->middleware('can:store-delete', ['only' => ['destroy']]);   
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('admin.pages.stores.index');
    }

    public function load(Request $request)
    {
        $items = Store::query();
        $search = $request->get('search', false);
        if ($search) {
            $items = $items->where(function ($query) use ($search) {
                $query->where('store_name', 'like', '%' . $search . '%')
                ->orWhere('store_email', 'like', '%' . $search . '%')
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
            ->addColumn('created_at', function ($item) {
                return Carbon::parse($item->created_at)->toDateString();
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
        return view('admin.pages.stores.add');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'store_name' => 'min: 2|required',
            'store_email' => ['email', 'nullable', 'unique:stores,store_email,NULL,id,deleted_at,NULL'],
            'first_name' => 'min: 2|required',
            'email' => ['email', 'nullable', 'unique:users,email,NULL,id,deleted_at,NULL'],
            'main_language' => ['required'],
            'password' => ['min: 6|max: 11|required'],
            'mobile' => ['required', 'numeric'],
            'country_id' => ['required'],
            'phone_code_id' => ['required'],
            'currency_id' => ['required'],
            'logo' => ['required','mimes:jpg,png,svg,jpeg'],
        ],
        [
            'store_email.email' => admin('Store email is not correct'),
            'store_email.unique' => admin('Store email is exist'),
            'email.email' => admin('Email is not correct'),
            'email.unique' => admin('Email is exist'),
            'first_name.required' => admin('Name is required'),
            'first_name.min' => admin('Name at least must be 2 digits'),
            'main_language.required' => admin('Language is required'),
            'mobile.required' => admin('Mobile is required'),
            'mobile.numeric' => admin('Mobile is not correct'),
            'mobile.min' => admin('Mobile at least must be between 6  to 11 digits'),
            'mobile.max' => admin('Mobile at least must be between 6  to 11 digits'),
            'password.required' => admin('Password is required'),
            'password.min' => admin('Password at least must be 6 digits'),
            'country_id.required' => admin('Country is required'),
            'phone_code_id.required' => admin('Phone Code is required'),
            'currency_id.required' => admin('Currency is required'),
            'logo.required' => admin('Logo is required'),
            'logo.mimes' => admin('Logo extension is not supported'),
        ]);
       
        $data = $request->only([
            'first_name','last_name', 'email', 'country_id', 'phone_code_id', 'currency_id',
             'main_language',
        ]);
     
        $data['is_admin'] = 1;
        $data['role_id'] = 3;
        $data['mobile'] = (int)$request->get('mobile');
        $data['password'] = bcrypt($request->get('password'));
        $data['status'] = $request['status'] == 'on' ? 'active' : 'inactive';

        if ($request->hasFile('profile_image')) {
            $profile_image = $request->file('profile_image');
            $data['profile_image'] = uploadFileImage($profile_image, 'users/images');
        }     
         $item = User::query()->create($data);
         
        if ($item) {
            $newData['user_id'] = $item->id;
            $newData['city_id'] = $request->get('city_id');
            $newData['activation_code'] = generateRandomVerificationCode(4);
            $newData['is_activated'] = 'yes';
            $newData['is_notification_enabled'] = 'yes';
            UserDetail::query()->create($newData);
            //save store data
            $storeDate = $request->only([
                'store_name', 'store_email','store_mobile','description'
            ]);
            $storeDate['user_id'] = $item->id;
            $storeDate['status'] = $request['status'] == 'on' ? 'active' : 'inactive';
            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $storeDate['logo'] = uploadFileImage($logo, 'logos/images');
            }  
            Store::query()->create($storeDate);

            $return = ["result" => "ok", "message" => admin("Add Operation Successfully")];
        } else {
            $return = ["result" => "error", "message" => admin("Add Operation Failed")];
        }
        return $return;

    }
    public function edit($id)
    {
        //
        $data = Store::query()->findOrFail($id);
        return view('admin.pages.stores.edit', ['data' => $data]);

    }

    public function update(Request $request)
    {
        $store = Store::findOrFail($request->get('id'));
        $request->validate([
            'store_name' => 'min: 2|required',
            'store_email' => ['email', 'nullable', 'unique:stores,store_email,'.$store->id.',id,deleted_at,NULL'],
            'first_name' => 'min: 2|required',
            'email' => ['email', 'nullable', 'unique:users,email,'.$store->user->id.',id,deleted_at,NULL'],
            'main_language' => ['required'],
            'password' => ['nullable','min: 6|max: 11'],
            'mobile' => ['required', 'numeric'],
            'country_id' => ['required'],
            'phone_code_id' => ['required'],
            'currency_id' => ['required'],
            'logo' => ['mimes:jpg,png,svg,jpeg'],
        ],
        [
            'store_email.email' => admin('Store email is not correct'),
            'store_email.unique' => admin('Store email is exist'),
            'email.email' => admin('Email is not correct'),
            'email.unique' => admin('Email is exist'),
            'first_name.required' => admin('Name is required'),
            'first_name.min' => admin('Name at least must be 2 digits'),
            'main_language.required' => admin('Language is required'),
            'mobile.required' => admin('Mobile is required'),
            'mobile.numeric' => admin('Mobile is not correct'),
            'mobile.min' => admin('Mobile at least must be between 6  to 11 digits'),
            'mobile.max' => admin('Mobile at least must be between 6  to 11 digits'),
            'password.required' => admin('Password is required'),
            'password.min' => admin('Password at least must be 6 digits'),
            'country_id.required' => admin('Country is required'),
            'phone_code_id.required' => admin('Phone Code is required'),
            'currency_id.required' => admin('Currency is required'),
        ]);
    
        $data = $request->only([
            'first_name','last_name', 'email', 'country_id', 'phone_code_id', 'currency_id',
            'main_language',
        ]);
        $data['mobile'] = (int)$request->get('mobile');
        $data['status'] = $request['status'] == 'on' ? 'active' : 'inactive';
        if($request->has('password')){
            $data['password'] = bcrypt($request->get('password'));
        }
        if ($request->hasFile('profile_image')) {
            $profile_image = $request->file('profile_image');
            $data['profile_image'] = uploadFileImage($profile_image, 'users/images');
        }     
        $item = $store->user->update($data);
        
        if ($item) {
            $newData['city_id'] = $request->get('city_id');
            $store->user->detail->update($newData);
            //save store data
            $storeDate = $request->only([
                'store_name', 'store_email','store_mobile','description'
            ]);
            $storeDate['status'] = $request['status'] == 'on' ? 'active' : 'inactive';
            if($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $storeDate['logo'] = uploadFileImage($logo, 'logos/images');
            }  
            $store->update($storeDate);

            $return = ["result" => "ok", "message" => admin("Edit Operation Successfully")];
        } else {
            $return = ["result" => "error", "message" => admin("Edit Operation Failed")];
        }
        return $return;

    }

    public function destroy(Request $request)
    {
        $data = Store::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        $data->user->delete();
        if ($data->delete()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }

    public function disable(Request $request)
    {
        $data = Store::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        $data->user->status = 'inactive';
        $data->status = 'inactive';
        $data->user->save();
        if ($data->save()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }

    public function activate(Request $request)
    {
        $data = Store::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        $data->user->status = 'active';
        $data->status = 'active';
        $data->user->save();
        if ($data->save()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }
}

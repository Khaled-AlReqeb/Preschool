<?php

namespace App\Http\Controllers\Admin;


use Carbon\Carbon;
use App\Model\Country;
use Illuminate\Http\Request;
use App\Model\CountryPhoneCode;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;

class CountriesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('can:country-edit',['only' => ['edit','update','activate','disable']]);
        $this->middleware('can:country-view',['only' => ['index','load','show']]);
        $this->middleware('can:country-create',['only' => ['create'.'store']]);
        $this->middleware('can:country-delete',['only' => ['destroy']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('admin.pages.countries.index');
    }

    public function load(Request $request)
    {

        $countries = Country::query();
        $search = $request->get('search', false);
        if ($search) {
            $countries = $countries->where(function ($query) use ($search) {
                $query->where('en_name', 'like', '%' . $search . '%')
                    ->orWhere('ar_name', 'like', '%' . $search . '%')
                    ->orWhere('native_name', 'like', '%' . $search . '%')
                    ->orWhere('code', 'like', '%' . $search . '%')
                    ->orWhere('status', 'like', '%' . $search . '%')
                    ->orWhere('id', 'like', '%' . $search . '%');
                if (strpos('فعال', $search) !== false) {
                    $query->orwhere('status', 'active');
                }
                if (strpos('معطل', $search) !== false) {
                    $query->orwhere('status', 'like', '%' . 'inactive' . '%');
                }

            });
        }
        return DataTables::make($countries)
            ->escapeColumns([])
            ->addColumn('created_at', function ($country) {
                return Carbon::parse($country->created_at)->toDateString();
            })
            ->addColumn('name', function ($country) {
                return $country->name;
            })
            ->addColumn('actions', function ($country) {
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
        return view('admin.pages.countries.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'en_name' => 'min: 2|required',
            'ar_name' => 'min: 2|required',
            'native_name' => ['required'],
            'continent_id' => ['required'],
            'code' => ['required'],
            'codes' => ['required'],
        ],
            [
                'en_name.required' => admin('English Name is required'),
                'en_name.min' => admin('English Name at least must be 2 digits'),
                'ar_name.required' => admin('Arabic Name is required'),
                'ar_name.min' => admin('Arabic Name at least must be 2 digits'),
                'native_name.required' => admin('Native Name is required'),
                'continent_id.required' => admin('Continent is required'),
                'code.required' => admin('Country Code is required'),
                'codes.required' => admin('Phone Code is required at least insert one'),
            ]);
        $data = $request->only([
            'en_name', 'ar_name', 'native_name', 'code', 'continent_id',
        ]);
        $data['id'] = 1 + Country::query()->orderBy('id', 'desc')->first()->id;
        $data['status'] = $request['status'] == "on" ? 'active' : 'inactive';
        if ($request->hasFile('flag_image')) {
            $flag_image = $request->file('flag_image');
            $data['flag_image'] = uploadFileImage($flag_image, 'countries/flags');
        }
        $item = Country::query()->create($data);
        if ($item) {
            $codes = $request->get('codes', false);
            if ($codes) {
                foreach ($codes as $code) {
                    if ($code['code'] != null) {
                        $newData['country_id'] = $item->id;
                        $newData['code'] = $code['code'];
                        CountryPhoneCode::query()->create($newData);
                    }
                }
            }
            $return = ["result" => "ok", "message" => admin("Add Operation Successfully")];
        } else {
            $return = ["result" => "error", "message" => admin("Add Operation Failed")];
        }
        return $return;

    }

    public function show($id)
    {
        $data = Country::query()->findOrFail($id);
        return view('admin.pages.countries.show', ['data' => $data]);
    }

    public function edit($id)
    {
        //
        $data = Country::query()->findOrFail($id);
        return view('admin.pages.countries.edit', ['data' => $data]);

    }

    public function update(Request $request)
    {

        $request->validate([
            'en_name' => 'min: 2|required',
            'ar_name' => 'min: 2|required',
            'native_name' => ['required'],
            'continent_id' => ['required'],
            'code' => ['required'],
        ],
            [
                'en_name.required' => admin('English Name is required'),
                'en_name.min' => admin('English Name at least must be 2 digits'),
                'ar_name.required' => admin('Arabic Name is required'),
                'ar_name.min' => admin('Arabic Name at least must be 2 digits'),
                'native_name.required' => admin('Native Name is required'),
                'continent_id.required' => admin('Continent is required'),
                'code.required' => admin('Country Code is required'),
            ]);
        $data = $request->only([
            'en_name', 'ar_name', 'native_name', 'code', 'continent_id',
        ]);
        $data['status'] = $request['status'] == "on" ? 'active' : 'inactive';
        if ($request->hasFile('flag_image')) {
            $flag_image = $request->file('flag_image');
            $data['flag_image'] = uploadFileImage($flag_image, 'countries/flags');
        }
        $item = Country::query()->findOrFail($request->get('id'))->update($data);
        if ($item) {
            $codes = $request->get('codes', false);
            if ($codes) {
                foreach ($codes as $code) {
                    if ($code['code'] != null) {
                        $newData['country_id'] = $request->get('id');
                        $newData['code'] = $code['code'];
                        CountryPhoneCode::query()->create($newData);
                    }
                }
            }
            $oldCodes = $request->get('oldCode', false);
            if ($oldCodes && sizeof($oldCodes) > 0) {
                foreach ($oldCodes as $oldCode) {
                    if ($code['code'] != null) {
                        CountryPhoneCode::query()->where('id', $oldCode['id'])->update(['code' => $oldCode['code']]);
                    }
                }
            }

            $return = ["result" => "ok", "message" => admin("Edit Operation Successfully")];
        } else {
            $return = ["result" => "error", "message" => admin("Edit Operation Failed")];
        }
        return $return;

    }

    public function destroy(Request $request)
    {
        $data = Country::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        if ($data->delete()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }

    public function destroyPhoneCode(Request $request)
    {
        $data = CountryPhoneCode::query()->findOrFail($request->get('id'));
        $item = Country::query()->findOrFail($data->country_id);
        if (!$data) return response(["msg" => "not found"], 404);
        if ($data->delete()) {
            return response(["msg" => "success", 'data' => $item->phoneCodes], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }

    public function disable(Request $request)
    {
        $data = Country::query()->findOrFail($request->get('id'));
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
        $data = Country::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        $data->status = 'active';
        if ($data->save()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }

}

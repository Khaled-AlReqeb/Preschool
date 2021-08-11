<?php

namespace App\Http\Controllers\Admin;


use Carbon\Carbon;
use App\Model\City;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;

class CitiesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('can:city-edit',['only' => ['edit','update','activate','disable']]);
        $this->middleware('can:city-view',['only' => ['index','load','show']]);
        $this->middleware('can:city-create',['only' => ['create'.'store']]);
        $this->middleware('can:city-delete',['only' => ['destroy']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('admin.pages.cities.index');
    }

    public function load(Request $request)
    {
        $cities = City::query();
        $search = $request->get('search', false);
        if ($search) {
            $cities = $cities->where(function ($query) use ($search) {
                $query->where('en_name', 'like', '%' . $search . '%')
                    ->orWhere('ar_name', 'like', '%' . $search . '%')
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
        return DataTables::make($cities)
            ->escapeColumns([])
            ->addColumn('created_at', function ($city) {
                return Carbon::parse($city->created_at)->toDateString();
            })
            ->addColumn('name', function ($city) {
                return $city->name;
            })
            ->addColumn('country_name', function ($city) {
                return $city->country->name;
            })
            ->addColumn('actions', function ($city) {
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
        return view('admin.pages.cities.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'en_name' => 'min: 2|required',
            'ar_name' => 'min: 2|required',
            'country_id' => ['required'],
        ],
            [
                'en_name.required' => admin('English Name is required'),
                'en_name.min' => admin('English Name at least must be 2 digits'),
                'ar_name.required' => admin('Arabic Name is required'),
                'ar_name.min' => admin('Arabic Name at least must be 2 digits'),
                'country_id.required' => admin('Country is required'),
            ]);
        $data = $request->only([
            'en_name', 'ar_name', 'country_id',
        ]);
        $data['status'] = $request['status'] == "on" ? 'active' : 'inactive';
        $item = City::query()->create($data);
        if ($item) {
            $return = ["result" => "ok", "message" => admin("Add Operation Successfully")];
        } else {
            $return = ["result" => "error", "message" => admin("Add Operation Failed")];
        }
        return $return;

    }

    public function show($id)
    {
        $data = City::query()->findOrFail($id);
        return view('admin.pages.cities.show', ['data' => $data]);
    }

    public function edit($id)
    {
        //
        $data = City::query()->findOrFail($id);
        return view('admin.pages.cities.edit', ['data' => $data]);

    }

    public function update(Request $request)
    {

        $request->validate([
            'en_name' => 'min: 2|required',
            'ar_name' => 'min: 2|required',
            'country_id' => ['required'],
        ],
            [
                'en_name.required' => admin('English Name is required'),
                'en_name.min' => admin('English Name at least must be 2 digits'),
                'ar_name.required' => admin('Arabic Name is required'),
                'ar_name.min' => admin('Arabic Name at least must be 2 digits'),
                'country_id.required' => admin('Country is required'),
            ]);
        $data = $request->only([
            'en_name', 'ar_name', 'country_id',
        ]);
        $data['status'] = $request['status'] == "on" ? 'active' : 'inactive';
        $item = City::query()->findOrFail($request->get('id'))->update($data);
        if ($item) {
            $return = ["result" => "ok", "message" => admin("Edit Operation Successfully")];
        } else {
            $return = ["result" => "error", "message" => admin("Edit Operation Failed")];
        }
        return $return;

    }

    public function destroy(Request $request)
    {
        $data = City::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        if ($data->delete()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }

    public function disable(Request $request)
    {
        $data = City::query()->findOrFail($request->get('id'));
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
        $data = City::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        $data->status = 'active';
        if ($data->save()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }

}

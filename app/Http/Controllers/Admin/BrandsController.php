<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Model\Brand;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;

class BrandsController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('can:brand-edit',['only' => ['edit','update','activate','disable']]);
        $this->middleware('can:brand-view',['only' => ['index','load','show']]);
        $this->middleware('can:brand-create',['only' => ['create'.'store']]);
        $this->middleware('can:brand-delete',['only' => ['destroy']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('admin.pages.brands.index');
    }

    public function load(Request $request)
    {
        $brands = Brand::query();
        $search = $request->get('search', false);
        if ($search) {
            $brands = $brands->where(function ($query) use ($search) {
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
        return DataTables::make($brands)
            ->escapeColumns([])
            ->addColumn('created_at', function ($brand) {
                return Carbon::parse($brand->created_at)->toDateString();
            })
            ->addColumn('actions', function ($brand) {
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
        return view('admin.pages.brands.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'en_name' => 'min: 2|required',
            'ar_name' => 'min: 2|required',
            'logo' => ['mimes:png,jpg,jpeg,svg'],
        ],
        [
            'en_name.required' => admin('English Name is required'),
            'en_name.min' => admin('English Name at least must be 2 digits'),
            'ar_name.required' => admin('Arabic Name is required'),
            'ar_name.min' => admin('Arabic Name at least must be 2 digits'),
            'logo.mimes' => admin('Logo extenssion is not supported')
        ]);
        $data = $request->only([
            'en_name', 'ar_name',
        ]);
        if($request->hasFile('logo')){
            $data['logo'] = uploadFileImage($request->file('logo'),'brands/images');
        }
        $data['status'] = $request['status'] == "on" ? 'active' : 'inactive';
        $item = brand::query()->create($data);
        if ($item) {
            $return = ["result" => "ok", "message" => admin("Add Operation Successfully")];
        } else {
            $return = ["result" => "error", "message" => admin("Add Operation Failed")];
        }
        return $return;

    }

    public function show($id)
    {
        $data = Brand::query()->findOrFail($id);
        return view('admin.pages.brands.show', ['data' => $data]);
    }

    public function edit($id)
    {
        //
        $data = Brand::query()->findOrFail($id);
        return view('admin.pages.brands.edit', ['data' => $data]);

    }

    public function update(Request $request)
    {

        $request->validate([
            'en_name' => 'min: 2|required',
            'ar_name' => 'min: 2|required',
            'logo' => ['mimes:png,jpg,jpeg,svg'],
        ],
        [
            'en_name.required' => admin('English Name is required'),
            'en_name.min' => admin('English Name at least must be 2 digits'),
            'ar_name.required' => admin('Arabic Name is required'),
            'ar_name.min' => admin('Arabic Name at least must be 2 digits'),
            'logo.mimes' => admin('Logo extenssion is not supported')
        ]);
        $data = $request->only([
            'en_name', 'ar_name',
        ]);
        $data['status'] = $request['status'] == "on" ? 'active' : 'inactive';
        $item = Brand::query()->findOrFail($request->get('id'))->update($data);
        if ($item) {
            $return = ["result" => "ok", "message" => admin("Edit Operation Successfully")];
        } else {
            $return = ["result" => "error", "message" => admin("Edit Operation Failed")];
        }
        return $return;

    }

    public function destroy(Request $request)
    {
        $data = Brand::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        if ($data->delete()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }

    public function disable(Request $request)
    {
        $data = Brand::query()->findOrFail($request->get('id'));
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
        $data = Brand::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        $data->status = 'active';
        if ($data->save()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }
}

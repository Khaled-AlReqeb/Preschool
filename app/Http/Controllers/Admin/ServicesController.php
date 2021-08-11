<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Model\Servcie;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Contracts\Support\Renderable;


class ServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:service-edit',['only' => ['edit','update','activate','disable']]);
        $this->middleware('can:service-view',['only' => ['index','load','show']]);
        $this->middleware('can:service-create',['only' => ['create'.'store']]);
        $this->middleware('can:service-delete',['only' => ['destroy']]);
    }

    public function index()
    {
        return view('admin.pages.services.index');
    }

    public function load(Request $request)
    {
        $services = Servcie::query();
        $search = $request->get('search', false);
        if ($search) {
            $services = $services->where(function ($query) use ($search) {
                $query->where('en_name', 'like', '%' . $search . '%')
                    ->orWhere('ar_name', 'like', '%' . $search . '%')
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
        return DataTables::make($services)
            ->escapeColumns([])
            ->addColumn('created_at', function ($service) {
                return Carbon::parse($service->created_at)->toDateString();
            })
            ->addColumn('name', function ($service) {
                return $service->name;
            })
            ->addColumn('actions', function ($service) {
                return null;
            })
            ->make();
    }
    public function create()
    {
        return view('admin.pages.services.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'en_name' => 'min: 2|required',
            'ar_name' => 'min: 2|required',
            'en_description' => 'min: 2|required',
            'ar_description' => 'min: 2|required',
        ], [
            'en_name.required' => admin('English Name is required'),
            'en_name.min' => admin('English Name at least must be 2 digits'),
            'ar_name.required' => admin('Arabic Name is required'),
            'ar_name.min' => admin('Arabic Name at least must be 2 digits'),
            'en_description.required' => admin('English Description is required'),
            'en_description.min' => admin('English Description at least must be 2 digits'),
            'ar_description.required' => admin('Arabic Description is required'),
            'ar_description.min' => admin('Arabic Description at least must be 2 digits'),

        ]);
        $data = $request->only([
            'en_name', 'ar_name' , 'en_description', 'ar_description',
        ]);
        $data['status'] = $request['status'] == "on" ? 'active' : 'inactive';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $data['image'] = uploadFileImage($image, 'services/images');
        }
        $item = Servcie::query()->create($data);
        if ($item) {
            $return = ["result" => "ok", "message" => admin("Add Operation Successfully")];
        } else {
            $return = ["result" => "error", "message" => admin("Add Operation Failed")];
        }
        return $return;

    }

    public function show($id)
    {
        $data = Servcie::query()->findOrFail($id);
        return view('admin.pages.services.show', ['data' => $data]);
    }

    public function edit($id)
    {
        //
        $data = Servcie::query()->findOrFail($id);
        return view('admin.pages.services.edit', ['data' => $data]);

    }

    public function update(Request $request)
    {

        $request->validate([
            'en_name' => 'min: 2|required',
            'ar_name' => 'min: 2|required',
            'en_description' => 'min: 2|required',
            'ar_description' => 'min: 2|required',
        ], [
            'en_name.required' => admin('English Name is required'),
            'en_name.min' => admin('English Name at least must be 2 digits'),
            'ar_name.required' => admin('Arabic Name is required'),
            'ar_name.min' => admin('Arabic Name at least must be 2 digits'),
            'en_description.required' => admin('English Description is required'),
            'en_description.min' => admin('English Description at least must be 2 digits'),
            'ar_description.required' => admin('Arabic Description is required'),
            'ar_description.min' => admin('Arabic Description at least must be 2 digits'),
        ]);
        $data = $request->only([
            'en_name', 'ar_name','en_description', 'ar_description',
        ]);
        $data['status'] = $request['status'] == "on" ? 'active' : 'inactive';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $data['image'] = uploadFileImage($image, 'services/images');
        }
        $item = Servcie::query()->findOrFail($request->get('id'))->update($data);
        if ($item) {
            $return = ["result" => "ok", "message" => admin("Edit Operation Successfully")];
        } else {
            $return = ["result" => "error", "message" => admin("Edit Operation Failed")];
        }
        return $return;

    }

    public function destroy(Request $request)
    {
        $data = Servcie::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        if ($data->delete()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }

    public function disable(Request $request)
    {
        $data = Servcie::query()->findOrFail($request->get('id'));
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
        $data = Servcie::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        $data->status = 'active';
        if ($data->save()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;


use Carbon\Carbon;
use App\Model\Banner;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;

class BannersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('can:banner-edit',['only' => ['edit','update','activate','disable']]);
        $this->middleware('can:banner-view',['only' => ['index','load','show']]);
        $this->middleware('can:banner-create',['only' => ['create'.'store']]);
        $this->middleware('can:banner-delete',['only' => ['destroy']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('admin.pages.banners.index');
    }

    public function load(Request $request)
    {
        $banners = Banner::query();
        $search = $request->get('search', false);
        if ($search) {
            $banners = $banners->where(function ($query) use ($search) {
                $query->where('en_title', 'like', '%' . $search . '%')
                    ->orWhere('ar_title', 'like', '%' . $search . '%')
                    ->orWhere('url', 'like', '%' . $search . '%')
                    ->orWhere('type', 'like', '%' . $search . '%')
                    ->orWhere('id', 'like', '%' . $search . '%')
                    ->orWhere('status', 'like', '%' . $search . '%')
                    ->orWhere('type', 'like', '%' . $search . '%');
                if (strpos('فعال', $search) !== false) {
                    $query->orwhere('status', 'active');
                }
                if (strpos('معطل', $search) !== false) {
                    $query->orwhere('status', 'like', '%' . 'inactive' . '%');
                }
                if (strpos('داخلي', $search) !== false) {
                    $query->orwhere('type', 'internal');
                }
                if (strpos('خارجي', $search) !== false) {
                    $query->orwhere('type', 'like', '%' . 'external' . '%');
                }
            });
        }
        return DataTables::make($banners)
            ->escapeColumns([])
            ->addColumn('created_at', function ($banner) {
                return Carbon::parse($banner->created_at)->toDateString();
            })
            ->addColumn('title', function ($banner) {
                return $banner->title;
            })
            ->addColumn('actions', function ($banner) {
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
        return view('admin.pages.banners.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ar_title' => 'min: 2|required',
            'en_title' => 'min: 2|required',
            'type' => 'required',
            'url' => 'required_if:type,external',
            'route_type'=>'required_if:type,internal',
            'item_id'=>'required_if:type,internal',
        ], [
            'en_title.required' => admin('English Title is required'),
            'en_title.min' => admin('English Title at least must be 2 digits'),
            'ar_title.required' => admin('Arabic Title is required'),
            'ar_title.min' => admin('Arabic Title at least must be 2 digits'),
            'url.required_if' => admin('The url field is required when type is external.'),
            'type.required' => admin('Type is required'),
            'route_type.required_if' => admin('Route type is required'),
            'item_id.required_if' => admin('Item id is required'),
        ]);
        $data = $request->only([
            'ar_title', 'en_title', 'url', 'type','route_type','item_id'
        ]);
        $data['status'] = $request['status'] == "on" ? 'active' : 'inactive';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $data['image'] = uploadFileImage($image, 'banners/images');
        }
        $item = Banner::query()->create($data);
        if ($item) {
            $return = ["result" => "ok", "message" => admin("Add Operation Successfully")];
        } else {
            $return = ["result" => "error", "message" => admin("Add Operation Failed")];
        }
        return $return;

    }

    public function show($id)
    {
        $data = Banner::query()->findOrFail($id);
        return view('admin.pages.banners.show', ['data' => $data]);
    }

    public function edit($id)
    {
        //
        $data = Banner::query()->findOrFail($id);
        return view('admin.pages.banners.edit', ['data' => $data]);

    }

    public function update(Request $request)
    {

        $request->validate([
            'ar_title' => 'min: 2|required',
            'en_title' => 'min: 2|required',
            'url' => 'required_if:type,external',
            'type' => 'required',
            'route_type'=>'required_if:type,internal',
            'item_id'=>'required_if:type,internal',
        ], [
            'en_title.required' => admin('English Title is required'),
            'en_title.min' => admin('English Title at least must be 2 digits'),
            'ar_title.required' => admin('Arabic Title is required'),
            'ar_title.min' => admin('Arabic Title at least must be 2 digits'),
            'type.required' => admin('Type is required'),
            'url.required_if' => admin('The url field is required when type is external.'),
            'route_type.required_if' => admin('Route type is required'),
            'item_id.required_if' => admin('Item id is required'),
        ]);
        $data = $request->only([
            'ar_title', 'en_title', 'url', 'type','route_type','item_id'
        ]);
        $data['status'] = $request['status'] == "on" ? 'active' : 'inactive';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $data['image'] = uploadFileImage($image, 'banners/images');
        }
        $item = Banner::query()->findOrFail($request->get('id'))->update($data);
        if ($item) {
            $return = ["result" => "ok", "message" => admin("Edit Operation Successfully")];
        } else {
            $return = ["result" => "error", "message" => admin("Edit Operation Failed")];
        }
        return $return;

    }

    public function destroy(Request $request)
    {
        $data = Banner::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        if ($data->delete()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }

    public function disable(Request $request)
    {
        $data = Banner::query()->findOrFail($request->get('id'));
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
        $data = Banner::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        $data->status = 'active';
        if ($data->save()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }

}

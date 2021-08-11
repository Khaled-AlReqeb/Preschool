<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Model\StoreFeature;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;

class StoreFeaturesController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:store-feature-edit', ['only' => ['edit','update','activate','disable']]);
        $this->middleware('can:store-feature-view', ['only' => ['index','load']]);
        $this->middleware('can:store-feature-create', ['only' => ['create','store']]);
        $this->middleware('can:store-feature-delete', ['only' => ['destroy']]);    
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('admin.pages.settings.storeFeature.index');
    }

    public function load(Request $request)
    {
        $items = StoreFeature::query();
        $search = $request->get('search', false);
        if ($search) {
            $items = $items->where(function ($query) use ($search) {
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
        return DataTables::make($items)
            ->escapeColumns([])
            ->addColumn('created_at', function ($item) {
                return Carbon::parse($item->created_at)->toDateString();
            })
            ->addColumn('name', function ($item) {
                return $item->name;
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
        return view('admin.pages.settings.storeFeature.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'en_name' => 'min: 2|required',
            'ar_name' => 'min: 2|required',
            'en_content' => 'min: 2|required',
            'ar_content' => 'min: 2|required',
        ],
            [
                'en_name.required' => admin('English Name is required'),
                'en_name.min' => admin('English Name at least must be 2 digits'),
                'ar_name.required' => admin('Arabic Name is required'),
                'ar_name.min' => admin('Arabic Name at least must be 2 digits'),
                'en_content.required' => admin('English Content is required'),
                'en_content.min' => admin('English Content at least must be 2 digits'),
                'ar_content.required' => admin('Arabic Content is required'),
                'ar_content.min' => admin('Arabic Content at least must be 2 digits'),

            ]);
        $data = $request->only([
            'en_name', 'ar_name', 'ar_content', 'en_content',
        ]);
        $data['status'] = $request['status'] == "on" ? 'active' : 'inactive';
        $item = StoreFeature::query()->create($data);
        if ($item) {
            $return = ["result" => "ok", "message" => admin("Add Operation Successfully")];
        } else {
            $return = ["result" => "error", "message" => admin("Add Operation Failed")];
        }
        return $return;

    }

    public function show($id)
    {
        $data = StoreFeature::query()->findOrFail($id);
        return view('admin.pages.settings.storeFeature.show', ['data' => $data]);
    }

    public function edit($id)
    {
        //
        $data = StoreFeature::query()->findOrFail($id);
        return view('admin.pages.settings.storeFeature.edit', ['data' => $data]);

    }

    public function update(Request $request)
    {

        $request->validate([
            'en_name' => 'min: 2|required',
            'ar_name' => 'min: 2|required',
            'en_content' => 'min: 2|required',
            'ar_content' => 'min: 2|required',
        ],
            [
                'en_name.required' => admin('English Name is required'),
                'en_name.min' => admin('English Name at least must be 2 digits'),
                'ar_name.required' => admin('Arabic Name is required'),
                'ar_name.min' => admin('Arabic Name at least must be 2 digits'),
                'en_content.required' => admin('English Content is required'),
                'en_content.min' => admin('English Content at least must be 2 digits'),
                'ar_content.required' => admin('Arabic Content is required'),
                'ar_content.min' => admin('Arabic Content at least must be 2 digits'),

            ]);
        $data = $request->only([
            'en_name', 'ar_name', 'ar_content','en_content',
        ]);
        $data['status'] = $request['status'] == "on" ? 'active' : 'inactive';
        $item = StoreFeature::query()->findOrFail($request->get('id'))->update($data);
        if ($item) {
            $return = ["result" => "ok", "message" => admin("Edit Operation Successfully")];
        } else {
            $return = ["result" => "error", "message" => admin("Edit Operation Failed")];
        }
        return $return;

    }

    public function destroy(Request $request)
    {
        $data = StoreFeature::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        if ($data->delete()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }

    public function disable(Request $request)
    {
        $data = StoreFeature::query()->findOrFail($request->get('id'));
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
        $data = StoreFeature::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        $data->status = 'active';
        if ($data->save()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }
    
}

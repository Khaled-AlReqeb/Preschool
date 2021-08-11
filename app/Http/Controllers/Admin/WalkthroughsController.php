<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Model\Walkthrough;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class WalkthroughsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('can:walkthrough-edit', ['only' => ['edit','update','activate','disable']]);
        $this->middleware('can:walkthrough-view', ['only' => ['index','load']]);
        $this->middleware('can:walkthrough-create', ['only' => ['create','store']]);
        $this->middleware('can:walkthrough-delete', ['only' => ['destroy']]);   
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('admin.pages.settings.walkthroughs.index');
    }

    public function load(Request $request)
    {
        $walkthroughs = Walkthrough::query();
        $search = $request->get('search', false);
        if ($search) {
            $walkthroughs = $walkthroughs->where(function ($query) use ($search) {
                $query->where('en_title', 'like', '%' . $search . '%')
                    ->orWhere('ar_title', 'like', '%' . $search . '%')
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
        return DataTables::make($walkthroughs)
            ->escapeColumns([])
            ->addColumn('created_at', function ($walkthrough) {
                return Carbon::parse($walkthrough->created_at)->toDateString();
            })
            ->addColumn('name', function ($walkthrough) {
                return $walkthrough->name;
            })
            ->addColumn('actions', function ($walkthrough) {
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
        return view('admin.pages.settings.walkthroughs.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'en_title' => 'min: 2|required',
            'ar_title' => 'min: 2|required',
            'en_description' => 'min: 2|required',
            'ar_description' => 'min: 2|required',
        ],
            [
                'en_title.required' => admin('English Title is required'),
                'en_title.min' => admin('English Title at least must be 2 digits'),
                'ar_title.required' => admin('Arabic Title is required'),
                'ar_title.min' => admin('Arabic Title at least must be 2 digits'),
                'en_description.required' => admin('English Description is required'),
                'en_description.min' => admin('English Description at least must be 2 digits'),
                'ar_description.required' => admin('Arabic Description is required'),
                'ar_description.min' => admin('Arabic Description at least must be 2 digits'),

            ]);
        $data = $request->only([
            'en_title', 'ar_title', 'en_description', 'ar_description',
        ]);
        $data['status'] = $request['status'] == "on" ? 'active' : 'inactive';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $data['image'] = uploadFileImage($image, 'walkthroughs/images');
        }
        $item = Walkthrough::query()->create($data);
        if ($item) {
            $return = ["result" => "ok", "message" => admin("Add Operation Successfully")];
        } else {
            $return = ["result" => "error", "message" => admin("Add Operation Failed")];
        }
        return $return;

    }

    public function show($id)
    {
        $data = Walkthrough::query()->findOrFail($id);
        return view('admin.pages.settings.walkthroughs.show', ['data' => $data]);
    }

    public function edit($id)
    {
        //
        $data = Walkthrough::query()->findOrFail($id);
        return view('admin.pages.settings.walkthroughs.edit', ['data' => $data]);

    }

    public function update(Request $request)
    {

        $request->validate([
            'en_title' => 'min: 2|required',
            'ar_title' => 'min: 2|required',
            'en_description' => 'min: 2|required',
            'ar_description' => 'min: 2|required',
        ],
            [
                'en_title.required' => admin('English Title is required'),
                'en_title.min' => admin('English Title at least must be 2 digits'),
                'ar_title.required' => admin('Arabic Title is required'),
                'ar_title.min' => admin('Arabic Title at least must be 2 digits'),
                'en_description.required' => admin('English Description is required'),
                'en_description.min' => admin('English Description at least must be 2 digits'),
                'ar_description.required' => admin('Arabic Description is required'),
                'ar_description.min' => admin('Arabic Description at least must be 2 digits'),

            ]);
        $data = $request->only([
            'en_title', 'ar_title', 'en_description', 'ar_description',
        ]);
        $data['status'] = $request['status'] == "on" ? 'active' : 'inactive';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $data['image'] = uploadFileImage($image, 'walkthroughs/images');
        }
        $item = Walkthrough::query()->findOrFail($request->get('id'))->update($data);
        if ($item) {
            $return = ["result" => "ok", "message" => admin("Edit Operation Successfully")];
        } else {
            $return = ["result" => "error", "message" => admin("Edit Operation Failed")];
        }
        return $return;

    }

    public function destroy(Request $request)
    {
        $data = Walkthrough::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        if ($data->delete()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }

    public function disable(Request $request)
    {
        $data = Walkthrough::query()->findOrFail($request->get('id'));
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
        $data = Walkthrough::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        $data->status = 'active';
        if ($data->save()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }

}

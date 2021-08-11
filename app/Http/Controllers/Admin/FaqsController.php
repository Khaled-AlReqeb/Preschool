<?php

namespace App\Http\Controllers\Admin;


use App\Model\Faq;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;


class FaqsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('can:faq-edit',['only' => ['edit','update','activate','disable']]);
        $this->middleware('can:faq-view',['only' => ['index','load','show']]);
        $this->middleware('can:faq-create',['only' => ['create'.'store']]);
        $this->middleware('can:faq-delete',['only' => ['destroy']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('admin.pages.settings.faqs.index');
    }

    public function load(Request $request)
    {
        $faqs = Faq::query();
        $search = $request->get('search', false);
        if ($search) {
            $faqs = $faqs->where(function ($query) use ($search) {
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
        return DataTables::make($faqs)
            ->escapeColumns([])
            ->addColumn('created_at', function ($faq) {
                return Carbon::parse($faq->created_at)->toDateString();
            })
            ->addColumn('name', function ($faq) {
                return $faq->name;
            })
            ->addColumn('actions', function ($faq) {
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
        return view('admin.pages.settings.faqs.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'en_name' => 'min: 2|required',
            'ar_name' => 'min: 2|required',
            'en_value' => 'min: 2|required',
            'ar_value' => 'min: 2|required',
        ],
            [
                'en_name.required' => admin('English Name is required'),
                'en_name.min' => admin('English Name at least must be 2 digits'),
                'ar_name.required' => admin('Arabic Name is required'),
                'ar_name.min' => admin('Arabic Name at least must be 2 digits'),
                'en_value.required' => admin('English Content is required'),
                'en_value.min' => admin('English Content at least must be 2 digits'),
                'ar_value.required' => admin('Arabic Content is required'),
                'ar_value.min' => admin('Arabic Content at least must be 2 digits'),

            ]);
        $data = $request->only([
            'en_name', 'ar_name', 'ar_value', 'en_value',
        ]);
        $data['status'] = $request['status'] == "on" ? 'active' : 'inactive';
        $item = Faq::query()->create($data);
        if ($item) {
            $return = ["result" => "ok", "message" => admin("Add Operation Successfully")];
        } else {
            $return = ["result" => "error", "message" => admin("Add Operation Failed")];
        }
        return $return;

    }

    public function show($id)
    {
        $data = Faq::query()->findOrFail($id);
        return view('admin.pages.settings.faqs.show', ['data' => $data]);
    }

    public function edit($id)
    {
        //
        $data = Faq::query()->findOrFail($id);
        return view('admin.pages.settings.faqs.edit', ['data' => $data]);

    }

    public function update(Request $request)
    {

        $request->validate([
            'en_name' => 'min: 2|required',
            'ar_name' => 'min: 2|required',
            'en_value' => 'min: 2|required',
            'ar_value' => 'min: 2|required',
        ],
            [
                'en_name.required' => admin('English Name is required'),
                'en_name.min' => admin('English Name at least must be 2 digits'),
                'ar_name.required' => admin('Arabic Name is required'),
                'ar_name.min' => admin('Arabic Name at least must be 2 digits'),
                'en_value.required' => admin('English Content is required'),
                'en_value.min' => admin('English Content at least must be 2 digits'),
                'ar_value.required' => admin('Arabic Content is required'),
                'ar_value.min' => admin('Arabic Content at least must be 2 digits'),

            ]);
        $data = $request->only([
            'en_name', 'ar_name', 'ar_value','en_value',
        ]);
        $data['status'] = $request['status'] == "on" ? 'active' : 'inactive';
        $item = Faq::query()->findOrFail($request->get('id'))->update($data);
        if ($item) {
            $return = ["result" => "ok", "message" => admin("Edit Operation Successfully")];
        } else {
            $return = ["result" => "error", "message" => admin("Edit Operation Failed")];
        }
        return $return;

    }

    public function destroy(Request $request)
    {
        $data = Faq::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        if ($data->delete()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }

    public function disable(Request $request)
    {
        $data = Faq::query()->findOrFail($request->get('id'));
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
        $data = Faq::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        $data->status = 'active';
        if ($data->save()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }

}

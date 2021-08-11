<?php

namespace App\Http\Controllers\Admin;


use Carbon\Carbon;
use App\Model\Currency;
use App\Model\CurrencyRate;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;

class CurrenciesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('can:currency-edit',['only' => ['edit','update','activate','disable']]);
        $this->middleware('can:currency-view',['only' => ['index','load','show']]);
        $this->middleware('can:currency-create',['only' => ['create'.'store']]);
        $this->middleware('can:currency-delete',['only' => ['destroy']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('admin.pages.settings.currencies.index');
    }

    public function load(Request $request)
    {
        $currencies = Currency::query();
        $search = $request->get('search', false);
        if ($search) {
            $currencies = $currencies->where(function ($query) use ($search) {
                $query->where('en_name', 'like', '%' . $search . '%')
                    ->orWhere('ar_name', 'like', '%' . $search . '%')
                    ->orWhere('iso', 'like', '%' . $search . '%')
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
        return DataTables::make($currencies)
            ->escapeColumns([])
            ->addColumn('created_at', function ($currency) {
                return Carbon::parse($currency->created_at)->toDateString();
            })
            ->addColumn('name', function ($currency) {
                return $currency->name;
            })
            ->addColumn('change_factor', function ($currency) {
                return $currency->rate->change_factor;
            })
            ->addColumn('actions', function ($currency) {
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
        return view('admin.pages.settings.currencies.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'en_name' => 'min: 2|required',
            'ar_name' => 'min: 2|required',
            'iso' => ['required'],
            'change_factor' => ['required'],
        ],
            [
                'en_name.required' => admin('English Name is required'),
                'en_name.min' => admin('English Name at least must be 2 digits'),
                'ar_name.required' => admin('Arabic Name is required'),
                'ar_name.min' => admin('Arabic Name at least must be 2 digits'),
                'iso.required' => admin('ISO is required'),
                'change_factor.required' => admin('Change Factor is required'),
            ]);
        $data = $request->only([
            'en_name', 'ar_name', 'iso',
        ]);
        $data['status'] = $request['status'] == "on" ? 'active' : 'inactive';
        $item = Currency::query()->create($data);
        if ($item) {
            $newData['currency_id'] = $item->id;
            $newData['change_factor'] = $request->get('change_factor');
            CurrencyRate::query()->create($newData);
            $return = ["result" => "ok", "message" => admin("Add Operation Successfully")];
        } else {
            $return = ["result" => "error", "message" => admin("Add Operation Failed")];
        }
        return $return;

    }

    public function show($id)
    {
        $data = Currency::query()->findOrFail($id);
        return view('admin.pages.settings.currencies.show', ['data' => $data]);
    }

    public function edit($id)
    {
        //
        $data = Currency::query()->findOrFail($id);
        return view('admin.pages.settings.currencies.edit', ['data' => $data]);

    }

    public function update(Request $request)
    {

        $request->validate([
            'en_name' => 'min: 2|required',
            'ar_name' => 'min: 2|required',
            'iso' => ['required'],
            'change_factor' => ['required'],
        ],
            [
                'en_name.required' => admin('English Name is required'),
                'en_name.min' => admin('English Name at least must be 2 digits'),
                'ar_name.required' => admin('Arabic Name is required'),
                'ar_name.min' => admin('Arabic Name at least must be 2 digits'),
                'iso.required' => admin('Iso is required'),
                'change_factor.required' => admin('Change Factor is required'),
            ]);
        $data = $request->only([
            'en_name', 'ar_name', 'iso',
        ]);
        $data['status'] = $request['status'] == "on" ? 'active' : 'inactive';
        $item = Currency::query()->findOrFail($request->get('id'))->update($data);
        if ($item) {
            CurrencyRate::query()->where('currency_id', $request->get('id'))->update([
                'change_factor' => $request->get('change_factor'),
            ]);

            $return = ["result" => "ok", "message" => admin("Edit Operation Successfully")];
        } else {
            $return = ["result" => "error", "message" => admin("Edit Operation Failed")];
        }
        return $return;

    }

    public function destroy(Request $request)
    {
        $data = Currency::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        if ($data->delete()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }

    public function disable(Request $request)
    {
        $data = Currency::query()->findOrFail($request->get('id'));
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
        $data = Currency::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        $data->status = 'active';
        if ($data->save()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }

}

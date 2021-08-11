<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Attribute;
use App\Model\ProductImage;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AttributesController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:attribute');
    }

    public function index()
    {
        return view('admin.pages.attributes.index');
    }

    public function load(Request $request)
    {
        $attributes = Attribute::query();
        $search = $request->get('search', false);
        if ($search) {
            $attributes = $attributes->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhere('id', 'like', '%' . $search . '%');
            });
        }
        return DataTables::make($attributes)
            ->escapeColumns([])
            ->addColumn('created_at', function ($attribute) {
                return Carbon::parse($attribute->created_at)->toDateString();
            })
            ->addColumn('actions', function ($attribute) {
                return null;
            })
            ->make();
    }

    public function edit($id)
    {
        $data = Attribute::query()->findOrFail($id);
        return view('admin.pages.attributes.edit', ['data' => $data]);
    }

    public function create()
    {
        return view('admin.pages.attributes.add');
    }

    public function store(Request $request)
    {
        $data = $this->getValidatedData($request);

        $item = Attribute::firstOrCreate($data);
        if ($item) {
            $return = ["result" => "ok", "message" => admin("Add Operation Successfully"), 'id' => $item->id];
        } else {
            $return = ["result" => "error", "message" => admin("Add Operation Failed")];
        }
        return $return;
    }

    public function update(Request $request, $id)
    {
        $data = $this->getValidatedData($request);

        $item = Attribute::query()->findOrFail($request->get('id'))->update($data);
        if ($item) {
            $return = ["result" => "ok", "message" => admin("Edit Operation Successfully")];
        } else {
            $return = ["result" => "error", "message" => admin("Edit Operation Failed")];
        }
        return $return;
    }



    public function destroy(Request $request)
    {
        $data = Attribute::findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        if ($data->delete()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }

    /**
     * @param Request $request
     * @return array
     */
    protected function getValidatedData(Request $request): array
    {
        $request->validate([
            'name' => 'min: 2|required',
            'description' => 'min: 2|required',
        ],
            [
                'name.required' => admin('Name is required'),
                'name.min' => admin('Name at least must be 2 digits'),
                'description.required' => admin('Description is required'),
                'description.min' => admin('Description at least must be 2 digits'),
            ]);
        $data = $request->only([
            'name',
            'description',
        ]);
        return $data;
    }

}

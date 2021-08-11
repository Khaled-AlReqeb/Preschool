<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\SubCategory;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SubCategoriesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('can:category-edit', ['only' => ['edit','update','activate','disable']]);
        $this->middleware('can:category-view', ['only' => ['index','load']]);
        $this->middleware('can:category-create', ['only' => ['create','store']]);
        $this->middleware('can:category-delete', ['only' => ['destroy']]);   
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index($category_id)
    {
        return view('admin.pages.categories.subCategories.index', ['category_id' => $category_id]);
    }

    public function load(Request $request, $category_id)
    {
        $categories = SubCategory::query()->where('category_id', $category_id);
        $search = $request->get('search', false);
        if ($search) {
            $categories = $categories->where(function ($query) use ($search) {
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
        return DataTables::make($categories)
            ->escapeColumns([])
            ->addColumn('created_at', function ($category) {
                return Carbon::parse($category->created_at)->toDateString();
            })
            ->addColumn('name', function ($category) {
                return $category->name;
            })
            ->addColumn('actions', function ($category) {
                return null;
            })
            ->make();
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function create($category_id)
    {
        return view('admin.pages.categories.subCategories.add', ['category_id' => $category_id]);
    }

    public function store(Request $request, $category_id)
    {
        $request->validate([
            'en_name' => 'min: 2|required',
            'ar_name' => 'min: 2|required',
        ], [
            'en_name.required' => admin('English Name is required'),
            'en_name.min' => admin('English Name at least must be 2 digits'),
            'ar_name.required' => admin('Arabic Name is required'),
            'ar_name.min' => admin('Arabic Name at least must be 2 digits'),
        ]);
        $data = $request->only([
            'en_name', 'ar_name',
        ]);
        $data['category_id'] = $category_id;
        $data['status'] = $request['status'] == "on" ? 'active' : 'inactive';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $data['image'] = uploadFileImage($image, 'subCategories/images');
        }
        $item = SubCategory::query()->create($data);
        if ($item) {
            $return = ["result" => "ok", "message" => admin("Add Operation Successfully")];
        } else {
            $return = ["result" => "error", "message" => admin("Add Operation Failed")];
        }
        return $return;

    }

    public function show($category_id, $id)
    {
        $data = SubCategory::query()->findOrFail($id);
        return view('admin.pages.categories.subCategories.show', ['data' => $data, 'category_id' => $category_id]);
    }

    public function edit($category_id, $id)
    {
        //
        $data = SubCategory::query()->findOrFail($id);
        return view('admin.pages.categories.subCategories.edit', ['data' => $data, 'category_id' => $category_id]);

    }

    public function update(Request $request, $category_id)
    {

        $request->validate([
            'en_name' => 'min: 2|required',
            'ar_name' => 'min: 2|required',
        ], [
            'en_name.required' => admin('English Name is required'),
            'en_name.min' => admin('English Name at least must be 2 digits'),
            'ar_name.required' => admin('Arabic Name is required'),
            'ar_name.min' => admin('Arabic Name at least must be 2 digits'),
        ]);
        $data = $request->only([
            'en_name', 'ar_name',
        ]);
        $data['category_id'] = $category_id;
        $data['status'] = $request['status'] == "on" ? 'active' : 'inactive';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $data['image'] = uploadFileImage($image, 'subCategories/images');
        }
        $item = SubCategory::query()->findOrFail($request->get('id'))->update($data);
        if ($item) {
            $return = ["result" => "ok", "message" => admin("Edit Operation Successfully")];
        } else {
            $return = ["result" => "error", "message" => admin("Edit Operation Failed")];
        }
        return $return;

    }

    public function destroy(Request $request, $category_id)
    {
        $data = SubCategory::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        if ($data->delete()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }

    public function disable(Request $request, $category_id)
    {
        $data = SubCategory::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        $data->status = 'inactive';
        if ($data->save()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }

    public function activate(Request $request, $category_id)
    {
        $data = SubCategory::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        $data->status = 'active';
        if ($data->save()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }

}

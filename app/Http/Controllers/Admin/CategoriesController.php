<?php

namespace App\Http\Controllers\Admin;


use Carbon\Carbon;
use App\Model\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;

class CategoriesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('can:category-edit',['only' => ['edit','update','activate','disable']]);
        $this->middleware('can:category-view',['only' => ['index','load','show']]);
        $this->middleware('can:category-create',['only' => ['create'.'store']]);
        $this->middleware('can:category-delete',['only' => ['destroy']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('admin.pages.categories.index');
    }

    public function load(Request $request)
    {

        $user = auth('admin')->user();
        $categories = Category::query();

        if ($this->isStoreOwner()) {
            $categories = $categories->where('store_id', $user->store->id);
        }
        $categories = $categories->select('categories.*', 'stores.store_name')->leftJoin('stores', 'categories.store_id', '=', 'stores.id');



        $categoriesSearch = Category::query();
        $search = $request->get('search', false);
        if ($search) {
            $categories = $categoriesSearch->where(function ($query) use ($search) {
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
            ->addColumn('store', function ($category) {
                if ($category->store_id == 0 ){
                    return admin('Categories add by admin (no store)');
                }else{
                    return $category->store->store_name;
                }
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

    protected function isStoreOwner(): bool
    {
        return auth('admin')->user()->role_id == 3;
    }


    public function create()
    {
        return view('admin.pages.categories.add');
    }

    public function store(Request $request)
    {
//        dd($request->all());

        $request->validate([
            'en_name' => 'min: 2|required',
            'ar_name' => 'min: 2|required',
            'store_id' => 'required',
        ], [
            'en_name.required' => admin('English Name is required'),
            'en_name.min' => admin('English Name at least must be 2 digits'),
            'ar_name.required' => admin('Arabic Name is required'),
            'ar_name.min' => admin('Arabic Name at least must be 2 digits'),
            'store_id.required' => admin('The store is required'),
        ]);
        $data = $request->only([
            'en_name', 'ar_name' ,'store_id'
        ]);
        $data['status'] = $request['status'] == "on" ? 'active' : 'inactive';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $data['image'] = uploadFileImage($image, 'categories/images');
        }
        $item = Category::query()->create($data);
        if ($item) {
            $return = ["result" => "ok", "message" => admin("Add Operation Successfully")];
        } else {
            $return = ["result" => "error", "message" => admin("Add Operation Failed")];
        }
        return $return;

    }

    public function show($id)
    {
        $data = Category::query()->findOrFail($id);
        return view('admin.pages.categories.show', ['data' => $data]);
    }

    public function edit($id)
    {
        //
        $data = Category::query()->findOrFail($id);
        return view('admin.pages.categories.edit', ['data' => $data]);

    }

    public function update(Request $request)
    {

        $request->validate([
            'en_name' => 'min: 2|required',
            'ar_name' => 'min: 2|required',
            'store_id' => 'required',
        ], [
            'en_name.required' => admin('English Name is required'),
            'en_name.min' => admin('English Name at least must be 2 digits'),
            'ar_name.required' => admin('Arabic Name is required'),
            'ar_name.min' => admin('Arabic Name at least must be 2 digits'),
            'store_id.required' => admin('The store is required'),
        ]);
        $data = $request->only([
            'en_name', 'ar_name','store_id',
        ]);
        $data['status'] = $request['status'] == "on" ? 'active' : 'inactive';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $data['image'] = uploadFileImage($image, 'categories/images');
        }
        $item = Category::query()->findOrFail($request->get('id'))->update($data);
        if ($item) {
            $return = ["result" => "ok", "message" => admin("Edit Operation Successfully")];
        } else {
            $return = ["result" => "error", "message" => admin("Edit Operation Failed")];
        }
        return $return;

    }

    public function destroy(Request $request)
    {
        $data = Category::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        if ($data->delete()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }

    public function disable(Request $request)
    {
        $data = Category::query()->findOrFail($request->get('id'));
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
        $data = Category::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        $data->status = 'active';
        if ($data->save()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }

}

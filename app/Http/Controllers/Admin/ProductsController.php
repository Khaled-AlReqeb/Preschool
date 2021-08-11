<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\MainStoreProductProperty;
use App\Model\Product;
use App\Model\ProductImage;
use App\Rules\PannelTypeValidator;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('can:product-edit', ['only' => ['edit', 'update', 'activate', 'disable']]);
        $this->middleware('can:product-view', ['only' => ['index', 'load']]);
        $this->middleware('can:product-create', ['only' => ['create', 'store']]);
        $this->middleware('can:product-delete', ['only' => ['destroy']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('admin.pages.products.index');
    }

    public function load(Request $request)
    {
        $user = auth('admin')->user();
        $products = Product::query();

        if ($this->isStoreOwner()) {
            $products = $products->where('store_id', $user->store->id);
        }
        $search = $request->get('search', false);
        $type = $request->get('type', false);
        $products = $products->select('products.*', 'stores.store_name')->leftJoin('stores', 'products.store_id', '=', 'stores.id');
        if ($search) {
            $products = $products->where(function ($query) use ($search) {
                $query->where('en_name', 'like', '%' . $search . '%')
                    ->orWhere('ar_name', 'like', '%' . $search . '%')
                    ->orWhere('store_name', 'like', '%' . $search . '%')
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
        return DataTables::make($products)
            ->escapeColumns([])
            ->addColumn('created_at', function ($product) {
                return Carbon::parse($product->created_at)->toDateString();
            })
            ->addColumn('category', function ($product) {
                return $product->category->name;
            })
            ->addColumn('brand', function ($product) {
                return $product->brand->name;
            })
            ->addColumn('actions', function ($product) {
                return null;
            })
            ->make();
    }

    public function edit($id)
    {

        $data = Product::query()->findOrFail($id);
        $properties = MainStoreProductProperty::query()->where('store_id', $data->store_id)
            ->leftJoin('main_product_properties', 'main_product_properties.id', '=', 'main_store_product_properties.main_product_property_id')
            ->where('main_product_properties.status', 'active')->get();
        if ($this->isStoreOwner()) {
            return view('admin.pages.products.edit_2', ['data' => $data, 'properties' => $properties]);
        }
        return view('admin.pages.products.edit', ['data' => $data, 'properties' => $properties]);
    }

    public function create()
    {
        //if user is store
        if ($this->isStoreOwner()) {
            return view('admin.pages.products.new');
        }
        return view('admin.pages.products.add');
    }

    public function store(Request $request)
    {
        if ($this->isStoreOwner()) {
            $data = $this->getDataToStore($request);

            $item = Product::create($data);
            if ($item) {
                $return = ["result" => "ok", "message" => admin("Add Operation Successfully"), 'id' => $item->id];
            } else {
                $return = ["result" => "error", "message" => admin("Add Operation Failed")];
            }
            return $return;
        }

        $request->validate([
            'en_name' => 'min: 2|required',
            'ar_name' => 'min: 2|required',
            'en_description' => 'min: 2|required',
            'ar_description' => 'min: 2|required',
            'price' => 'numeric|required',
            'quantity' => 'required|numeric',
            'per_order' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'store_id' => [new PannelTypeValidator],
            'cover' => 'required|mimes:png,jpg,jpeg',
        ],
            [
                'en_name.required' => admin('English Name is required'),
                'en_name.min' => admin('English Name at least must be 2 digits'),
                'ar_name.required' => admin('Arabic Name is required'),
                'en_description.required' => admin('English Description is required'),
                'en_description.min' => admin('English Description at least must be 2 digits'),
                'ar_description.required' => admin('Arabic Description is required'),
                'ar_description.min' => admin('Arabic Description at least must be 2 digits'),
                'price.numeric' => admin('Price is not a number'),
                'price.required' => admin('Price is required'),
                'quantity.numeric' => admin('Quantity is not a number'),
                'quantity.required' => admin('Quantity is required'),
                'per_order.numeric' => admin('Products per order is not a number'),
                'per_order.required' => admin('Products per order is required'),
                'category_id.required' => admin('Category is required'),
                'category_id.exists' => admin('Category is not exist'),
                'brand_id.required' => admin('Brand is required'),
                'brand_id.exists' => admin('Brand is not exist'),
                'cover.required' => admin('Product cover is required'),
                'cover.mimes' => admin('Cover extension is not supported'),
            ]);
        $data = $request->only([
            'store_id', 'category_id', 'brand_id', 'ar_name', 'en_name', 'ar_description', 'en_description',
            'price', 'quantity', 'per_order', 'discount', 'end_discount', 'minimum_level', 'original_price'
        ]);
        $data['status'] = $request['status'] == "on" ? 'active' : 'inactive';
        $data['is_featured'] = $request['is_featured'] == "on" ? 'yes' : 'no';

        if ($request->hasFile('cover')) {
            $data['cover'] = uploadFileImage($request->file('cover'), 'products/covers');
        }
        $item = Product::create($data);
        if ($item) {
            $return = ["result" => "ok", "message" => admin("Add Operation Successfully"), 'id' => $item->id];
        } else {
            $return = ["result" => "error", "message" => admin("Add Operation Failed")];
        }
        return $return;
    }

    public function update(Request $request)
    {

        if ($this->isStoreOwner()) {
            $data = $this->getDataToUpdate($request);

            $item = Product::query()->findOrFail($request->get('id'))->update($data);
            if ($item) {
                $return = ["result" => "ok", "message" => admin("Edit Operation Successfully")];
            } else {
                $return = ["result" => "error", "message" => admin("Edit Operation Failed")];
            }
            return $return;
        }


        //dd($request->all());
        $request->validate([
            'en_name' => 'min: 2|required',
            'ar_name' => 'min: 2|required',
            'en_description' => 'min: 2|required',
            'ar_description' => 'min: 2|required',
            'price' => 'numeric|required',
            'quantity' => 'required|numeric',
            'per_order' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'store_id' => new PannelTypeValidator,
            'cover' => 'mimes:png,jpg,jpeg',
        ],
            [
                'en_name.required' => admin('English Name is required'),
                'en_name.min' => admin('English Name at least must be 2 digits'),
                'ar_name.required' => admin('Arabic Name is required'),
                'en_description.required' => admin('English Description is required'),
                'en_description.min' => admin('English Description at least must be 2 digits'),
                'ar_description.required' => admin('Arabic Description is required'),
                'ar_description.min' => admin('Arabic Description at least must be 2 digits'),
                'price.numeric' => admin('Price is not a number'),
                'price.required' => admin('Price is required'),
                'quantity.numeric' => admin('Quantity is not a number'),
                'quantity.required' => admin('Quantity is required'),
                'per_order.numeric' => admin('Products per order is not a number'),
                'per_order.required' => admin('Products per order is required'),
                'category_id.required' => admin('Category is required'),
                'category_id.exists' => admin('Category is not exist'),
                'brand_id.required' => admin('Brand is required'),
                'brand_id.exists' => admin('Brand is not exist'),
                'cover.mimes' => admin('Cover extension is not supported'),

            ]);
        $data = $request->only([
            'store_id', 'category_id', 'brand_id', 'ar_name', 'en_name', 'ar_description', 'en_description',
            'price', 'quantity', 'per_order', 'discount', 'end_discount', 'minimum_level', 'original_price'
        ]);
        $data['status'] = $request['status'] == "on" ? 'active' : 'inactive';
        $data['is_featured'] = $request['is_featured'] == "on" ? 'yes' : 'no';
        if ($request->hasFile('cover')) {
            $data['cover'] = uploadFileImage($request->file('cover'), 'products/covers');
        }
        $item = Product::query()->findOrFail($request->get('id'))->update($data);
        if ($item) {
            $return = ["result" => "ok", "message" => admin("Edit Operation Successfully")];
        } else {
            $return = ["result" => "error", "message" => admin("Edit Operation Failed")];
        }
        return $return;
    }

    public function uploadProductImages(Request $request, $id)
    {
        $data['product_id'] = $id;
        $image = null;
        if ($request->hasFile('image')) {
            $data['image'] = uploadFileImage($request->file('image'), 'products/images');
            $image = ProductImage::create($data);
        }

        return ['result' => 'ok', 'message' => admin('images uploaded successfully'), 'data' => $image];
    }

    public function removeImage($id)
    {
        $item = ProductImage::findOrFail($id)->delete();
        if ($item) {
            $return = ['result' => 'ok', 'message' => admin('File Deleted Successfully')];
        } else {
            $return = ['result' => 'error', 'message' => admin('Delete File Failed!')];
        }
        return $return;
    }

    public function destroy(Request $request)
    {
        $data = Product::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        if ($data->delete()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }

    public function disable(Request $request)
    {
        $data = Product::query()->findOrFail($request->get('id'));
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
        $data = Product::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        $data->status = 'active';
        if ($data->save()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }

    /**
     * @return bool
     */
    protected function isStoreOwner(): bool
    {
        return auth('admin')->user()->role_id == 3;
    }

    /**
     * @param Request $request
     * @return array
     */
    protected function getDataToStore(Request $request): array
    {
        $request->validate([
            'en_name' => 'min: 2|required',
            'ar_name' => 'min: 2|required',
            'en_description' => 'min: 2|required',
            'ar_description' => 'min: 2|required',
            'price' => 'numeric|required',
            'quantity' => 'required|numeric',
//            'per_order' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
//            'store_id' => [new PannelTypeValidator],
            'cover' => 'required|mimes:png,jpg,jpeg',
        ],
            [
                'en_name.required' => admin('English Name is required'),
                'en_name.min' => admin('English Name at least must be 2 digits'),
                'ar_name.required' => admin('Arabic Name is required'),
                'en_description.required' => admin('English Description is required'),
                'en_description.min' => admin('English Description at least must be 2 digits'),
                'ar_description.required' => admin('Arabic Description is required'),
                'ar_description.min' => admin('Arabic Description at least must be 2 digits'),
                'price.numeric' => admin('Price is not a number'),
                'price.required' => admin('Price is required'),
                'quantity.numeric' => admin('Quantity is not a number'),
                'quantity.required' => admin('Quantity is required'),
//                'per_order.numeric' => admin('Products per order is not a number'),
//                'per_order.required' => admin('Products per order is required'),
                'category_id.required' => admin('Category is required'),
                'category_id.exists' => admin('Category is not exist'),
                'brand_id.required' => admin('Brand is required'),
                'brand_id.exists' => admin('Brand is not exist'),
                'cover.required' => admin('Product cover is required'),
                'cover.mimes' => admin('Cover extension is not supported'),
            ]);
        $data = $request->only([
//            'store_id',
            'category_id', 'brand_id', 'ar_name', 'en_name', 'ar_description', 'en_description',
            'price', 'quantity',
//            'per_order',
//            'discount',
//            'end_discount',
//            'minimum_level',
//            'original_price'
        ]);
        $data['status'] = 'active';
        $data['is_featured'] = 'yes';

        $data['original_price'] = $data['price'];
        $data['discount'] = 0;
        $data['end_discount'] = null;
        $data['minimum_level'] = 0;
        $data['store_id'] = auth('admin')->user()->store->id;
        if ($request->hasFile('cover')) {
            $data['cover'] = uploadFileImage($request->file('cover'), 'products/covers');
        }
        return $data;
    }

    private function getDataToUpdate(Request $request)
    {
        $request->validate([
            'en_name' => 'min: 2|required',
            'ar_name' => 'min: 2|required',
            'en_description' => 'min: 2|required',
            'ar_description' => 'min: 2|required',
            'price' => 'numeric|required',
            'quantity' => 'required|numeric',
//            'per_order' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
//            'store_id' => new PannelTypeValidator,
            'cover' => 'mimes:png,jpg,jpeg',
        ],
            [
                'en_name.required' => admin('English Name is required'),
                'en_name.min' => admin('English Name at least must be 2 digits'),
                'ar_name.required' => admin('Arabic Name is required'),
                'en_description.required' => admin('English Description is required'),
                'en_description.min' => admin('English Description at least must be 2 digits'),
                'ar_description.required' => admin('Arabic Description is required'),
                'ar_description.min' => admin('Arabic Description at least must be 2 digits'),
                'price.numeric' => admin('Price is not a number'),
                'price.required' => admin('Price is required'),
                'quantity.numeric' => admin('Quantity is not a number'),
                'quantity.required' => admin('Quantity is required'),
                'category_id.required' => admin('Category is required'),
                'category_id.exists' => admin('Category is not exist'),
                'brand_id.required' => admin('Brand is required'),
                'brand_id.exists' => admin('Brand is not exist'),
                'cover.mimes' => admin('Cover extension is not supported'),

            ]);
        $data = $request->only([
             'category_id', 'brand_id', 'ar_name', 'en_name', 'ar_description', 'en_description',
            'price', 'quantity'
        ]);
        $data['status'] = 'active' ;
        $data['is_featured'] = 'yes' ;


        $data['original_price'] = $data['price'];
        $data['discount'] = 0;
        $data['end_discount'] = null;
        $data['minimum_level'] = 0;

        if ($request->hasFile('cover')) {
            $data['cover'] = uploadFileImage($request->file('cover'), 'products/covers');
        }
        return $data;
    }

}

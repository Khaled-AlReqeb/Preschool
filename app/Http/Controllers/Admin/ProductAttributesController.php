<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Country;
use App\Model\CountryPhoneCode;
use App\Model\Product;
use App\Model\ProductAttribute;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductAttributesController extends Controller
{

    public function index(Product $product)
    {
        return view('admin.pages.product_attribute.index')->with(
           [ 'product_id' => $product->id,]
        );
    }

    public function load(Request $request, Product $product)
    {
        $product_attributes = ProductAttribute::query()->where('product_id', $product->id);
        $search = false;
//        $search = $request->get('search', false);
//        if ($search) {
//            $countries = $countries->where(function ($query) use ($search) {
//                $query->where('en_name', 'like', '%' . $search . '%')
//                    ->orWhere('ar_name', 'like', '%' . $search . '%')
//                    ->orWhere('native_name', 'like', '%' . $search . '%')
//                    ->orWhere('code', 'like', '%' . $search . '%')
//                    ->orWhere('status', 'like', '%' . $search . '%')
//                    ->orWhere('id', 'like', '%' . $search . '%');
//                if (strpos('فعال', $search) !== false) {
//                    $query->orwhere('status', 'active');
//                }
//                if (strpos('معطل', $search) !== false) {
//                    $query->orwhere('status', 'like', '%' . 'inactive' . '%');
//                }
//
//            });
//        }
        return DataTables::make($product_attributes)
            ->escapeColumns([])
            ->addColumn('created_at', function ($product_attribute) {
                return Carbon::parse($product_attribute->created_at)->toDateString();
            })
            ->addColumn('product_name', function ($product_attribute) {
                return $product_attribute->product->name;
            })
            ->addColumn('attribute_name', function ($product_attribute) {
                return $product_attribute->attribute->name;
            })
            ->addColumn('value', function ($product_attribute) {
                return $product_attribute->name;
            })->addColumn('additional_price', function ($product_attribute) {
                return $product_attribute->additional_price;
            })
            ->addColumn('actions', function ($product_attribute) {
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
        return view('admin.pages.product_attribute.add');
    }

    public function store(Request $request)
    {
        $data = $this->getValidatedData($request);

        $item = ProductAttribute::query()->create($data);

        if ($item) {
            $return = ["result" => "ok", "message" => admin("Add Operation Successfully")];
        } else {
            $return = ["result" => "error", "message" => admin("Add Operation Failed")];
        }
        return $return;
    }


    public function edit($id)
    {

        $data = ProductAttribute::query()->findOrFail($id);
        return view('admin.pages.product_attribute.edit', ['data' => $data]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'en_name' => 'min: 2|required',
            'ar_name' => 'min: 2|required',
            'native_name' => ['required'],
            'continent_id' => ['required'],
            'code' => ['required'],
        ],
            [
                'en_name.required' => admin('English Name is required'),
                'en_name.min' => admin('English Name at least must be 2 digits'),
                'ar_name.required' => admin('Arabic Name is required'),
                'ar_name.min' => admin('Arabic Name at least must be 2 digits'),
                'native_name.required' => admin('Native Name is required'),
                'continent_id.required' => admin('Continent is required'),
                'code.required' => admin('Country Code is required'),
            ]);
        $data = $request->only([
            'en_name', 'ar_name', 'native_name', 'code', 'continent_id',
        ]);
        $data['status'] = $request['status'] == "on" ? 'active' : 'inactive';
        if ($request->hasFile('flag_image')) {
            $flag_image = $request->file('flag_image');
            $data['flag_image'] = uploadFileImage($flag_image, 'product_attribute/flags');
        }
        $item = Country::query()->findOrFail($request->get('id'))->update($data);
        if ($item) {
            $codes = $request->get('codes', false);
            if ($codes) {
                foreach ($codes as $code) {
                    if ($code['code'] != null) {
                        $newData['country_id'] = $request->get('id');
                        $newData['code'] = $code['code'];
                        CountryPhoneCode::query()->create($newData);
                    }
                }
            }
            $oldCodes = $request->get('oldCode', false);
            if ($oldCodes && sizeof($oldCodes) > 0) {
                foreach ($oldCodes as $oldCode) {
                    if ($code['code'] != null) {
                        CountryPhoneCode::query()->where('id', $oldCode['id'])->update(['code' => $oldCode['code']]);
                    }
                }
            }

            $return = ["result" => "ok", "message" => admin("Edit Operation Successfully")];
        } else {
            $return = ["result" => "error", "message" => admin("Edit Operation Failed")];
        }
        return $return;
    }

    public function destroy(Request $request)
    {
        $data = Country::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        if ($data->delete()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }

    public function destroyPhoneCode(Request $request)
    {
        $data = CountryPhoneCode::query()->findOrFail($request->get('id'));
        $item = Country::query()->findOrFail($data->country_id);
        if (!$data) return response(["msg" => "not found"], 404);
        if ($data->delete()) {
            return response(["msg" => "success", 'data' => $item->phoneCodes], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }

    public function disable(Request $request)
    {
        $data = Country::query()->findOrFail($request->get('id'));
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
        $data = Country::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        $data->status = 'active';
        if ($data->save()) {
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
            'product_id' => 'required',
            'attribute_id' => 'required',
            'name' => ['required'],
            'additional_price' => ['required', 'numeric'],

        ],
            [
                'product_id.required' => admin('Product Name is required'),
                'attribute_id.required' => admin('Attribute Name is required'),
                'name.required' => admin('Value is required'),
                'additional_price.required' => admin('Additional Price is required'),
                'additional_price.numeric' => admin('Additional Price must be number'),
            ]);
        $data = $request->only([
            'product_id', 'attribute_id', 'name', 'additional_price'
        ]);
        return $data;
    }
}

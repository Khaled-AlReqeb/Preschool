<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Model\ProductImage;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Rules\PannelTypeValidator;
use App\Model\MainProductProperty;
use App\Model\ProductProperty;
use App\Http\Controllers\Controller;
use App\Model\MainProductSubProperty;
use App\Model\MainStoreProductProperty;
use Illuminate\Contracts\Support\Renderable;

class ProductPropertiesController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      /*   $this->middleware('can:item-edit',['only' => ['edit','update','activate','disable']]);
        $this->middleware('can:item-view',['only' => ['index','load','show']]);
        $this->middleware('can:item-create',['only' => ['create'.'store']]);
        $this->middleware('can:item-delete',['only' => ['destroy']]); */
        $this->middleware('can:root-user',['only' => ['main_properties_index','main_properties_load',
                            'main_properties_create','main_properties_store',
                            'main_properties_disable','main_properties_activate',
                            'main_properties_edit','main_properties_update']]);
    }
    public function main_properties_index()
    {
        return view('admin.pages.main_properties.index');
    }

    public function main_properties_load(Request $request)
    {
        $items = MainProductProperty::query();
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
  
    public function main_properties_create()
    {
        return view('admin.pages.main_properties.add');
    }

    public function main_properties_store(Request $request)
    {
        $request->validate([
            'en_name' => 'min: 2|required',
            'ar_name' => 'min: 2|required',
        ],
            [
                'en_name.required' => admin('English Name is required'),
                'en_name.min' => admin('English Name at least must be 2 digits'),
                'ar_name.required' => admin('Arabic Name is required'),
                'ar_name.min' => admin('Arabic Name at least must be 2 digits'),

            ]);
        $data = $request->only([
            'en_name', 'ar_name', 
        ]);
        $item = MainProductProperty::query()->create($data);
        if ($item) {
            $return = ["result" => "ok", "message" => admin("Add Operation Successfully")];
        } else {
            $return = ["result" => "error", "message" => admin("Add Operation Failed")];
        }
        return $return;

    }
    public function main_properties_edit($id)
    {
        $data = MainProductProperty::query()->findOrFail($id);
        return view('admin.pages.main_properties.edit',['data'=>$data]);
    }
     
    public function main_properties_update(Request $request,$id)
    {
        $request->validate([
            'en_name' => 'min: 2|required',
            'ar_name' => 'min: 2|required',
        ],
            [
                'en_name.required' => admin('English Name is required'),
                'en_name.min' => admin('English Name at least must be 2 digits'),
                'ar_name.required' => admin('Arabic Name is required'),
                'ar_name.min' => admin('Arabic Name at least must be 2 digits'),

            ]);
        $data = $request->only([
            'en_name', 'ar_name', 
        ]);
        $item = MainProductProperty::query()->findOrFail($id)->update($data);
        if ($item) {
            $return = ["result" => "ok", "message" => admin("Edit Operation Successfully")];
        } else {
            $return = ["result" => "error", "message" => admin("Edit Operation Failed")];
        }
        return $return;

    }

    public function main_properties_destroy(Request $request)
    {
        $data = MainProductProperty::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        if ($data->delete()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }
    public function main_properties_disable(Request $request)
    {
        $data = MainProductProperty::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        $data->status = 'inactive';
        if ($data->save()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }

    public function main_properties_activate(Request $request)
    {
        $data = MainProductProperty::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        $data->status = 'active';
        if ($data->save()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }
    
    //sub_properties
    public function main_sub_properties_load(Request $request,$id)
    {
        $items = MainProductProperty::query()->findOrFail($id)->sub_properties;       
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
    public function main_sub_properties_store(Request $request,$id)
    {
        $request->validate([
            'pro_en_name' => 'min: 2|required',
            'pro_ar_name' => 'min: 2|required',
        ],
            [
                'pro_en_name.required' => admin('English Name is required'),
                'pro_en_name.min' => admin('English Name at least must be 2 digits'),
                'pro_ar_name.required' => admin('Arabic Name is required'),
                'pro_ar_name.min' => admin('Arabic Name at least must be 2 digits'),

            ]);
        $data['ar_name'] = $request->pro_ar_name;
        $data['en_name'] = $request->pro_en_name;
        $data['main_product_property_id'] = $id;

        $item = MainProductSubProperty::query()->create($data);
        if ($item) {
            $return = ["result" => "ok", "message" => admin("Add Operation Successfully")];
        } else {
            $return = ["result" => "error", "message" => admin("Add Operation Failed")];
        }
        return $return;
  
    }
    public function main_sub_properties_destroy(Request $request)
    {
        $data = MainProductSubProperty::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        if ($data->delete()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }
    //store_product_properties
    public function store_product_properties_index($store_id)
    {
        return view('admin.pages.stores.product_properties.index',['store_id'=>$store_id]);

    }
    public function unselected_store_product_properties_load(Request $request,$store_id)
    {
        $selected_items = MainStoreProductProperty::query()->where('store_id',$store_id)->get();
        $items = MainProductProperty::query()->where('status','active')
        ->whereNotIn('id',$selected_items->pluck('main_product_property_id')->toArray());
        $search = $request->get('search', false);
        if ($search) {
            $items = $items->where(function ($query) use ($search) {
                $query->where('en_name', 'like', '%' . $search . '%')
                    ->orWhere('ar_name', 'like', '%' . $search . '%')
                    ->orWhere('id', 'like', '%' . $search . '%')
                    ->orWhere('status', 'like', '%' . $search . '%');
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
    public function selected_store_product_properties_load(Request $request,$store_id)
    {
        //$main_properties = MainProductProperty::query()->where('status','active')->get();
        $items = MainStoreProductProperty::query()->select('main_store_product_properties.*','main_product_properties.status as main_status')
        ->leftJoin('main_product_properties','main_store_product_properties.main_product_property_id','main_product_properties.id')
        ->where('store_id',$store_id);
        
        $search = $request->get('search', false);
        if ($search) {
            $items = $items->where(function ($query) use ($search) {
                $query->where('en_name', 'like', '%' . $search . '%')
                    ->orWhere('ar_name', 'like', '%' . $search . '%')
                    ->orWhere('id', 'like', '%' . $search . '%')
                    ->orWhere('status', 'like', '%' . $search . '%');
            });
        }
        return DataTables::make($items)
            ->escapeColumns([])
            ->addColumn('created_at', function ($item) {
                return Carbon::parse($item->created_at)->toDateString();
            })
            ->addColumn('name', function ($item) {
                return $item->main_product_property->name;
            })
            ->addColumn('actions', function ($item) {
                return null;
            })
            ->make();

        return view('admin.pages.stores.product_properties.index',[
            'main_properties' => $main_properties,
            'main_store_properties' => $main_store_properties,
        ]);

    }
    public function store_product_properties_add(Request $request,$store_id)
    {
        $data['store_id'] = $store_id;
        $data['main_product_property_id'] = $request->get('id');
        if (MainStoreProductProperty::query()->create($data)) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }
    public function store_product_properties_destroy(Request $request)
    {
        $data = MainStoreProductProperty::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        if ($data->delete()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }
    public function store_product_properties_activate(Request $request)
    {
        $data = MainStoreProductProperty::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        $data->status = 'active';
        if ($data->save()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }
    public function store_product_properties_disable(Request $request)
    {
        $data = MainStoreProductProperty::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        $data->status = 'inactive';
        if ($data->save()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }
    //product_properties
    public function product_properties_load(Request $request,$id)
    {
        $items = ProductProperty::query();
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
            ->addColumn('property', function ($item) {
                return $item->main_product_property->name;
            })
            ->addColumn('sub_property', function ($item) {
                return optional($item->main_product_sub_property)->name ?? '---';
            })
            ->addColumn('other_values', function ($item) {
                return ($item->main_product_property->id == 1 ) ? $item->other_values : '---' ;
            })
            ->addColumn('actions', function ($item) {
                return null;
            })
            ->make();
    }
    public function product_property_store(Request $request,$id)
    {
        $data['product_id'] = $id;
        $data['main_product_property_id'] = $request->get('main_product_property_id');
        $data['sub_main_property_id'] = $request->get('sub_main_property_id');
        $data['additional_price'] = $request->get('additional_price');
        $data['other_values'] = $request->get('other_values');
        if (ProductProperty::query()->create($data)) {
            $return = ["result" => "ok", "message" => admin("Add Operation Successfully")];
        } else {
            $return = ["result" => "error", "message" => admin("Add Operation Failed")];
        }
        return $return;
    }
    public function product_property_destroy(Request $request)
    {
        $data = ProductProperty::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        if ($data->delete()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }
    
}

<?php

namespace App\Http\Controllers\Admin;

use App\Model\User;
use App\Model\Role;
use App\Model\City;
use App\Model\Brand;
use App\Model\Store;
use App\Model\Country;
use App\Model\Product;
use App\Model\Currency;
use App\Model\Category;
use App\Model\Continent;
use App\Model\SubCategory;
use Illuminate\Http\Request;
use App\Model\CountryPhoneCode;
use Yajra\DataTables\DataTables;
use App\Model\MainProductProperty;
use App\Http\Controllers\Controller;
use App\Model\MainProductSubProperty;

class CommonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function loadCurrencies(Request $request)
    {
        $query = Currency::query()->where('status', 'active');
        $search = strtolower($request->get('search', false));
        if ($search) {
            $query = $query->where(function ($query) use ($search) {
                return $query->whereRaw('lower(en_name) like (?)', ["%{$search}%"])
                    ->orwhereRaw('lower(ar_name) like (?)', ["%{$search}%"])
                    ->orwhereRaw('lower(iso) like (?)', ["%{$search}%"])
                    ->orwhereRaw('lower(id) like (?)', ["%{$search}%"]);
            });
        }
        $data = $query->paginate(25);
        return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
    }
    public function loadUsers(Request $request)
    {
        $query = User::query()->where('status', 'active');
        $search = strtolower($request->get('search', false));
        if ($search) {
            $query = $query->where(function ($query) use ($search) {
                return $query->whereRaw('lower(first_name) like (?)', ["%{$search}%"])
                    ->orwhereRaw('lower(last_name) like (?)', ["%{$search}%"])
                    ->orwhereRaw('lower(id) like (?)', ["%{$search}%"])
                    ->orwhereRaw('lower(mobile) like (?)', ["%{$search}%"])
                    ->orwhereRaw('lower(email) like (?)', ["%{$search}%"]);
            });
        }
        $data = $query->paginate(25);
        return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
    }
    public function loadBrands(Request $request)
    {
        $query = Brand::query()->where('status', 'active');
        $search = strtolower($request->get('search', false));
        if ($search) {
            $query = $query->where(function ($query) use ($search) {
                return $query->whereRaw('lower(ar_name) like (?)', ["%{$search}%"])
                    ->orwhereRaw('lower(en_name) like (?)', ["%{$search}%"])
                    ->orwhereRaw('lower(id) like (?)', ["%{$search}%"]);
            });
        }
        $data = $query->paginate(25);
        return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
    }
    public function loadStores(Request $request)
    {
        $query = Store::query()->where('status', 'active');
        $search = strtolower($request->get('search', false));
        if ($search) {
            $query = $query->where(function ($query) use ($search) {
                return $query->whereRaw('lower(store_name) like (?)', ["%{$search}%"])
                    ->orwhereRaw('lower(id) like (?)', ["%{$search}%"])
                    ->orwhereRaw('lower(store_email) like (?)', ["%{$search}%"]);
            });
        }
        $data = $query->paginate(25);
        return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
    }  
    public function loadRoles(Request $request)
    {
        $query = Role::query()->where('id','!=',1);
        $search = strtolower($request->get('search', false));
        if ($search) {
            $query = $query->where(function ($query) use ($search) {
                return $query->whereRaw('lower(name) like (?)', ["%{$search}%"])
                    ->orwhereRaw('lower(id) like (?)', ["%{$search}%"]);
            });
        }
        $data = $query->paginate(25);
        return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
    }
    public function loadContinents(Request $request)
    {
        $query = Continent::query()->where('status', 'active')->where('deleted_at', NULL);
        $search = strtolower($request->get('search', false));
        if ($search) {
            $query = $query->where(function ($query) use ($search) {
                return $query->whereRaw('lower(en_name) like (?)', ["%{$search}%"])
                    ->orwhereRaw('lower(ar_name) like (?)', ["%{$search}%"])
                    ->orwhereRaw('lower(id) like (?)', ["%{$search}%"]);
            });
        }
        $data = $query->paginate(25);
        return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
    }
    public function loadCities(Request $request)
    {
        $query = City::query()->where('status', 'active')->where('deleted_at', NULL);
        $country_id = strtolower($request->get('country_id', false));

        if ($country_id) {
            $query = $query->where(function ($query) use ($country_id) {
                return $query->whereRaw('lower(country_id) like (?)', $country_id);
            });
        }
        $search = strtolower($request->get('search', false));
        if ($search) {
            $query = $query->where(function ($query) use ($search) {
                return $query->whereRaw('lower(en_name) like (?)', ["%{$search}%"])
                    ->orwhereRaw('lower(ar_name) like (?)', ["%{$search}%"])
                    ->orwhereRaw('lower(id) like (?)', ["%{$search}%"]);
            });
        }
        $data = $query->paginate(25);
        return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
    }

    public function loadCountries(Request $request)
    {
        $query = Country::query()->where('status', 'active')->where('deleted_at', NULL);
        $search = strtolower($request->get('search', false));
        if ($search) {
            $query = $query->where(function ($query) use ($search) {
                return $query->whereRaw('lower(en_name) like (?)', ["%{$search}%"])
                    ->orwhereRaw('lower(ar_name) like (?)', ["%{$search}%"])
                    ->orwhereRaw('lower(native_name) like (?)', ["%{$search}%"])
                    ->orwhereRaw('lower(code) like (?)', ["%{$search}%"])
                    ->orwhereRaw('lower(id) like (?)', ["%{$search}%"]);
            });
        }
        $data = $query->paginate(25);
        return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
    }

    public function loadPhoneCodes(Request $request)
    {
        $query = CountryPhoneCode::query()->where('status', 'active')->where('deleted_at', NULL);
        $country_id = strtolower($request->get('country_id', false));

        if ($country_id) {

            $query = $query->where(function ($query) use ($country_id) {
                return $query->whereRaw('lower(country_id) like (?)', $country_id);
            });

        }
        $search = strtolower($request->get('search', false));
        if ($search) {
            $query = $query->where(function ($query) use ($search) {
                return $query->whereRaw('lower(code) like (?)', ["%{$search}%"])
                    ->orwhereRaw('lower(id) like (?)', ["%{$search}%"]);
            });
        }
        $data = $query->paginate(25);
        return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
    }

    public function loadCategories(Request $request)
    {
        $query = Category::query()->where('status', 'active')->where('deleted_at', NULL);
        $search = strtolower($request->get('search', false));
        if ($search) {
            $query = $query->where(function ($query) use ($search) {
                return $query->whereRaw('lower(en_name) like (?)', ["%{$search}%"])
                    ->orwhereRaw('lower(ar_name) like (?)', ["%{$search}%"])
                    ->orwhereRaw('lower(id) like (?)', ["%{$search}%"]);
            });
        }
        $data = $query->paginate(25);
        return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
    }

    public function loadSubCategories(Request $request)
    {
        $query = SubCategory::query()->where('status', 'active')->where('deleted_at', NULL);
        $search = strtolower($request->get('search', false));
        if ($search) {
            $query = $query->where(function ($query) use ($search) {
                return $query->whereRaw('lower(en_name) like (?)', ["%{$search}%"])
                    ->orwhereRaw('lower(ar_name) like (?)', ["%{$search}%"])
                    ->orwhereRaw('lower(id) like (?)', ["%{$search}%"]);
            });
        }
        $data = $query->paginate(25);
        return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
    }
    public function loadProducts(Request $request)
    {
        $query = Product::query()->where('status', 'active')->where('deleted_at', NULL);
        $search = strtolower($request->get('search', false));
        if ($search) {
            $query = $query->where(function ($query) use ($search) {
                return $query->whereRaw('lower(en_name) like (?)', ["%{$search}%"])
                    ->orwhereRaw('lower(ar_name) like (?)', ["%{$search}%"])
                    ->orwhereRaw('lower(id) like (?)', ["%{$search}%"]);
            });
        }
        $data = $query->paginate(25);
        return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
    }
    public function loadProductProperties(Request $request)
    {
        $query = MainProductProperty::query()->where('status', 'active')->where('deleted_at', NULL);
        $search = strtolower($request->get('search', false));
        if ($search) {
            $query = $query->where(function ($query) use ($search) {
                return $query->whereRaw('lower(en_name) like (?)', ["%{$search}%"])
                    ->orwhereRaw('lower(ar_name) like (?)', ["%{$search}%"])
                    ->orwhereRaw('lower(id) like (?)', ["%{$search}%"]);
            });
        }
        $data = $query->paginate(25);
        return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
    }
    public function loadSubProperties(Request $request,$id)
    {
        $query = MainProductSubProperty::query()->where('status', 'active')->where('main_product_property_id',$id)->where('deleted_at', NULL);
        $search = strtolower($request->get('search', false));
        if ($search) {
            $query = $query->where(function ($query) use ($search) {
                return $query->whereRaw('lower(en_name) like (?)', ["%{$search}%"])
                    ->orwhereRaw('lower(ar_name) like (?)', ["%{$search}%"])
                    ->orwhereRaw('lower(id) like (?)', ["%{$search}%"]);
            });
        }
        $data = $query->paginate(25);
        return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
    }
}

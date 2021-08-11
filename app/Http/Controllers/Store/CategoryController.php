<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Client;
use App\Model\Product;
use App\Model\Store;
use App\Model\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;
use function GuzzleHttp\Promise\all;

class CategoryController extends Controller
{
    public function index($id)
//    public function index($name)
    {

        $clients = Client::where('id' , auth()->guard('client')->id())->get();
//        $products = Product::where('status' , 'active')->get();
//        $products = Product::where('status' , 'active')->orderBy('id' , 'desc')->paginate(10);
//        dd($products);

        $allStore = Store::where('status' , 'active')->get();
        $storeName = session()->get('store');
        foreach ($allStore as $oneStore){
//

            if (strtolower($oneStore->store_name) == $storeName){
                $categories = \App\Model\Category::where(['status' =>'active' , 'store_id' => $oneStore->id])->get();
                $categoryData = Category::where(['id'=>$id ,  'store_id' => $oneStore->id])->get();
//                if ($categoryData != true){
//                    return abort(404);
//                }
                $products = Product::where(['status' =>'active' , 'store_id' => $oneStore->id])->orderBy('id' , 'desc')->paginate(10);
                $main_products = [];
                $items = [];
                $temp = 0;
                foreach ($products as $product) {
                    $items [] = $product;
                    if (count($items) == 3){
                        $main_products[] = $items;
                        $items = [];
                    }
                    if ($temp++ == count($products) - 1 && count($items) > 0){
                        $main_products[] = $items;
                    }

//            dd($main_products);
                }
            }
        }


//        $categories = Category::where('status' , 'active')->get();
        $subCategories = SubCategory::where(['status' => 'active'])->get();
//        $categoryData = Category::where('id' , $id)->get();
//      $categoryData = Category::where('en_name' , $name)->get();



        $productsForCategory = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->where( 'categories.id', $id)
            ->where( 'categories.status', 'active')
            ->where( 'products.deleted_at', Null)
            ->select('products.*')
//            ->where( 'categories.en_name', $name)
            ->paginate(12);
//            ->get();

//        dd($productsForCategory);
        return view('store.categories.index' ,
            compact(
                'productsForCategory' ,
                'categories' ,
                'subCategories' ,
                'categoryData',
                'clients',
                'products',
                'main_products' ));
    }
}

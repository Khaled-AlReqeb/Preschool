<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Store;
use App\Model\SubCategory;
use Illuminate\Http\Request;
use App\Model\Client;
use App\Model\Product;

class productController extends Controller
{
     public function index($id)
        {

            $allStore = Store::where('status' , 'active')->get();
            $storeName = session()->get('store');
            foreach ($allStore as $oneStore){
//

                if (strtolower($oneStore->store_name) == $storeName){
                    $categories = Category::where(['status' =>'active' , 'store_id' => $oneStore->id])->get();
                    $product = Product::with('images')->where('store_id', $oneStore->id)->find($id);
                    $products = Product::where(['status'=>'active' ,  'store_id' => $oneStore->id])->get();
                    if ($product != true){
                       return abort(404);
                    }
                }
            }
//
//            $product = Product::find($id);
//            $products = Product::where('status' , 'active')->get();
//            $categories = Category::where('status' , 'active')->get();
            $subCategories = SubCategory::where(['status' => 'active'])->get();

            $clients = Client::where('id' , auth()->guard('client')->id())->get();
            return view('store.products.show' , compact('product' ,'products' ,'categories' ,'subCategories' , 'clients'));
        }
}

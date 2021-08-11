<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Client;
use App\Model\Order;
use App\Model\Product;
use App\Model\Store;
use App\Model\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {



        $allStore = Store::where('status' , 'active')->get();
        $storeName = session()->get('store');
        foreach ($allStore as $oneStore){
//

            if (strtolower($oneStore->store_name) == $storeName){
//                dd($oneStore->id);
                $categories = \App\Model\Category::where(['status' =>'active' , 'store_id' => $oneStore->id])->get();
                $products = Product::where(['status' =>'active' , 'store_id' => $oneStore->id])->get();
                dd(url('store/index'));
            }elseif(strtolower($oneStore->store_name) != $storeName){
                $products = Product::where('status','active')->get();
                dd(url('store/index'));
            }
        }




//        $store = Category::where('store_id', '=', $store->id)->get();

//        $products = Product::where('status' , 'active')->get();
//        $categories = Category::where('status' , 'active')->get();
        $subCategories = SubCategory::where(['status' => 'active'])->get();

//        $subCategories = DB::table('sub_categories')
//            ->join('categories', 'categories.id', '=', 'sub_categories.category_id')
////            ->where( 'categories.id', $id)
////            ->where( 'categories.en_name', $name)
//            ->get();

//        dd($subCategories);
        $clients = Client::where('id' , auth()->guard('client')->id())->get();
        return view('store.home.index' , compact('products' , 'categories', 'allStore' ,'subCategories', 'clients'));
    }

    public function cart()
    {
//        if (auth()->guard('client')) {
//        if (auth()->guard('client')->id() != '') {
        $clients = Client::where('id' , auth()->guard('client')->id())->get();
        $categories = Category::where('status' , 'active')->get();
        $subCategories = SubCategory::where(['status' => 'active'])->get();

        return view('store.home.cart' , compact('clients' , 'categories', 'subCategories'));
//        }else{
//            return redirect("store/login")->withSuccess('Oppes! You have entered invalid credentials');
//
//        }
    }

    public function addToCart($id)
    {
        $product = Product::find($id);

        if(!$product) {

            abort(404);

        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                $id => [
                    "product_id" => $product->id,
                    "en_name" => $product->en_name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "cover" => $product->cover
                ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "product_id" => $product->id,
            "en_name" => $product->en_name,
            "quantity" => 1,
            "price" => $product->price,
            "cover" => $product->cover
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

//    public function storeOrder(Request $request)
//    {
////        $request->validate([
////            'en_name' => 'min: 2|required',
////            'ar_name' => 'min: 2|required',
////        ], [
////            'en_name.required' => admin('English Name is required'),
////            'en_name.min' => admin('English Name at least must be 2 digits'),
////            'ar_name.required' => admin('Arabic Name is required'),
////            'ar_name.min' => admin('Arabic Name at least must be 2 digits'),
////        ]);
//
////        return $request->get('product_id') ;
//
//        foreach($request->get('product_id') as $product)
//        {
//
//            $order = Order::create([
////                'product_id' =>$product,
//                'product_id' => $request['product_id'],
//                'client_id' => 1,
//                'quantity' => $request['quantity'],
//                'price' => $request['price'],
//            ]);
//
//        }
//
//
//
//    }

    public function storeOrder(Request $request)
    {
//        $request->validate([
//            'en_name' => 'min: 2|required',
//            'ar_name' => 'min: 2|required',
//        ], [
//            'en_name.required' => admin('English Name is required'),
//            'en_name.min' => admin('English Name at least must be 2 digits'),
//            'ar_name.required' => admin('Arabic Name is required'),
//            'ar_name.min' => admin('Arabic Name at least must be 2 digits'),
//        ]);
//        $client = auth()->guard('client')->id();

//        dd($client);

        if (auth()->guard('client')->id() != ''){
//            if (auth()->user()){
            foreach($request->get('product_id') as $key => $product)
            {

                $order = Order::create([
//                'product_id' =>$product,
                    'product_id' => $request['product_id'][$key],
                    'client_id' => auth()->guard('client')->id(),
                    'quantity' => $request['quantity'][$key],
                    'price' => $request['price'][$key],
                ]);


            }
            alert()->success('Your request has been successfully executed','Done');
            return back();
//        dd($order);
        }
        else{
            return redirect("store/login")->withSuccess('Oppes! You have entered invalid credentials');
        }



    }

    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }


    public function error($status){
        switch($status){
            case 401:
                $view = 'errors/401';
                break;
            case 403:
                $view = 'errors/403';
                break;
            case 404:
                $view = 'errors/404';
                break;
            case 419:
                $view = 'errors/419';
                break;
            case 429:
                $view = 'errors/429';
                break;
            case 500:
                $view = 'errors/500';
                break;
            case 503:
                $view = 'errors/503';
                break;
        }
        return view($view);
    }
}

//
//<input type="text" name="product_id[]" value=" {{ $details['product_id'] }}" class="form-control" />
//
//                            <input type="number" name="quantity[]" value="{{ $details['quantity'] }}" class="form-control quantity" />
//
//                            <input type="number" name="price[]" value="{{ $details['price'] * $details['quantity'] }}" class="form-control" />

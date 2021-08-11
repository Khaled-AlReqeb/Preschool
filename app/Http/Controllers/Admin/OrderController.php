<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;


class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:order-edit',['only' => ['edit','update','activate','disable']]);
        $this->middleware('can:service-view',['only' => ['index','load','show']]);
        $this->middleware('can:service-create',['only' => ['create'.'store']]);
        $this->middleware('can:service-delete',['only' => ['destroy']]);
    }

    public function index()
    {
//        $orders = Order::with('product' , 'client')->get();
//        dd($orders);

        return view('admin.pages.orders.index');
    }

    public function load(Request $request)
    {
//         $user = auth('admin')->user();
        $orders = Order::query();

//         if ($this->isStoreOwner()) {
//            $orders = $orders->where('store_id', $user->store->id);
//        }
        $search = $request->get('search', false);
        if ($search) {
            $orders = $orders->where(function ($query) use ($search) {
                $query->where('price', 'like', '%' . $search . '%')
                    ->orWhere('quantity', 'like', '%' . $search . '%')
                    ->orWhere('id', 'like', '%' . $search . '%');
            });
        }
        return DataTables::make($orders)
            ->escapeColumns([])
            ->addColumn('created_at', function ($order) {
                return Carbon::parse($order->created_at)->toDateString();
            })
            ->addColumn('product', function ($order) {
                return $order->product->name;
            })
            ->addColumn('cover', function ($order) {
                return  '<img src="' . $order->product->cover . '" width="80px" height="80px" class="img-circle">';
            })
            ->addColumn('client', function ($order) {
                return $order->client->name;
            })
//            ->addColumn('name', function ($order) {
//                return $order->name;
//            })
            ->addColumn('actions', function ($order) {
                return null;
            })
            ->make();
    }
//    public function create()
//    {
//        return view('admin.pages.services.add');
//    }


    public function show($id)
    {
        $data = Order::query()->findOrFail($id);
        return view('admin.pages.orders.show', ['data' => $data]);
    }

//    public function edit($id)
//    {
//        //
//        $data = Order::query()->findOrFail($id);
//        return view('admin.pages.orders.edit', ['data' => $data]);
//
//    }

    public function destroy(Request $request)
    {
        $data = Order::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        if ($data->delete()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }

}

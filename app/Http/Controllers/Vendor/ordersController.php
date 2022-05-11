<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Models\Garage;
use App\Models\Order;
use Illuminate\Http\Request;

class ordersController extends Controller
{
    public function index()
    {
        $page_title = "All Order";
        $garage = Garage::where('vendor_id',auth()->id())->first();
        $orders = Order::where('garage_id',$garage->id)->get();

        return view('vendor.order.orders', compact('page_title','orders'));
    }
    public function fullfillment ($id)
    {
        $order = Order::where('id',$id)->first();
        if($order->status == 'complete')
        {
            $page_title = "Complete Order";
        return view('vendor.order.completed-order-detail', compact('page_title','order'));
        }else{
            $page_title = "Active Order";
            return view('vendor.order.active-order-detail', compact('page_title','order'));
        }
    }
    public function order_all ()
    {
        $page_title = "Active Order";
        $garage = Garage::where('vendor_id',auth()->id())->first();
        $orders = Order::where('garage_id',$garage->id)->get();

        return view('vendor.order.order-all', compact('page_title','orders'));
    }
    public function active_order ()
    {
        return view('vendor.order.orderindex');
    }

}

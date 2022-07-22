<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Mail\AboutOrder;
use App\Models\ChatFavorite;
use App\Models\Garage;
use App\Models\Order;
use App\Models\User;
use App\Models\webNotification;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ordersController extends Controller
{
    public function index()
    {
        $page_title = "All Order";
        $garage = Garage::where('vendor_id', auth()->id())->first();
        $orders = Order::where('garage_id', $garage->id)->get();

        return view('vendor.order.orders', compact('page_title', 'orders'));
    }
    public function fullfillment($id)
    {
        $order = Order::where('id', $id)->first();
        if ($order->status == 'complete') {
            $page_title = "Complete Order";
            return view('vendor.order.completed-order-detail', compact('page_title', 'order'));
        } else {
            $page_title = "Active Order";
            return view('vendor.order.active-order-detail', compact('page_title', 'order'));
        }
    }
    public function order_all()
    {
        $page_title = "Active Order";
        $garage = Garage::where('vendor_id', auth()->id())->first();
        $orders = Order::where('garage_id', $garage->id)->get();

        return view('vendor.order.order-all', compact('page_title', 'orders'));
    }
    public function active_order()
    {
        return view('vendor.order.orderindex');
    }

    //if want to chat with customer for any query about active order
    public function queryChat(Request $request)
    {
        // return $request;
        $date = strtotime(Carbon::now());
        if (ChatFavorite::where('vendor_id', auth()->user()->id)->where('customer_id', $request->id)->doesntExist()) {
            $data = new ChatFavorite();
            $data->customer_id = $request->id;
            $data->vendor_id = Auth::id();
            $data->customer_online = $date;
            $data->save();
        }
        $chatted = ChatFavorite::where([['customer_id', $request->id], ['vendor_id', Auth::id()]])->first();
        $chatted->vendor_status = 0;
        $chatted->customer_online = $date;
        $chatted->save();

        $message['title'] = "Query from your Garage/service provider";
        $message['order_no'] = $request->order_no;
        $message['order_id'] = $request->order_id;
        $message['body1'] = "Please take a moment to promptly respond to your ";
        $message['body2'] = " related questions and messages to streamline the order completion process and prevent any misunderstanding.";
        $message['body3'] = "with your garage.";
        $message['link1']= url('user/order/summary',$request->order_id);
        $message['link2']= route('user.chat.index');
        $user = User::find($request->id);

        $gettime = strtotime($user->online_status) + 10;
        $now = strtotime(Carbon::now());
        if ($now > $gettime) {
            Mail::to($user->email)->send(new AboutOrder($message));
        } else {
            $notification = new webNotification();
            $notification->customer_id = $request->id;
            $notification->title = "Query from your Garage about Order No ".$request->order_no;
            $notification->links = route('user.chat.index');
            $notification->body = 'Please take a moment to promptly respond to your order related questions and messages to streamline the order completion process and prevent any misunderstanding. Chat Now with your garage.';
            $notification->save();
        }

        return redirect()->route('vendor.chat.index');
    }

}

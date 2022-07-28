<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Mail\AboutOrder;
use App\Models\ChatFavorite;
use App\Models\Garage;
use App\Models\Order;
use App\Models\Part;
use App\Models\User;
use App\Models\UserBid;
use App\Models\VendorBid;
use App\Models\webNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
        $order = Order::with('vendorbid', 'userbid')->where('id', $id)->first();
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
        $orders = Order::where([['garage_id', $garage->id], ['status', 'pending']])->get();

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
        $message['link1'] = url('user/order/summary', $request->order_id);
        $message['link2'] = route('user.chat.index');
        $user = User::find($request->id);

        $gettime = strtotime($user->online_status) + 10;
        $now = strtotime(Carbon::now());
        if ($now > $gettime) {
            Mail::to($user->email)->send(new AboutOrder($message));
        } else {
            $notification = new webNotification();
            $notification->customer_id = $request->id;
            $notification->title = "Query from your Garage about Order No " . $request->order_no;
            $notification->links = route('user.chat.index');
            $notification->body = 'Please take a moment to promptly respond to your order related questions and messages to streamline the order completion process and prevent any misunderstanding. Chat Now with your garage.';
            $notification->save();
        }

        return redirect()->route('vendor.chat.index');
    }

    // public function addfund($id){

    //     $order = Order::with('vendorbid','userbid')->where('id', $id)->first();

    //     return view('vendor.order.add-fund1',compact('order'));
    // }

    public function addfund($id)
    {
        $page_title = 'quote detail ';
        $data = UserBid::with('user', 'company', 'modelYear')->findOrFail($id);

        return view('vendor.order.add-fund', compact('page_title', 'data'));
    }

    public function finalFund(Request $request)
    {
        // return $request;

        if ($request->btnType == 1) {
            $page_title = 'Preview';
            $data = $request->all();
            $garage = Garage::where('vendor_id', auth()->id())->first();
            return view('vendor.quotes.preview', compact('page_title', 'data', 'garage'));
        }

        $request->validate([
            'bid_id' => 'required',
            'garage_id' => 'required',
            'price' => 'required',
            'time' => 'required',
            'description' => 'required',
            'service_name' => 'required',
            'service_quantity' => 'required',
            'services_rate' => 'required',
            'spares_name' => 'required',
            'spares_quantity' => 'required',
            'spares_rate' => 'required',
            'others_name' => 'required',
            'others_quantity' => 'required',
            'others_rate' => 'required',
            'vat' => 'required',
            'net_total' => 'required',
        ]);
        $data=array();
        array_push($data,$request->price,$request->vat,$request->time);
        $new = implode(",", $data);

        $data = VendorBid::where([['user_bid_id',$request->bid_id],['garage_id',$request->garage_id]])->first();
        $data->new = $new;
        $data->save();

        if (count($request->service_name) > 0) {

            for ($i = 0; $i < count($request->service_name); $i++) {
                if ($request->service_quantity[$i] != 0) {
                    $services = [
                        'vendor_bid_id' => $data->id,
                        'service_name' => $request->service_name[$i],
                        'service_quantity' => $request->service_quantity[$i],
                        'service_rate' => $request->services_rate[$i],
                        'type' => 'services',
                        'status' => 0,
                    ];
                    Part::create($services);
                }
            }
        }
        if (count($request->spares_name) > 0) {

            for ($i = 0; $i < count($request->spares_name); $i++) {
                if ($request->service_quantity[$i] != 0) {
                    $spares = [
                        'vendor_bid_id' => $data->id,
                        'service_name' => $request->spares_name[$i],
                        'service_quantity' => $request->spares_quantity[$i],
                        'service_rate' => $request->spares_rate[$i],
                        'type' => 'spares',
                        'status' => 0,

                    ];
                    Part::create($spares);
                }
            }
        }
        if (count($request->others_name) > 0) {
            for ($i = 0; $i < count($request->others_name); $i++) {
                if ($request->others_quantity[$i] != 0) {
                    $other = [
                        'vendor_bid_id' => $data->id,
                        'service_name' => $request->others_name[$i],
                        'service_quantity' => $request->others_quantity[$i],
                        'service_rate' => $request->others_rate[$i],
                        'type' => 'others',
                        'status' => 0,

                    ];
                    Part::create($other);
                }
            }
        }

        // //notification to the customer of placing the bid on his quote
        $order = Order::where('user_bid_id', $request->bid_id)->first();
        $user = UserBid::find($request->bid_id);

        $message['title'] = "Order Completed";
        $message['order_no'] = $order->order_code;
        $message['order_id'] = $order->id;
        $message['body1'] = "We are pleased to inform you that your ";
        $message['body2'] = " has been successfully completed. Your selected garage/service has posted the final invoice. Kindly sign in to check your order and complete the payment by the releasing the funds.";
        $message['link1'] = url('user/order/summary', $order->id);

        $user = User::find($user->user_id);

        $gettime = strtotime($user->online_status) + 10;
        $now = strtotime(Carbon::now());
        if ($now > $gettime) {
            Mail::to($user->email)->send(new AboutOrder($message));
        } else {
            $notification = new webNotification();
            $notification->customer_id = $user->id;
            $notification->title = "Your Order has been Completed successfully #" . $order->order_code;
            $notification->links = url('user/order/summary', $order->id);
            $notification->body = ' ';
            $notification->save();
        }

        return redirect()->route('vendor.fullfillment', $order->id)->with('alert-order-success', 'Order Reminder send to customer and final updated Invoice');

    }

    public function completeInovoice(Request $request)
    {
        // return $request;
        $message['title'] = "Order Completed";
        $message['order_no'] = $request->order_no;
        $message['order_id'] = $request->order_id;
        $message['body1'] = "We are pleased to inform you that your ";
        $message['body2'] = " has been successfully completed. Your selected garage/service has posted the final invoice. Kindly sign in to check your order and complete the payment by the releasing the funds.";
        $message['link1'] = url('user/order/summary', $request->order_id);

        $user = User::find($request->user_id);

        $gettime = strtotime($user->online_status) + 10;
        $now = strtotime(Carbon::now());
        if ($now > $gettime) {
            Mail::to($user->email)->send(new AboutOrder($message));
        } else {
            $notification = new webNotification();
            $notification->customer_id = $request->user_id;
            $notification->title = "Your Order has been Completed successfully #" . $request->order_no;
            $notification->links = url('user/order/summary', $request->order_id);
            $notification->body = ' ';
            $notification->save();
        }

        return redirect()->back()->with('alert-order-success', 'Order Reminder send to customer and final Invoice');

    }

}

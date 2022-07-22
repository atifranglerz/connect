<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\UserBid;
use App\Models\VendorBid;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Mail\AboutOrder;
use App\Models\webNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function index ($id)
    {
        $page_title = "payment";
        $vendorbid = VendorBid::with('vendordetail')->where('id' ,'=' , $id)->first();
        return view('user.payment.payment',compact('page_title','vendorbid'));
    }
    public function store ()
    {

    }

    public function payment_info (Request $request)
    {
        // return $request;
        $order = new Order();
        $order_no = mt_rand('1000','100000');
        $order->order_code =$order_no;
        $order->user_bid_id = $request->user_bid_id;
        $order->vendor_bid_id = $request->vendor_bid_id;
        $order->garage_id = $request->garage_id;
        $order->total = $request->amount;
        $order->customer_name = $request->customer_name;
        $order->customer_address = $request->customer_address;
        $order->customer_postal_code = $request->customer_postal_code;
        $order->customer_city = $request->customer_city;

        $order->card_number = $request->card_number;
        $order->cardholder_name = $request->cardholder_name;
        $order->expiry_date = $request->expiry_date;
        $order->cvv = $request->cvv;
        $order->transaction_id = $request->transaction_id;
        $order->payment_type = $request->payment_type;
        $order->save();

        //after order confirm update quote status
        $quote = UserBid::find($request->user_bid_id);
        $quote->offer_status = "ordered";
        $quote->save();


        $notification = new webNotification();
        $notification->customer_id = auth()->user()->id;
        $notification->title = "Your order placed Successfully ".$order_no;
        $notification->links = url('user/order/summary',$order->id);
        $notification->body = ' ';
        $notification->save();


        $message['title'] = "Order Placement Completion";
        $message['order_no'] = $order_no;
        $message['order_id'] = $order->id;
        $message['body1'] = "Your ";
        $message['body2'] = "has been successfully placed. Your selected garage/ service provider will be starting the work soon. To stay updated on the status of your order please sign in to your account or stay tuned as we will communicate to you once the job is completed.";
        $message['link1']= url('user/order/summary',$order->id);
        Mail::to(auth()->user()->email)->send(new AboutOrder($message));

        //notification send to the vendor
        $vendorbid = VendorBid::with('vendordetail')->find($request->vendor_bid_id);
        $vendor = Vendor::find($vendorbid->vendordetail->vendor_id);
        $gettime = strtotime($vendor->online_status) + 10;
        $now = strtotime(Carbon::now());
        // if ($now > $gettime) {
        //     Mail::to($vendor->email)->send(new AboutOrder($message));
        // } else {
            $notification = new webNotification();
            $notification->vendor_id = $vendorbid->vendordetail->vendor_id;
            $notification->title = auth()->user()->name. " accept your quote and place Order #".$order_no;
            $notification->links = url('vendor/fullfillment',$order->id);
            $notification->body = ' ';
            $notification->save();
        // }





        return $this->message($order, 'user.order.index', 'Payment Successfully Added', '  Error');

    }
}
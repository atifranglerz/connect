<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\VendorBid;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index ($id)
    {
        $page_title = "payment";
        $vendorbid = vendorBid::with('vendordetail')->where('id' ,'=' , $id)->first();
        return view('user.payment.payment',compact('page_title','vendorbid'));
    }
    public function store ()
    {

    }

    public function payment_info (Request $request)
    {
        $order = new Order();
        $order->order_code = mt_rand('1000','100000');
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

        return $this->message($order, 'user.order.index', 'Payment Successfully Added', '  Error');

    }
}

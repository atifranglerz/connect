<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Jobs\Notification;
use App\Models\InsuranceRequest;
use App\Models\Order;
use App\Models\User;
use App\Models\UserBid;
use App\Models\Vendor;
use App\Models\VendorBid;
use App\Models\webNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;

class PaymentController extends Controller
{

    public function stripe()
    {
        return view('user.payment.stripe');
    }

    public function stripePost(Request $request)
    {
        // dd($request);
        $stripe_obj = new Stripe\Stripe();
        $stripe = $stripe_obj->setApiKey(env('STRIPE_SECRET'));
        // Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" => $request->payment * 100,
            "currency" => "aed",
            "source" => $request->stripeToken,
            "description" => "Test payment from Arshad.",
        ]);

        Session::flash('success', 'Payment successful!');

        return redirect()->back();
    }

    public function index(Request $request)
    {
        $type = $request->type;
        $page_title = "payment";
        $vendorbid = VendorBid::with('vendordetail')->where('id', '=', $request->bid_id)->first();
        return view('user.payment.payment', compact('page_title', 'vendorbid', 'type'));
    }

    public function payment_info(Request $request)
    {
        $amount = explode(" ", $request->amount);

        if ($request->type == "order") {
            // get payment
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            Stripe\Charge::create([
                "amount" => $amount[0] * 100,
                "currency" => "aed",
                "source" => $request->stripeToken,
                "description" => "Test payment from" . $request->name,
            ]);

            $order = Order::where([['user_bid_id', $request->user_bid_id], ['vendor_bid_id', $request->vendor_bid_id]])->first();
            $order->status = "complete";
            $order->save();

            $vendorbid = VendorBid::with('vendordetail')->find($request->vendor_bid_id);

            $vendor = Vendor::find($vendorbid->vendordetail->vendor_id);
            $vendor->balance = $vendor->balance + $order->total;
            $vendor->save();
            // notification content
            $message['title'] = "Payment Completed";
            $message['order_no'] = $order->order_code;
            $message['order_id'] = $order->id;
            $message['body1'] = "We have received full payment on your ";
            $message['body2'] = "We want to thank you for choosing our services, it has been our pleasure to have you as a valued customer. Please don’t forget to download your invoice for your record, and rate the service that you have received from your garage.";
            $message['link1'] = url('user/order/summary', $order->id);
            $message['type'] = "order";
            $message['email'] = auth()->user()->email;
            //mail notification to user
            $Notification = new Notification($message);
            dispatch($Notification);

            //web notification to vendor
            $notification = new webNotification();
            $notification->vendor_id = $vendorbid->vendordetail->vendor_id;
            $notification->title = auth()->user()->name . " Confirm to complete order and release the payment, Order#" . $order->order_code;
            $notification->links = url('vendor/fullfillment', $order->id);
            $notification->body = ' ';
            $notification->save();

            return $this->message($order, 'user.order.index', 'Order Completed and Payment Successfully Added', '  Error');

        } else {
            $amount = explode(" ", $request->amount);
            // get payment
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            Stripe\Charge::create([
                "amount" => $amount[0] * 100,
                "currency" => "aed",
                "source" => $request->stripeToken,
                "description" => "Test payment from " . $request->name,
            ]);

            $order = new Order();
            $order_no = mt_rand('1000', '100000');
            $order->order_code = $order_no;
            $order->user_bid_id = $request->user_bid_id;
            $order->vendor_bid_id = $request->vendor_bid_id;
            $order->garage_id = $request->garage_id;
            $order->total = $request->net_total;
            $order->advance = $amount[0];
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
            if(Auth::user()->type == "user"){
                $order->paid_by = "customer";
            }else{
                $order->paid_by = "insurance";
            }
            $order->save();

            //after order confirm update quote status
            $quote = UserBid::find($request->user_bid_id);
            $quote->offer_status = "ordered";
            $quote->save();

            // notification content
            $message['title'] = "Order Placement Completion";
            $message['order_no'] = $order_no;
            $message['order_id'] = $order->id;
            $message['body1'] = "Your ";
            $message['body2'] = "has been successfully placed. Your selected garage/ service provider will be starting the work soon. To stay updated on the status of your order please sign in to your account or stay tuned as we will communicate to you once the job is completed.";
            $message['link1'] = url('user/order/summary', $order->id);
            $message['type'] = "order";
            $message['email'] = auth()->user()->email;
            //mail notification to user
            $Notification = new Notification($message);
            dispatch($Notification);

            // web  or mail notification to the vendor
            $vendorbid = VendorBid::with('vendordetail')->find($request->vendor_bid_id);
            $vendor = Vendor::find($vendorbid->vendordetail->vendor_id);

            $message['title'] = "Order Placement";
            $message['order_no'] = $order_no;
            $message['order_id'] = $order->id;
            $message['body1'] = Auth::user()->name . " placed ";
            $message['body2'] = "successfully to you.";
            $message['link1'] = url('vendor/fullfillment', $order->id);
            $message['type'] = "order";
            $message['email'] = $vendor->email;

            $gettime = strtotime($vendor->online_status) + 10;
            $now = strtotime(Carbon::now());
            if ($now > $gettime) {
                $Notification = new Notification($message);
                dispatch($Notification);
            } else {
                $notification = new webNotification();
                $notification->vendor_id = $vendorbid->vendordetail->vendor_id;
                $notification->title = auth()->user()->name . " accept your quote and place Order #" . $order_no;
                $notification->links = url('vendor/fullfillment', $order->id);
                $notification->body = ' ';
                $notification->save();
            }
        }

        return $this->message($order, 'user.order.index', ' Order palced Payment Successfully Added', '  Error');
    }

    public function payment_insurance($id)
    {

        $company = User::with('company')->find(Auth::id());

        $vendor_bid_id = $id;
        $company_id = $company->company[0]->id;

        $data = new InsuranceRequest();
        $data->company_id = $company_id;
        $data->customer_id = Auth::id();
        $data->vendor_bid_id = $vendor_bid_id;
        // $data->payment = $request->payment;
        $data->save();

        $bid = VendorBid::find($vendor_bid_id);

        $order = new Order();
        $order_no = mt_rand('1000', '100000');
        $order->order_code = $order_no;
        $order->user_bid_id = $bid->user_bid_id;
        $order->vendor_bid_id = $vendor_bid_id;
        $order->garage_id = $bid->garage_id;
        $order->total = $bid->net_total;
        $order->customer_name = Auth::user()->name;
        $order->customer_address = Auth::user()->address;
        $order->customer_postal_code = Auth::user()->post_box;
        $order->customer_city = Auth::user()->city;
        // $order->card_number = $request->card_number;
        // $order->cardholder_name = $request->cardholder_name;
        // $order->expiry_date = $request->expiry_date;
        // $order->cvv = $request->cvv;
        // $order->transaction_id = $request->transaction_id;
        // $order->payment_type = $request->payment_type;
        $order->paid_by = "company";
        $order->save();

        //after order confirm update quote status
        $quote = UserBid::find($bid->user_bid_id);
        $quote->offer_status = "ordered";
        $quote->save();

        //mail notification to customer
        $message['title'] = "Placement of quotes with your insurance company";
        $message['order_no'] = $order_no;
        $message['order_id'] = $order->id;
        $message['body1'] = "You have successfully completed the placement of quote with your insurance company for ";
        $message['body2'] = ". Stay tuned and receive updates on the quotes status.";
        $message['link1'] = url('user/order/summary', $order->id);
        $message['type'] = "order";
        $message['email'] = auth()->user()->email;

        $Notification = new Notification($message);
        dispatch($Notification);

        // web  or mail notification to the vendor
        $vendorbid = VendorBid::with('vendordetail')->find($vendor_bid_id);
        $vendor = Vendor::find($vendorbid->vendordetail->vendor_id);

        $message['title'] = "Order Placement";
        $message['order_no'] = $order_no;
        $message['order_id'] = $order->id;
        $message['body1'] = Auth::user()->name . " placed ";
        $message['body2'] = "successfully to you. The payment is pending because the customer request for payment to his insurance company. After paying by insurance company we will notify soon.";
        $message['link1'] = url('vendor/fullfillment', $order->id);
        $message['type'] = "order";
        $message['email'] = $vendor->email;

        $gettime = strtotime($vendor->online_status) + 10;
        $now = strtotime(Carbon::now());
        if ($now > $gettime) {
            $Notification = new Notification($message);
            dispatch($Notification);
        } else {
            $notification = new webNotification();
            $notification->vendor_id = $vendorbid->vendordetail->vendor_id;
            $notification->title = auth()->user()->name . " accept your quote and place Order #" . $order_no . " payment will pay insurance company";
            $notification->links = url('vendor/fullfillment', $order->id);
            $notification->body = ' ';
            $notification->save();
        }

        //mail notification to Insurance Company
        $message['title'] = "Incomplete order reminder";
        $message['order_no'] = $order_no;
        $message['order_id'] = $order->id;
        $message['body1'] = "Our most qualified garages and service providers are excited to work on ";
        $message['body2'] = " we kindly request you to take a moment to select the service providers to streamline the process of completion for your customer.";
        $message['link1'] = url('user/car/detail', $vendor_bid_id);
        $message['type'] = "order";
        $message['email'] = $company->company[0]->email;

        $company = User::find($company_id);
        $gettime = strtotime($company->online_status) + 10;
        $now = strtotime(Carbon::now());
        if ($now > $gettime) {
            $Notification = new Notification($message);
            dispatch($Notification);
        } else {
            $notification = new webNotification();
            $notification->customer_id  = $company_id;
            $notification->title = auth()->user()->name . " request for car insurance and place Order #" . $order_no;
            $notification->links = url('user/car/detail', $vendor_bid_id);
            $notification->body = ' ';
            $notification->save();
        }


        return $this->message($order, 'user.order.index', 'Your order place and payment request send to Insurance Company Successfully', 'success');
    }
}

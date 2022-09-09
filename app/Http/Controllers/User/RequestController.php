<?php

namespace App\Http\Controllers\User;

use Auth;
use Stripe;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Vendor;
use App\Models\VendorBid;
use App\Jobs\Notification;
use Illuminate\Http\Request;
use App\Models\webNotification;
use App\Models\InsuranceRequest;
use App\Http\Controllers\Controller;

class RequestController extends Controller
{
    public function index()
    {

        $page_title = 'index ';
        $insurance = InsuranceRequest::with('customer', 'bid')->where('company_id', Auth::id())->orderBy('id', 'desc')->get();
        return view('user.insuranceRequest.index', compact('insurance', 'page_title'));
    }

    public function carDetail($id)
    {
        // return $id;
        $data = VendorBid::with('vendordetail')->where('id', '=', $id)->first();
        $page_title = 'detail';
        return view('user.insuranceRequest.request_detail', compact('page_title', 'data'));
    }

    public function printOrderDetails($id)
    {
        $value = 0;
        $data = VendorBid::with(['vendordetail', 'part' => function ($q) use ($value) {
            $q->where('status', '=', '1');
        }])->where('id', '=', $id)->first();
        return view('user.insuranceRequest.print_order_details', compact('data'));
    }

    public function Payment($id)
    {
        $data = VendorBid::where('id', '=', $id)->first();
        return view('user.insuranceRequest.payment', compact('data'));

    }

    public function payPayment(Request $request)
    {
        
        if ($request->action == "through_credit") {
            $amount = explode(" ", $request->amount);

            // Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            // Stripe\Charge::create([
            //     "amount" => $amount[0] * 100,
            //     "currency" => "aed",
            //     "source" => $request->stripeToken,
            //     "description" => "payment from " . $request->name,
            // ]);
        } else {
            $request->validate([
                'cheque_image' => 'required',
            ]);

            $order = Order::where('vendor_bid_id', $request->vendor_bid_id)->first();
            if ($request->file('cheque_image')) {
                    $name = time() . '.' . $request->file('cheque_image')->getClientOriginalExtension();
                    $name = $request->file('cheque_image')->move('public/image/profile/', $name);
                    $order['cheque_image'] = $name;
            }
            $order->save();
        }

        $insurance = InsuranceRequest::where('vendor_bid_id', $request->vendor_bid_id)->first();
        $insurance->status = 1;
        $insurance->save();

        $vendorbid = VendorBid::with('vendordetail', 'userBid', 'order')->where('id', '=', $request->vendor_bid_id)->first();

        $user = User::find($vendorbid->userBid->user_id);

        // notification content
        $message['title'] = "Payment Completed";
        $message['order_no'] = $vendorbid->order->order_code;
        $message['order_id'] = $vendorbid->order->id;
        $message['body1'] = "Congratulations, your insurance company " . Auth::guard('web')->user()->name . " has completed the payment for your ";
        $message['body2'] = " . Enjoy your service, please don’t forget to download the invoice for your record, and rate the service that you have received from your garage/service provider. ";
        $message['link1'] = url('user/order/summary', $vendorbid->order->id);
        $message['type'] = "order";
        $message['email'] = $user->email;

        //mail or web notification to user
        $gettime = strtotime($user->online_status) + 10;
        $now = strtotime(Carbon::now());
        if ($now > $gettime) {
            $Notification = new Notification($message);
            dispatch($Notification);
        } else {
            $notification = new webNotification();
            $notification->customer_id = $user->id;
            $notification->title = "The Insurance Company " . Auth::guard('web')->user()->name . " paid the payment against Order #" . $vendorbid->order->order_code;
            $notification->links = url('user/order/summary', $vendorbid->order->id);
            $notification->body = ' ';
            $notification->save();
        }

        // web  or mail notification to the vendor
        $vendor = Vendor::find($vendorbid->vendordetail->vendor_id);

        $message['title'] = "Payment Confirmation";
        $message['order_no'] = $vendorbid->order->order_code;
        $message['order_id'] = $vendorbid->order->id;
        $message['body1'] = "The Insurance Company " . Auth::guard('web')->user()->name . " has been release the payment against";
        $message['body2'] = ".";
        $message['link1'] = url('vendor/fullfillment', $vendorbid->order->id);
        $message['type'] = "order";
        $message['email'] = $vendor->email;

        $gettime = strtotime($vendor->online_status) + 10;
        $now = strtotime(Carbon::now());
        if ($now > $gettime) {
            $Notification = new Notification($message);
            dispatch($Notification);
        } else {
            $notification = new webNotification();
            $notification->vendor_id = $vendor->id;
            $notification->title = "The " . Auth::guard('web')->user()->name . " has been release the payment against Order #" . $vendorbid->order->order_code;
            $notification->links = url('vendor/fullfillment', $vendorbid->order->id);
            $notification->body = ' ';
            $notification->save();
        }
        return redirect()->route('user.insurance-index')->with($this->data("payment Successfully paid and Request is Approved", 'success'));
    }
}

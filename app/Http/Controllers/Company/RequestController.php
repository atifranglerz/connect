<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Jobs\Notification;
use App\Models\InsuranceRequest;
use App\Models\User;
use App\Models\Vendor;
use App\Models\VendorBid;
use App\Models\webNotification;
use Auth;
use Carbon\Carbon;

class RequestController extends Controller
{
    public function index()
    {
        $page_title = 'index ';
        $insurance = InsuranceRequest::with('customer', 'bid')->where([['company_id', Auth::id()], ['status', 0]])->orderBy('id','desc')->get();
        return view('company.insuranceRequest.index', compact('insurance', 'page_title'));
    }

    public function paidInsurance()
    {
        $page_title = 'paid ';
        $insurance = InsuranceRequest::with('customer', 'bid')->where([['company_id', Auth::id()], ['status', 1]])->orderBy('id','desc')->get();
        return view('company.insuranceRequest.paid', compact('insurance', 'page_title'));
    }

    public function carDetail($id)
    {
        // return $id;
        $data = VendorBid::with('vendordetail')->where('id', '=', $id)->first();
        $page_title = 'detail';
        return view('company.insuranceRequest.request_detail', compact('page_title', 'data'));
    }


    public function printOrderDetails($id)
    {
        $value = 0;
        $data = VendorBid::with(['vendordetail', 'part' => function ($q) use ($value) {
            $q->where('status', '=', '1');
        }])->where('id', '=', $id)->first();
        return view('company.insuranceRequest.print_order_details', compact('data'));
    }




    public function payPayment($id)
    {
        $insurance = InsuranceRequest::where('vendor_bid_id', $id)->first();
        $insurance->status = 1;
        $insurance->save();

        $vendorbid = VendorBid::with('vendordetail', 'userBid', 'order')->where('id', '=', $id)->first();

        $user = User::find($vendorbid->userBid->user_id);

        // notification content
        $message['title'] = "Payment Confirmation";
        $message['order_no'] = $vendorbid->order->order_code;
        $message['order_id'] = $vendorbid->order->id;
        $message['body1'] = "The Insurance Company " . Auth::guard('company')->user()->name . " has been accept your insurance request and paid it against";
        $message['body2'] = " . Your selected garage/ service provider will be starting the work soon. To stay updated on the status of your order please sign in to your account or stay tuned as we will communicate to you once the job is completed.";
        $message['link1'] = url('user/order/summary', $vendorbid->order->id);
        $message['type'] = "order";
        $message['email'] = $user->email;

        //mail notification to user
        $gettime = strtotime($user->online_status) + 10;
        $now = strtotime(Carbon::now());
        if ($now > $gettime) {
            $Notification = new Notification($message);
            dispatch($Notification);
        } else {
            $notification = new webNotification();
            $notification->customer_id = $user->id;
            $notification->title = "The Insurance Company " . Auth::guard('company')->user()->name . "paid the payment against Order #" . $vendorbid->order->order_code;
            $notification->links = url('user/order/summary', $vendorbid->order->id);
            $notification->body = ' ';
            $notification->save();
        }

        // web  or mail notification to the vendor
        $vendor = Vendor::find($vendorbid->vendordetail->vendor_id);

        $message['title'] = "Payment Confirmation";
        $message['order_no'] = $vendorbid->order->order_code;
        $message['order_id'] = $vendorbid->order->id;
        $message['body1'] = "The Insurance Company " . Auth::guard('company')->user()->name . " has been release the payment against";
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
            $notification->title = "The Insurance Company " . Auth::guard('company')->user()->name . "has been release the payment against Order #" . $vendorbid->order->order_code;
            $notification->links = url('vendor/fullfillment', $vendorbid->order->id);
            $notification->body = ' ';
            $notification->save();
        }
        return back()->with($this->data("payment Successfully paid", 'success'));
    }
}

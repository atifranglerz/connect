<?php

namespace App\Http\Controllers\User;

use Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Vendor;
use App\Models\UserBid;
use App\Models\VendorBid;
use App\Jobs\Notification;
use Illuminate\Http\Request;
use App\Models\webNotification;
use App\Models\InsuranceCompany;
use App\Models\InsuranceRequest;
use App\Http\Controllers\Controller;

class InsurancePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $page_title = "Insurance Payment";
       $company = User::with('company')->find(Auth::id());
        return view('user.insurance_payment.index', compact('company', 'page_title'));
    }

    public function email(Request $request)
    {
        $company = InsuranceCompany::find($request->id);
        return response()->json([
            'success' => 'Status updated successfully',
            'company' => $company,
        ]);
    }

    public function payment_request(Request $request)
    {
return $request;
        $request->validate([
            'vendor_bid_id' => 'required',
            'company' => 'required',],
            ['company.required' => 'Company feild is required!',
            'vendor_bid_id.required' => 'please select the Quote']
        );

        $data = new InsuranceRequest();
        $data->company_id = $request->company;
        $data->customer_id = Auth::id();
        $data->vendor_bid_id = $request->vendor_bid_id;
        // $data->payment = $request->payment;
        $data->save();

        $bid = VendorBid::find($request->vendor_bid_id);

        $order = new Order();
        $order_no = mt_rand('1000', '100000');
        $order->order_code = $order_no;
        $order->user_bid_id = $bid->user_bid_id;
        $order->vendor_bid_id = $request->vendor_bid_id;
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
        $message['title'] = "Order Placement and Insurance Request Completion";
        $message['order_no'] = $order_no;
        $message['order_id'] = $order->id;
        $message['body1'] = "Your ";
        $message['body2'] = "has been successfully placed and Insurance requset send to your Insurance Company. After paying payment by insurance company your selected garage/ service provider will be starting the work soon.";
        $message['link1'] = url('user/order/summary', $order->id);
        $message['type'] = "order";
        $message['email'] = auth()->user()->email;
        
        $Notification = new Notification($message);
        dispatch($Notification);

        // web  or mail notification to the vendor
        $vendorbid = VendorBid::with('vendordetail')->find($request->vendor_bid_id);
        $vendor = Vendor::find($vendorbid->vendordetail->vendor_id);

        $message['title'] = "Order Placement";
        $message['order_no'] = $order_no;
        $message['order_id'] = $order->id;
        $message['body1'] = Auth::user()->name." placed ";
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
        $message['title'] = "Car Insurance Request";
        $message['order_no'] = $order_no;
        $message['order_id'] = $order->id;
        $message['body1'] = Auth::user()->name." has been place the ";
        $message['body2'] = "for his car repairing and request to you for insurance. Plesse pay the payment so that his selected garage will be started the work soon.";
        $message['link1'] = url('company/car/detail', $request->vendor_bid_id);
        $message['type'] = "order";
        $message['email'] = $request->company_email;
        
        $Notification = new Notification($message);
        dispatch($Notification);

        return back()->with($this->data("Your order place and payment request send to Insurance Company Successfully", 'success'));

    }

   







    
}

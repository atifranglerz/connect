<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Part;
use App\Models\UserBid;
use App\Models\UserBidImage;
use App\Models\VendorBid;
use App\Models\webNotification;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $page_title = "Active Order";
        $userbidid = UserBid::where('user_id', auth()->id())->pluck('id');
        $orders = Order::whereIn('user_bid_id', $userbidid)->get();

        return view('user.order.index', compact('page_title', 'orders'));
    }

    public function show($id)
    {
        $page_title = "Completed Order";
        $order = Order::with('vendorbid')->findOrFail($id);
        $bidfile = UserBidImage::where([['user_bid_id', $order->user_bid_id], ['type', 'registerImage']])->first();
        $vendorBid = VendorBid::with('part')->where('id', $order->vendor_bid_id)->first();

        $value = 0;
        $newinvoce = VendorBid::with(['vendordetail', 'part' => function ($q) use ($value) {
            $q->where('status', '=', '0');
        }])->find($order->vendor_bid_id);
        return view('user.order.pending-order-update', compact('page_title', 'order', 'bidfile', 'vendorBid', 'newinvoce'));
    }

    public function invoce($id)
    {
        // return $id;
        $value = 0;
        $data = VendorBid::with(['vendordetail', 'part' => function ($q) use ($value) {
            $q->where('status', '=', '0');
        }])->where('id', '=', $id)->first();
        return view('user.order.invoice', compact('data'));
    }

    public function acceptResolution($id)
    {
        $value = 0;
        $data = VendorBid::with(['vendordetail', 'part' => function ($q) use ($value) {
            $q->where('status', '=', '0');
        }])->find($id);
        $array = explode(",", $data->new);
        $data->price = $data->price + $array[0];
        $data->vat = $data->vat + $array[1];
        $data->time = $data->time + $array[2];
        $data->net_total = $data->net_total + $array[0] + $array[1];
        $data->new = null;
        $data->save();

        //update total price of order
        $order = Order::where('vendor_bid_id',$data->id)->first();
        $order->total = $order->total + $array[0] + $array[1];
        $order->save();

        $part = Part::where([['status', 0], ['vendor_bid_id', $id]])->get();
        foreach ($part as $part) {
            $part->status = 1;
            $part->save();
        }

        $order = Order::where('vendor_bid_id', $id)->first();
        $vendorbid = VendorBid::with('vendordetail')->find($order->vendor_bid_id);
        //web notificatin to the vendor
        $notification = new webNotification();
        $notification->vendor_id = $vendorbid->vendordetail->vendor_id;
        $notification->title = auth()->user()->name . " Accept your extra budget request Order #" . $order->order_code;
        $notification->links = url('vendor/fullfillment', $order->id);
        $notification->body = ' ';
        $notification->save();

        return redirect()->route('user.order.show', $order->id)->with($this->data("Extra budget Request Accepted Successfully", 'success'));

    }

    public function rejectResolution($id)
    {
        $value = 0;
        $data = VendorBid::with(['vendordetail', 'part' => function ($q) use ($value) {
            $q->where('status', '=', '0');
        }])->find($id);
        $data->new = null;
        $data->save();

        $part = Part::where([['status', 0], ['vendor_bid_id', $id]])->get();
        foreach ($part as $part) {
            $part->delete();
        }

        $order = Order::where('vendor_bid_id', $id)->first();
        $vendorbid = VendorBid::with('vendordetail')->find($order->vendor_bid_id);
        //web notificatin to the vendor
        $notification = new webNotification();
        $notification->vendor_id = $vendorbid->vendordetail->vendor_id;
        $notification->title = auth()->user()->name . " Reject your extra budget request Order #" . $order->order_code;
        $notification->links = url('vendor/fullfillment', $order->id);
        $notification->body = ' ';
        $notification->save();

        return redirect()->route('user.order.show', $order->id)->with($this->data("Extra budget Request Rejected Successfully", 'success'));
    }

    public function summary($id)
    {
        $page_title = "Completed Order";
        $order = Order::findOrFail($id);
        $vendorBid = VendorBid::find($order->vendor_bid_id);
        return view('user.order.completed-order', compact('page_title', 'order'));
    }

    public function cancelView($id)
    {
        $page_title = "Completed Order";
        $order = Order::findOrFail($id);
        $vendorBid = VendorBid::find($order->vendor_bid_id);
        return view('user.order.cancel-order', compact('page_title', 'order'));
    }
    public function cancelOrder(Request $request)
    {
        $page_title = "Completed Order";
        $order = Order::findOrFail($request->order_id);
        $order->status = "cancelled";
        $order->reason = $request->reason;
        $order->save();

        $vendorbid = VendorBid::with('vendordetail')->find($order->vendor_bid_id);
        //web notificatin to the vendor
        $notification = new webNotification();
        $notification->vendor_id = $vendorbid->vendordetail->vendor_id;
        $notification->title = auth()->user()->name . " Cancel the order due to some reason Order #" . $order->order_code;
        $notification->links = url('vendor/fullfillment', $order->id);
        $notification->body = ' ';
        $notification->save();

        return redirect()->route('user.order.summary', $request->order_id)->with($this->data("Your Order Cancelled Successfully", 'success'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function pendingOrderUpdate()
    {

        return view('user.order.pending-order-update');
    }
}

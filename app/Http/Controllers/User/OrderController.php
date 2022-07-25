<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\UserBid;
use App\Models\VendorBid;
use App\Models\UserBidImage;
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
        $userbidid = UserBid::where('user_id',auth()->id())->pluck('id');
        $orders = Order::whereIn('user_bid_id',$userbidid)->get();

        return view('user.order.index', compact('page_title','orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page_title = "Completed Order";
        $order = Order::findOrFail($id);
        $bidfile = UserBidImage::where([['user_bid_id',$order->user_bid_id],['type','registerImage']])->first();
        return view('user.order.pending-order-update', compact('page_title','order','bidfile'));
    }


    public function summary($id)
    {
        $page_title = "Completed Order";
        $order = Order::findOrFail($id);
        $vendorBid = VendorBid::find($order->vendor_bid_id);
        return view('user.order.completed-order', compact('page_title','order'));
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

    public function pendingOrderUpdate(){

        return view('user.order.pending-order-update');
    }
}

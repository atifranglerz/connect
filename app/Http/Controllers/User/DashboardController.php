<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Order;
use App\Models\UserBid;
use App\Models\VendorBid;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $page_title = 'User Dashboard';
        $user_bid = UserBid::where('user_id', Auth::id())->latest()->first();
        if($user_bid){
           $vendor_bid = VendorBid::where('user_bid_id', $user_bid->id)->first();
        }else{
            $vendor_bid='';
        }

        $userbidid = UserBid::where('user_id',auth()->id())->pluck('id');
        if($userbidid){
            $order = Order::whereIn('user_bid_id',$userbidid)->latest()->first();
        }else{
            $order='';
        }

        return view('user.index', compact('page_title','user_bid','userbidid','vendor_bid','order' ));
    }
}

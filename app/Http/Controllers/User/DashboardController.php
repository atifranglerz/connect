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
        $vendor_bid = VendorBid::where('user_bid_id', $user_bid->id)->first();

        $userbidid = UserBid::where('user_id',auth()->id())->pluck('id');
        $order = Order::whereIn('user_bid_id',$userbidid)->latest()->first();
        return view('user.index', compact('page_title','user_bid','vendor_bid','order' ));
    }
}

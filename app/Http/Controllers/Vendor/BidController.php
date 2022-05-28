<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\VendorBid;
use Illuminate\Http\Request;

class BidController extends Controller
{
   public function getBids(){
       $data=VendorBid::where('garage_id',auth()->user()->garage->id)->with('userBid')->get();
       return view('vendor.bids.my_bid',compact('data'));
   }
   public function bidDetails($id){
      $data=VendorBid::find($id);
       return view('vendor.bids.bid_detail',compact('data'));
   }
}

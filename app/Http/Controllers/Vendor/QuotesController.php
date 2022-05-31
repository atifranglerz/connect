<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserBid;
use App\Models\User ;
use App\Models\ModelYear;
use App\Models\Company;
use App\Models\vendorBid;
use App\Models\UserWishlist;
use App\Models\VendorQuote;

class QuotesController extends Controller
{
    public function index()
    {

        $data['page_title'] = 'index ';
        $data['user_all_bid'] = VendorQuote::where('vendor_id', '=', null)->with('userbid')->get();
        $data['user_all_bids'] = VendorQuote::where('vendor_id', '=', auth()->user()->id)->with('userbid')->get();


        return view('vendor.quotes.index', $data);
    }
    public function quotedetail ($id)
    {

        $page_title = 'quote detail ';
        $data = UserBid::with('user','company','model')->findOrFail($id);
        return view('vendor.quotes.detail', compact('page_title' , 'data'));
    }
    public function bidresponse (Request $request)
    {
        dd('hello');
        $request->validate([
            'bid_id'=>'required',
            'garage_id'=>'required',
            'price'=>'required',
            'time'=>'required',
            'description'=>'required',
        ]);

        $data =  new \App\Models\VendorBid();
        $data->user_bid_id =  $request->bid_id ;
        $data->garage_id =  $request->garage_id ;
        $data->price = $request->price ;
        $data->time = $request->time ;
        $data->description = $request->description ;


        $data->save();
        return $this->message($data, 'vendor.quoteindex', 'Successfully responded on bid ', '  Error');
    }
}

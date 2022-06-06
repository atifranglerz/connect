<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Models\Part;
use Illuminate\Http\Request;
use App\Models\UserBid;
use App\Models\User ;
use App\Models\ModelYear;
use App\Models\Company;
use App\Models\VendorBid;
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
        $data = UserBid::with('user','company','modelYear')->findOrFail($id);
        return view('vendor.quotes.detail', compact('page_title' , 'data'));
    }
    public function bidresponse (Request $request)
    {

      if(VendorBid::where('garage_id',auth()->user()->garage->id)->where('user_bid_id',$request->bid_id)->doesntExist()) {
          $request->validate([
              'bid_id' => 'required',
              'garage_id' => 'required',
              'price' => 'required',
              'time' => 'required',
              'description' => 'required',
              'service_name' => 'required',
              'service_quantity' => 'required',
              'services_rate' => 'required',
              'spares_name' => 'required',
              'spares_quantity' => 'required',
              'spares_rate' => 'required',
              'others_name' => 'required',
              'others_quantity' => 'required',
              'others_rate' => 'required',
              'vat' => 'required',
              'net_total' => 'required',
          ]);
          $data = new \App\Models\VendorBid();
          $data->user_bid_id = $request->bid_id;
          $data->garage_id = $request->garage_id;
          $data->price = $request->price;
          $data->time = $request->time;
          $data->description = $request->description;
          $data->vat = $request->vat;
          $data->net_total =$request->net_total;
          $data->save();

          if (count($request->service_name)>0){

              for ($i = 0; $i < count($request->service_name); $i++) {
                  if ($request->service_quantity[$i] != 0){
                      $services = [
                          'vendor_bid_id' => $data->id,
                          'service_name' => $request->service_name[$i],
                          'service_quantity' => $request->service_quantity[$i],
                          'service_rate' => $request->services_rate[$i],
                          'type' => 'services',
                      ];
                  Part::create($services);
              }
              }
          }
         if(count($request->spares_name)>0){

             for ($i = 0; $i < count($request->spares_name); $i++) {
                 if ($request->service_quantity[$i] != 0){
                 $spares = [
                     'vendor_bid_id' => $data->id,
                     'service_name' => $request->spares_name[$i],
                     'service_quantity' => $request->spares_quantity[$i],
                     'service_rate' => $request->spares_rate[$i],
                     'type' => 'spares',
                 ];
                 Part::create($spares);
                 }
             }
         }
          if(count($request->others_name)>0) {
              for ($i = 0; $i < count($request->others_name); $i++) {
                  if ($request->others_quantity[$i] != 0) {
                      $other =[
                          'vendor_bid_id' => $data->id,
                          'service_name' => $request->others_name[$i],
                          'service_quantity' => $request->others_quantity[$i],
                          'service_rate' => $request->others_rate[$i],
                          'type' => 'others',
                      ];
                      Part::create($other);
                  }
              }
          }
          return $this->message($data, 'vendor.quoteindex', 'Successfully responded on bid ', '  Error');
      }else{
          return redirect()->back()->with(['message' =>'You are already bided on this quote', 'alert' => 'error']);


      }

    }
}

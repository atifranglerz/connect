<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\ModelYear;
use App\Models\UserBid;
use App\Models\Category ;
use App\Models\UserBidCategory;
use App\Models\UserBidImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuoteController extends Controller
{
    public function index()
    {
        $page_title = 'quote/index ';
        $data = UserBid::where('user_id', Auth::id())->get();
        return view('user.quote.index', compact('page_title' ,'data'));
    }

    public function create()
    {
        $company = Company::all();
        $year = ModelYear::all();
        $catagary = Category::all() ;
        $page_title = 'Request Quote';
        return view('user.quote.create', compact('page_title' ,'catagary' ,'company' ,'year'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'car_images'=>'required',
            'model' => 'required' ,
            'company_id' => 'required',
            'model_year_id' => 'required',
            'mileage' =>'required' ,
            'price'=>'required',
            'name' => 'required',
            'phone' => 'required' ,
            'address'=> 'required' ,
        ]);
        $quote = new UserBid();
        $quote->user_id = Auth::id() ;
        $quote->model = $request->model;
        $quote->company_id =  $request->company_id ;
        $quote->model_year_id = $request->model_year_id;
        $quote->price = $request->price;
        $quote->mileage = $request->mileage;
        $quote->description1 = $request->description1;
        $quote->description2 = $request->description2;
        $quote->car_owner_name = $request->name;
        $quote->phone = $request->phone;
        $quote->address = $request->address;
        $quote->save();
        // this is car image save
        $imagefiles = new UserBidImage();
        if ($request->file('car_images')) {
            $images = [];
            foreach ($request->file('car_images') as $data) {
                $image = hexdec(uniqid()) . '.' . strtolower($data->getClientOriginalExtension());
                $data->move('public/image/ads/', $image);
                $images[] = 'public/image/ads/' . $image;
            }
            $imagefiles->user_bid_id =  $quote->id;
            $imagefiles->car_image = implode(",", $images); ;
            $imagefiles->type = 'image' ;
            $imagefiles->save() ;
        }
        // police / accident report
        $registrationfiles = new UserBidImage();
        if ($request->file('files')) {
            $doucments = hexdec(uniqid()) . '.' . strtolower($request->file('files')->getClientOriginalExtension());
            $request->file('files')->move('public/image/ads/', $doucments);
            $file = 'public/image/ads/' . $doucments;
            $registrationfiles->user_bid_id =  $quote->id;
            $registrationfiles->car_image = $file ;
            $registrationfiles->type = 'file' ;
            $registrationfiles->save() ;
        }
        // this is registration oucment
        $accidentailfile = new UserBidImage();
        if ($request->file('doucment')) {
            $files = [];
            foreach ($request->file('doucment') as $data) {
                $doucments = hexdec(uniqid()) . '.' . strtolower($data->getClientOriginalExtension());
                $data->move('public/image/ads/', $doucments);
                $files[] = 'public/image/ads/' . $doucments;
            }
            $accidentailfile->user_bid_id =  $quote->id;
            $accidentailfile->car_image = implode(",", $files); ;
            $accidentailfile->type = 'file' ;
            $accidentailfile->save() ;
        }
        if ($request->category) {
            foreach ($request->category as $data) {
                $user = new UserBidCategory() ;
                $user->user_bid_id = $quote->id ;
                $user->category_id = $data ;
                $user->save();
            }
        }
        return $this->message($quote, 'user.quoteindex', 'Bid created  Successfully', 'Bid is not  Create Error');
    }

    public function reply ()
    {
        $page_title = 'Qoute Response ';
        return view('user.quote.response', compact('page_title' ));
    }
    public function vendorResponse ()
    {
        $page_title = 'vendor response ';
        return view('user.quote.vendor_reply', compact('page_title' ));
    }
}

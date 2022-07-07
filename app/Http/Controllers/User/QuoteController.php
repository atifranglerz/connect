<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
use App\Models\Garage;
use App\Models\ModelYear;
use App\Models\UserBid;
use App\Models\UserBidCategory;
use App\Models\UserBidImage;
use App\Models\UserWishlist;
use App\Models\VendorBid;
use App\Models\VendorQuote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuoteController extends Controller
{
    public function index()
    {
        $data['page_title'] = 'quote/index ';
        $data['user_bid'] = UserBid::where('user_id', Auth::id())->get();
        return view('user.quote.index', $data);
    }

    public function create()
    {
        $company = Company::all();
        $year = ModelYear::all();
        $catagary = Category::all();
        $page_title = 'Request Quote';
        return view('user.quote.create', compact('page_title', 'catagary', 'company', 'year'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'car_images' => 'required',
            'looking_for' => 'required',
            'model' => 'required',
            'company_id' => 'required',
            'model_year_id' => 'required',
            'mileage' => 'required',
            'day' => 'required',
            'maker_name' => 'required',
            'address' => 'required',
            'registration_no' => 'required',
            'Chasis_no' => 'required',
            'color' => 'required',
        ]);
        if ($request->looking_for == 'I have Inspection Report & Looking for the Quotations') {
            $request->validate([
                'files' => 'required',
            ]);
        }
        if ($request->looking_for == 'I have Inspection Report & Looking for the Quotations' || $request->looking_for == "I know about what i'm looking for and requesting for the Quotations") {
            $request->validate([
                'category' => 'required',
            ]);
        }
        $quote = new UserBid();
        $quote->user_id = Auth::id();
        $quote->model = $request->model;
        $quote->company_id = $request->company_id;
        $quote->model_year_id = $request->model_year_id;
        $quote->day = $request->day;
        $quote->mileage = $request->mileage;
        $quote->reference_no = mt_rand(123456, 9999999);
        $quote->description1 = $request->description1;
        $quote->description2 = $request->description2;
        $quote->car_owner_name = $request->maker_name;
        $quote->phone = $request->phone;
        $quote->address = $request->address;
        $quote->registration_no = $request->registration_no;
        $quote->Chasis_no = $request->Chasis_no;
        $quote->color = $request->color;
        $quote->offer_status = "pending";
        $quote->looking_for = $request->looking_for;
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
            $imagefiles->user_bid_id = $quote->id;
            $imagefiles->car_image = implode(",", $images);

            $imagefiles->type = 'image';
            $imagefiles->save();
        }
        // police / accident report
        $registrationfiles = new UserBidImage();
        if ($request->file('files')) {
            $doucments = hexdec(uniqid()) . '.' . strtolower($request->file('files')->getClientOriginalExtension());
            $request->file('files')->move('public/image/ads/', $doucments);
            $file = 'public/image/ads/' . $doucments;
            $registrationfiles->user_bid_id = $quote->id;
            $registrationfiles->car_image = $file;
            $registrationfiles->type = 'file';
            $registrationfiles->save();
        }
        // this is registration doucment
        $accidentailfile = new UserBidImage();
        if ($request->file('doucment')) {
            $files = [];
            foreach ($request->file('doucment') as $data) {
                $doucments = hexdec(uniqid()) . '.' . strtolower($data->getClientOriginalExtension());
                $data->move('public/image/ads/', $doucments);
                $files[] = 'public/image/ads/' . $doucments;
            }
            $accidentailfile->user_bid_id = $quote->id;
            $accidentailfile->car_image = implode(",", $files);
            $accidentailfile->type = 'registerImage';
            $accidentailfile->save();
        }

        if ($request->category) {
            foreach ($request->category as $data) {
                $user = new UserBidCategory();
                $user->user_bid_id = $quote->id;
                $user->category_id = $data;
                $user->save();
            }
            if ($request->action == 'all_garage') {

                $vendor_quote = new VendorQuote;
                $vendor_quote->user_id = Auth()->user()->id;
                $vendor_quote->user_bit_id = $quote->id;
                $vendor_quote->save();
                $SendNotification =new  SendNotification();
                dispatch($SendNotification);

            } else {

                $id = Auth()->user()->id;
                $data = UserWishlist::where('user_id', $id)->with('garage')->get();
                foreach ($data as $list_item) {
                    $object = new VendorQuote;
                    $object->user_id = Auth()->user()->id;
                    $object->user_bit_id = $quote->id;
                    $object->vendor_id = $list_item->garage->vendor_id;
                    $object->save();

                }

            }

        } else {
            if ($request->action == 'all_garage') {

                $vendor_quote = new VendorQuote;
                $vendor_quote->user_id = Auth()->user()->id;
                $vendor_quote->user_bit_id = $quote->id;
                $vendor_quote->save();
                $SendNotification =new  SendNotification();
                dispatch($SendNotification);
            }
        }
        if ($request->action == 'all_garage') {

            return $this->message($quote, 'user.quoteindex', 'Quotation has been sent to all the Garages', 'Quotation has not been sent to all the Garages');
        } else {
            return $this->message($quote, 'user.quoteindex', 'Quotation has been sent to all the Preffered Garages', 'Quotation has not been sent to all the Preffered Garages');
        }
    }

    public function reply($id)
    {

        $data = \App\Models\VendorBid::with('vendordetail')->where('user_bid_id', '=', $id)->get();
        $page_title = 'Qoute Response';
        return view('user.quote.response', compact('page_title', 'data'));
    }
    public function vendorResponse($id)
    {
        $data = \App\Models\VendorBid::with('vendordetail')->where('id', '=', $id)->first();
        $page_title = 'vendor response ';
        return view('user.quote.vendor_reply', compact('page_title', 'data'));
    }
    public function printOrderDetails($id)
    {
        $data = VendorBid::where('id', $id)->with('part', 'vendordetail')->first();
        return view('user.quote.print_order_details', compact('data'));
    }

}

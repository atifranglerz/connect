<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ads ;

class adsController extends Controller
{
    public function index()
    {
        return view('vendor.ads');
    }
    public function edit()
    {
        return view('vendor.update_ads');
    }
    public function store (Request $request)
    {
        //dd($request->images);
        if ($request->file('images')) {
            foreach ($request->file('images') as $data) {
                $filename = hexdec(uniqid()) . '.' . strtolower($data->getClientOriginalExtension());
                $data->move('public/image/ads/', $filename);
                $image = 'public/image/ads/' . $filename;
            }
            /*if ($request->has('old_image')) {
                $old_image = $request->image;
                unlink($old_image);
            }*/
        }

        //$request->file;
//        $imagePath = $req->file('file');
//        $imageName = $imagePath->getClientOriginalName();
//        echo($imageName);
        // get names
//        $image1 = $request->file('images');
//        $imageName = $image1->getClientOriginalName();
//        $image2 = $request->file('file');
//        $imageName2 = $image2->getClientOriginalName();
        $ads = new Ads() ;
        $ads->car_image = $imageName;
        $ads->registration_image = $imageName2;;
        $ads->model = $request->model ;
        $ads->company = $request->company ;
        $ads->year = $request->type_of_service ;
        $ads->price = $request->price ;
        $ads->color = $request->color ;
        $ads->engine = $request->engine ;
        $ads->phone = $request->phone ;
        $ads->address = $request->address;
        $ads->milage = $request->milage;
        $ads->description = $request->description ;
        $ads->vendor_id = "1";
        if($ads->save())
        {
            return view('vendor.ads');
        }
        else
        {
            return  "not save ";
        }

    }

}

<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use App\Models\category;
use App\Models\Company ;
use App\Models\ModelYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $ads = Ads::all();
        return view('vendor.ads.index', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
       $company = Company::all();
        $year = ModelYear::all();
        $page_title = 'Ad index';
        return view('vendor.ads.create', compact('company','year','page_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        /*$i1 = $request->image->getClientOriginalName();
        $i2 = $request->file->getClientOriginalName();
        dd($i1, $i2);*/
        $request->validate([
            'model' => 'required',
            'company_id' => 'required',
            'model_year_id' => 'required',
            'price' =>'required',
            'color' =>'required',
            'engine'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'mileage'=>'required',
        ]);
        $ads = new Ads();
        if ($request->file('car_images')) {
            $images = [];
            foreach ($request->file('car_images') as $data) {
                $image = hexdec(uniqid()) . '.' . strtolower($data->getClientOriginalExtension());
                $data->move('public/image/ads/', $image);
                $images[] = 'public/image/ads/' . $image;
            }
            /*if ($request->has('old_image')) {
                $old_image = $request->image;
                unlink($old_image);
            }*/
            $ads->images = implode(",", $images);
        }
        if ($request->file('files')) {
            $files = [];
            foreach ($request->file('files') as $data) {
                $doucments = hexdec(uniqid()) . '.' . strtolower($data->getClientOriginalExtension());
                $data->move('public/image/ads/', $doucments);
                $files[] = 'public/image/ads/' . $doucments;
            }

            /*if ($request->has('old_image')) {
                $old_image = $request->image;
                unlink($old_image);
            }*/
            $ads->document_file = implode(",", $files);
        }
        $ads->model = $request->model;
        $ads->company_id =  $request->company_id ;
        $ads->model_year_id = $request->model_year_id;
        $ads->price = $request->price;
        $ads->color = $request->color;
        $ads->engine = $request->engine;
        $ads->phone = $request->phone;
        $ads->address = $request->address;
        $ads->mileage = $request->mileage;
        $ads->description = $request->description;
        $ads->vendor_id = Auth::id();
        $ads->save();
        $this->jsonMessage($ads, 'Ad is  added successfully!', 'Ads is noy successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $ads = Ads::findOrFail($id);
        //dd($ads);
        return view('vendor.ads.edit', compact('ads'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd($request->name, $id);
//        //dd($request->images);
//        if ($request->file('images')) {
//            foreach ($request->file('images') as $data) {
//                $doucmentsOfcars = hexdec(uniqid()) . '.' . strtolower($data->getClientOriginalExtension());
//                $data->move('public/image/ads/', $doucmentsOfcars);
//                $image = 'public/image/ads/' . $doucmentsOfcars;
//            }
//            /*if ($request->has('old_image')) {
//                $old_image = $request->image;
//                unlink($old_image);
//            }*/
//        }
//        //$request->file;
////        $imagePath = $req->file('file');
////        $imageName = $imagePath->getClientOriginalName();
////        echo($imageName);
//        // get names
////        $image1 = $request->file('images');
////        $imageName = $image1->getClientOriginalName();
////        $image2 = $request->file('file');
////        $imageName2 = $image2->getClientOriginalName();
//        $ads = Ads::findOrFail($id);
//        $ads->car_image = $doucmentsOfcars;
//        $ads->registration_image = "23";
//        $ads->model = $request->model ;
//        $ads->company = $request->company ;
//        $ads->year = $request->type_of_service ;
//        $ads->price = $request->price ;
//        $ads->color = $request->color ;
//        $ads->engine = $request->engine ;
//        $ads->phone = $request->phone ;
//        $ads->address = $request->address;
//        $ads->milage = $request->milage;
//        $ads->description = $request->description ;
//        $ads->vendor_id = "1";
//        if($ads->save())
//        {
//            return view('vendor.ads');
//        }
//        else
//        {
//            return  "not save ";
//        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

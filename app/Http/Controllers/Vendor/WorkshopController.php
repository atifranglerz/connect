<?php

namespace App\Http\Controllers\vendor;

use App\Models\Garage;
use App\Models\Country;
use App\Models\Vendor ;
use App\Models\Category;
use App\Models\UserReview;
use App\Models\GarageTiming;
use Illuminate\Http\Request;
use App\Models\GarageCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WorkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $authvendor = Vendor::find(Auth::id());
        $page_title = 'WorkShop';
        $categories = Category::get();
        $countries = Country::all();
        return view('vendor.workshop.create', compact('page_title' ,'authvendor','categories','countries'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $page_title = 'WorkShop';
        $categories = Category::get();
        return view('vendor.workshop.create', compact('page_title','categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $request->validate([
            'garage_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'country' => 'required',
            'city' => 'required',
            'post_box' => 'required',
            'category' => 'required',
            'trading_no' => 'required',
            'vat' => 'required',
            'description' => 'required',
        ]);
        $garage = Garage::where('vendor_id', Auth::id())->first();
        if (empty($garage)) {
            $garage = new Garage();
            $garage->vendor_id = Auth::id();
            $garage->trading_no = $request->trading_no;
            $garage->vat = $request->vat;
            $garage->phone = $request->phone;
            $garage->garage_name = $request->garage_name;
            $garage->description = $request->description;
            if ($request->file('images')) {
                foreach($request->file('images') as $image)
                {
                    $name=time().'.' . $image->getClientOriginalExtension();
                   $image->move('public/image/garage/',$name);
                    $garage['image']='public/image/garage/'.$name;
                }

                /*if ($request->has('old_image')) {
                    $old_image = $request->image;
                    unlink($old_image);
                }*/

            }
            $garage->country = $request->country;
            $garage->city = $request->city;
            $garage->address = $request->address;
            $garage->post_box = $request->post_box;
            $garage->save();
            if ($garage) {

                $categories = $request->category;
                foreach ($categories as $cat) {

                      $data=[
                          'garage_id' => $garage->id,
                          'category_id' =>intval($cat),
                          ];
                    GarageCategory::create($data);
                }

                $length =count($request->day);

                for ($i = 0; $i < $length; $i++) {
                    if(isset($request->closed[$i])){
                        $closed=1;
                    }else{
                        $closed=0;
                    }
                    GarageTiming::create([
                        'garage_id' => $garage->id,
                        'day' => $request->day[$i],
                        'from' => $request->from[$i],
                        'to' => $request->to[$i],
                        'closed' =>$closed,
                    ]);
                }
            }
            $preview_garage=Garage::find($garage->id);
            return view('vendor.workshop.preview_workshop',compact('preview_garage'));
            return $this->message($garage, 'vendor.dashboard', 'workshop Create Successfully', 'workshop not Create Error');
        } else {

            return redirect()->route('vendor.dashboard')->with($this->data('Workshop Already Create', 'warning'));
        }

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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $page_title = 'Edit Workshop';
        $garage = Garage::where('vendor_id',Auth::id())->with('vendor','garageCategory')->first();
        $categories=Category::all();
        return view('vendor.workshop.edit', compact('page_title', 'garage','categories'));

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
        // return $request;
        $request->validate([
            'garage_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'country' => 'required',
            'city' => 'required',
            'post_box' => 'required',
            'category' => 'required',
            'trading_no' => 'required',
            'vat' => 'required',
        ]);
        $garage = Garage::findOrFail($id);
        $garage->vendor_id = Auth::id();
        $garage->trading_no = $request->trading_no;
        $garage->vat = $request->vat;
        $garage->phone = $request->phone;
        $garage->garage_name = $request->garage_name;
        if ($request->file('images')) {
            foreach($request->file('images') as $image)
            {
                $name=time().'.' . $image->getClientOriginalExtension();
               $image->move('public/image/garage/',$name);
                $garage['image']='public/image/garage/'.$name;
            }
        }
        $garage->description = $request->description;
        $garage->country = $request->country;
        $garage->city = $request->city;
        $garage->address = $request->address;
        $garage->post_box = $request->post_box;
        $garage->save();
        if ($garage) {

            $data=GarageCategory::where('garage_id',$id)->get();
            foreach($data as $cat){
                $cat->delete();
            }
            $categories = $request->category;
            foreach ($categories as $cat) {
                $data=[
                    'garage_id' => $garage->id,
                    'category_id' =>intval($cat),
                    ];
              GarageCategory::create($data);
          }
            // foreach ($categories as $cat) {
            //     GarageCategory::where('garage_id', $id)->update([
            //         'garage_id' => $garage->id,
            //         'category_id' =>intval($cat),
            //     ]);
            // }

            $garage_timing=GarageTiming::where('garage_id',$garage->id)->get();
            $length=count($garage_timing);
            for ($i = 0; $i < $length; $i++) {
                if(isset($request->closed[$i])){

                    $closed=1;
                }else{
                    $closed=0;
                }
                GarageTiming::find($garage_timing[$i]->id)->update([
                    'garage_id' => $garage->id,
                    'day' => $request->day[$i],
                    'from' => $request->from[$i],
                    'to' => $request->to[$i],
                    'closed' =>$closed,
                ]);
            }
        }
        $preview_garage=Garage::find($garage->id);
        $user_review = UserReview::where('garage_id', $preview_garage->id)->get();

        return view('vendor.workshop.preview_workshop',compact('preview_garage','user_review'));
        return $this->message($garage, 'vendor.dashboard', 'workshop Update Successfully', 'workshop not Update Error');
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
    public function finish(){
        $garage=Garage::where('vendor_id',auth()->id())->first();
        return $this->message($garage, 'vendor.dashboard', 'workshop Saved Successfully', 'workshop not Create Error');
    }
}

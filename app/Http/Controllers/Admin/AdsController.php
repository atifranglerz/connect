<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ads;
use App\Models\Company;
use App\Models\ModelYear;
use Illuminate\Http\Request;
use App\Mail\SendApprovedMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ads::with('company', 'modelYear')->orderBy('id','desc')->get();
        return view('admin.ads.index',compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'create';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ads = Ads::with('company', 'modelYear')->find($id);
        $company = Company::all();
        $year = ModelYear::all();
        return view('admin.ads.edit',compact('ads','company','year'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 'edit';

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd('usman');
        $request->validate([
            'model' => 'required',
            'company_id' => 'required',
            'model_year_id' => 'required',
            'price' => 'required',
            'color' => 'required',
            'engine' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'mileage' => 'required',
        ]);
        $ads = Ads::find($id);
        $ads->model = $request->model;
        $ads->company_id = $request->company_id;
        $ads->model_year_id = $request->model_year_id;
        $ads->price = $request->price;
        $ads->color = $request->color;
        $ads->engine = $request->engine;
        $ads->phone = $request->phone;
        $ads->address = $request->address;
        $ads->mileage = $request->mileage;
        $ads->city = $request->city;
        $ads->country = $request->country;
        $ads->description = $request->description;
        // $ads->user_id = Auth::id();
        $ads->update();
        // session_start();
        // $_SESSION["msg"] = "Ad Updated Successfully";
        // $_SESSION["alert"] = "success";
        // return redirect()->route('user.ads.index');
        return $this->message($ads, 'admin.ads.index', 'Ad Updated Successfully', '  Ad is not update Error');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteAds($id)
    {
        $ad = Ads::find($id);
        $ad->delete();
        return redirect()->back()->with($this->data("Ads delete successfully", 'success'));


    }
    public function approvedRequest($id){
        $data=Ads::with('user')->find($id);
        $data->status='Approved';
        $data->save();
        Mail::to($data->user->email)->send(new SendApprovedMail($data));
        return redirect()->back()->with($this->data("Update status successfully", 'success'));
    }
    public function rejectRequest($id){
        $data=Ads::with('user')->find($id);
        $data->status='Rejected';
        $data->save();
        return redirect()->back()->with($this->data("Update status successfully", 'success'));
    }
}

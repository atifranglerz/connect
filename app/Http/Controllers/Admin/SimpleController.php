<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AddPackage;
use App\Models\SimpleAd;
use Illuminate\Http\Request;

class SimpleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = SimpleAd::all();
        return view('admin.simpleAds.index', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $packages = AddPackage::find($id);
        return view('admin.simpleAds.edit', compact('packages'));
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
        $package = AddPackage::find($id);
        $package->package_name = $request->package_name;
        $package->price = $request->price;
        $package->validity = $request->validity;
        $package->save();

        return redirect()->route('admin.all-packages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function delete($id)
    {
        $ad = SimpleAd::find($id);
        $ad->delete();
        return redirect()->back();
    }

    public function package()
    {
        $packages = AddPackage::all();
        return view('admin.simpleAds.package', compact('packages'));
    }

    public function status($id)
    {
        $ad = SimpleAd::find($id);
        if ($ad->status == 'Pending') {
            $ad->status = 'Approved';
        } elseif ($ad->status == 'Approved') {
            $ad->status = 'Rejected';
        } else {
            $ad->status = 'Approved';
        }
        $ad->save();

        // if ($ad->status == 'Approved') {
        //     if (isset($ad->user_id)) {
        //         $email = $ad->user->email;
        //     } else {
        //         $email = $ad->vendor->email;
        //     }
        //     $data = $ad;
        //     Mail::to($email)->send(new SendApprovedMail($data));
        // }
        return redirect()->back()->with($this->data("Status Successfully Updated", 'success'));
    }

}

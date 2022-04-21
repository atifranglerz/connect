<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use Illuminate\Http\Request;
use App\Models\vendor;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = 'Profile';
        return view('vendor.profile.index', compact('page_title'));
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
        $profile = Vendor::findOrFail($id);
        return view('vendor.profile.edit', compact('profile'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {;
        //dd($request);
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'country' => 'required',
            'city' =>'required',
            'postbox' =>'required',
            'phone'=>'required',
            'address'=>'required',
            'password'=>'required',
             'conform_password'=>'required',
        ]);
        $vendorVendor =  Vendor::findOrFail($id);
        $vendorVendor->name = $request->name ;
        $vendorVendor->email = $request->email ;
        $vendorVendor->country = $request->country ;
        $vendorVendor->post_box = $request->postbox ;
        $vendorVendor->phone = $request->phone ;
        $vendorVendor->address = $request->address ;
        $vendorVendor->password = bcrypt($request->password) ;
        $vendorVendor->update();
        return $this->message($vendorVendor, 'vendor.profile.index', 'profile Update Successfully', '  profile is not update Error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

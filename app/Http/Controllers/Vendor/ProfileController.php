<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use Illuminate\Http\Request;
use App\Models\vendor;
use Illuminate\Support\Facades\Auth;

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
        $data =  Vendor::findOrFail(Auth::id());
        return view('vendor.profile.index', compact('page_title' , 'data'));
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
    {
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
        $vendor =  Vendor::findOrFail($id);
        if ($request->file('image')) {
            $doucments = hexdec(uniqid()) . '.' . strtolower($request->file('image')->getClientOriginalExtension());
            $request->file('image')->move('public/image/profile/', $doucments);
            $file = 'public/image/profile/' . $doucments;
            $vendor->image = $file ;
        }
        $vendor->name = $request->name ;
        $vendor->email = $request->email ;
        $vendor->country = $request->country ;
        $vendor->post_box = $request->postbox ;
        $vendor->phone = $request->phone ;
        $vendor->address = $request->address ;
        $vendor->password = bcrypt($request->password) ;
        $vendor->update();
        return $this->message($vendor, 'vendor.profile.index', 'profile Update Successfully', '  profile is not update Error');
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

<?php

namespace App\Http\Controllers\vendor;

use App\Models\User;
use App\Models\vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $data = Vendor::findOrFail(Auth::id());
        return view('vendor.profile.index', compact('page_title', 'data'));
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
        $company = User::where('type','company')->get();
        $profile = Vendor::with('company')->findOrFail($id);
        return view('vendor.profile.edit', compact('profile', 'company'));

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
            'city' => 'required',
            'postbox' => 'required',
            'phone' => 'required',
            'address' => 'required',
            // 'password'=>'required',
            //  'conform_password'=>'required',
        ]);
        $vendor = Vendor::findOrFail($id);
        if ($request->file('images')) {
            $images = [];
            foreach ($request->file('images') as $data) {
                //dd($data);
                $image = hexdec(uniqid()) . '.' . strtolower($data->getClientOriginalExtension());
                $data->move('public/image/profile/', $image);
                $images[] = 'public/image/profile/' . $image;
            }
            $vendor->image = implode(",", $images);
        }
        $vendor->name = $request->name;
        $vendor->email = $request->email;
        $vendor->country = $request->country;
        $vendor->post_box = $request->postbox;
        $vendor->phone = $request->phone;
        $vendor->city = $request->city;
        $vendor->address = $request->address;
        // $vendor->password = Hash::make($request->password);
        $vendor->update();

        if (isset($request->company)) {

            $company = DB::table('insurance_vendor')->where('vendor_id', Auth::guard('vendor')->id())->delete();
           
            foreach($request->company as $id) {
                $company = User::find($id);
                $vendor->company()->attach($company);
            }
        }

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

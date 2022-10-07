<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Garage;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $vendors = Vendor::with('roles')
            ->whereHas('roles', function ($q) {
                $q->Where('name', 'vendor');
            })
            ->get();
        $page_title = 'Vendor';
        return view("admin.vendor.index", compact('vendors', 'page_title'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $company = User::where('type','company')->get();
        $garage=Garage::all();
        $vendor = Vendor::with('company')->findOrFail($id);
        $page_title = 'Vendor';
        return view('admin.vendor.edit', compact('vendor', 'page_title','company','garage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'garage_name' => 'required',
            'post_box' => 'required',
            'company'=>'required',
            'phone' => 'required',
            'trading_license' => 'required',
            'vat' => 'required',
            'billing_area' => 'required',
            'billing_city' => 'required',
            'billing_address' => 'required',
            'appointment_number' => 'required',
        ]);
        $vendor = Vendor::findOrFail($id);
        if ($request->file('image')) {
            $images = [];
            foreach ($request->file('image') as $data) {
                $image = hexdec(uniqid()) . '.' . strtolower($data->getClientOriginalExtension());
                $data->move('public/image/profile/', $image);
                $images[] = 'public/image/profile/' . $image;
            }
            $vendor->image = implode(",", $images);
        }
        if ($request->file('id_card')) {
            $images = [];
            foreach ($request->file('id_card') as $data) {
                $image = hexdec(uniqid()) . '.' . strtolower($data->getClientOriginalExtension());
                $data->move('public/image/profile/', $image);
                $images[] = 'public/image/profile/' . $image;
            }
            $vendor->id_card = implode(",", $images);
        }
        if ($request->file('image_license')) {
            $images = [];
            foreach ($request->file('image_license') as $data) {
                $image = hexdec(uniqid()) . '.' . strtolower($data->getClientOriginalExtension());
                $data->move('public/image/profile/', $image);
                $images[] = 'public/image/profile/' . $image;
            }
            $vendor->image_license = implode(",", $images);
        }
        $vendor->name = $request->name;
        $vendor->email = $request->email;
        $vendor->country = $request->country;
        $vendor->post_box = $request->post_box;
        $vendor->address = $request->address;
        $vendor->phone = $request->phone;
        $vendor->city = $request->city;
        $vendor->vat = $request->vat;
        $vendor->billing_area = $request->billing_area;
        $vendor->billing_city = $request->billing_city;
        $vendor->billing_address = $request->billing_address;
        $vendor->trading_license = $request->trading_license;
        $vendor->appointment_number = $request->appointment_number;
        $vendor->update();

        if (isset($request->company)) {

            $company = DB::table('insurance_vendor')->where('vendor_id', $vendor->id)->delete();

            foreach($request->company as $id) {
                $company = User::find($id);
                $vendor->company()->attach($company);
            }
        }
        return $this->message($vendor, 'admin.vendor.index', 'Vendor Update Successfully', 'Vendor Update Error');
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $vendor = Vendor::findOrFail($id);
        if ($vendor->hasRole('vendor')) {
            if (Hash::check($request->old_password, $vendor->password)) {
                $vendor->password = bcrypt($request->password);
                $vendor->save();

                return redirect()->route('admin.vendor.index')->with($this->data("Update Vendor Password Successfully", 'success'));
            } else {
                return redirect()->back()->with($this->data("Update Vendor Password Error", 'error'));
            }
        } else {
            return redirect()->back()->with($this->data('You do not have the required authorization!', 'error'));
        }

    }

    public function activate($id)
    {
        $vendor = Vendor::findOrFail($id);
        if ($vendor->hasRole('vendor')) {
            if ($vendor->action == 0) {
                $vendor->fill([
                    'action' => 1,
                ])->save();
                return redirect()->route('admin.vendor.index')->with($this->data("Vendor Activate Successfully", 'success'));
            } else {
                return redirect()->back()->with($this->data("Vendor Activate Error", 'error'));
            }
        } else {
            return redirect()->back()->with($this->data('You do not have the required authorization!', 'error'));
        }
    }

    public function deactivate($id)
    {
        $vendor = Vendor::findOrFail($id);
        if ($vendor->hasRole('vendor')) {
            if ($vendor->action == 1) {
                $vendor->fill([
                    'action' => 0,
                ])->save();
                return redirect()->route('admin.vendor.index')->with($this->data("Vendor DeActivate Successfully", 'success'));
            } else {
                return redirect()->back()->with($this->data("Vendor DeActivate Error", 'error'));
            }
        } else {
            return redirect()->back()->with($this->data('You do not have the required authorization!', 'error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $vendor = Vendor::findOrFail($id);
        if ($vendor->hasRole('vendor')) {
            $vendor->delete();
            return $this->message($vendor, 'admin.vendor.index', 'Vendor Delete successfully', 'Vendor Delete Error');
        } else {
            return redirect()->back()->with($this->data('You do not have the required authorization!', 'error'));
        }
    }
}

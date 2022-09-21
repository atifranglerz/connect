<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;
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
        $vendor = Vendor::findOrFail($id);
        $page_title = 'Vendor';
        return view('admin.vendor.edit', compact('vendor', 'page_title'));
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
            'name' => ['required', 'string', 'max:255'],
            //'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => 'required',
        ]);
        $vendor = Vendor::findOrFail($id);
        $vendor->name = $request->name;
        //$vendor->email = $request->email;
        $vendor->phone = $request->phone;
        $vendor->save();
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

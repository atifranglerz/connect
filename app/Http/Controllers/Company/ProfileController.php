<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\InsuranceCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class profileController extends Controller
{
    public function index()
    {
        $company = Auth::guard('company')->user();
        $page_title = 'Company Profile';
        return view('company.profile.index', compact('company', 'page_title'));
    }

    public function edit($id)
    {
        //$user = Auth::guard('web')->user();
        $page_title = 'Profile Edit';
        $profile = InsuranceCompany::findOrFail($id);
        return view('company.profile.edit', compact('profile', 'page_title'));
    }

    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone'=>'required',
            'city' =>'required',
            'country' => 'required',
            // 'post_box' =>'required',
        ]);
        $company =  InsuranceCompany::findOrFail($id);
        if ($request->file('images')) {
            $images = [];
            foreach ($request->file('images') as $data) {
                //dd($image);
                $image = hexdec(uniqid()) . '.' . strtolower($data->getClientOriginalExtension());
                $data->move('public/image/profile/', $image);
                $images[] = 'public/image/profile/' . $image;
            }
            $company->image = implode(",", $images);
        }
        $company->name = $request->name ;
        $company->phone = $request->phone ;
        $company->city = $request->city ;
        $company->country = $request->country ;
        // $company->post_box = $request->post_box ;
        $company->update();
        return $this->message($company, 'company.profile', 'profile Update Successfully', '  profile is not update Error');
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $user = User::findOrFail($id);
        if (Hash::check($request->old_password, $user->password)) {
            $user->fill([
                'password' => Hash::make($request->password)
            ])->save();

            return redirect()->route('profile')->with($this->data("Update Password Successfully", 'success'));
        } else {
            return redirect()->back()->with($this->data("Update Password Error", 'error'));
        }
    }



   
}

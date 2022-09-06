<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class profileController extends Controller
{
    public function index()
    {
        $user = Auth::guard('web')->user();
        $page_title = 'User Profile';
        return view('user.profile.index', compact('user', 'page_title'));
    }

    public function edit($id)
    {
        //$user = Auth::guard('web')->user();
        $company = User::where('type','company')->get();

        $page_title = 'User Profile Edit';
        $profile = user::findOrFail($id);
        return view('user.profile.edit', compact('profile', 'page_title','company'));
    }

    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone'=>'required',
            'city' =>'required',
            'country' => 'required',
            'post_box' =>'required',
        ]);
        $user =  user::findOrFail($id);
        if ($request->file('images')) {
            $images = [];
            foreach ($request->file('images') as $data) {
                //dd($image);
                $image = hexdec(uniqid()) . '.' . strtolower($data->getClientOriginalExtension());
                $data->move('public/image/profile/', $image);
                $images[] = 'public/image/profile/' . $image;
            }
            $user->image = implode(",", $images);
        }
        $user->name = $request->name ;
        $user->phone = $request->phone ;
        $user->city = $request->city ;
        $user->country = $request->country ;
        $user->post_box = $request->post_box ;
        $user->update();

        if (isset($request->company)) {
            $company = DB::table('insurance_user')->where('user_id', Auth::id())->delete();
 
                $company = User::find($request->company);
                $user->company()->attach($company);

        }
        return $this->message($user, 'user.profile.index', 'profile Update Successfully', '  profile is not update Error');
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

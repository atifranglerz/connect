<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
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

    public function edit()
    {
        $user = Auth::guard('web')->user();
        $page_title = 'User Profile Edit';
        return view('user.profile.edit', compact('user', 'page_title'));
    }

    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => 'required',
        ]);
        $user = User::findorFail($id);
        if ($request->has('profile')) {
            $image = $request->file('profile');
            $image_name = hexdec(uniqid()) . '.' . strtolower($image->getClientOriginalExtension());
            $image->move('public/image/profile/', $image_name);
            $image = 'public/image/profile/' . $image_name;
            $user->image = $image;
        }
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->city = $request->city;
        $user->country = $request->country;
        $user->post_box = $request->post_box;
        $user->save();
        return $this->message($user, 'user.profile.index', 'Profile Update Successfully', 'Profile Update Error');
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

<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    public function register()
    {
        $page_title = 'Vendor Register';
        return view('vendor.auth.register', compact('page_title'));
    }

    public function vendorRegister(Request $request)
    {
//        $request->validate([
//            'name' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:vendors'],
//            'phone' => 'required|unique:vendors,phone',
//            'password' => ['required', 'confirmed',],
//        ]);
        $role = Role::where('name', 'vendor')->first();
        $vendor = new  Vendor();
        $vendor->name = $request->name;
        $vendor->email = $request->email;
        $vendor->country = $request->country;
        $vendor->city = $request->city;
        $vendor->post_box = $request->post_box;
        $vendor->phone = $request->phone;
        $vendor->address = $request->address;
        $vendor->password = bcrypt($request->password);
        $vendor->save();
        if ($vendor) {
            $vendor->assignRole($role);
            return redirect()->route('vendor.login')->with($this->data("Vendor Register Successfully", 'success'));
        } else {
            return redirect()->back()->with($this->data("Vendor Register Error", 'error'));
        }
    }

    public function login()
    {
        $page_title = 'Vendor Login';
        return view('vendor.auth.login', compact('page_title'));
    }

    public function vendorLogin(Request $request)
    {
        //return redirect()->route('vendor.dashboard');
//        $request->validate([
//            'email' => 'required',
//            'password' => 'required',
//        ]);
        if (Auth::guard('vendor')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $vendor_role = Auth::guard('vendor')->user()->hasRole('vendor');
            if ($vendor_role) {
                return redirect()->route('vendor.dashboard');
                    //->with($this->message("Vendor Login Successfully", 'success'));
            }
            else {
                return redirect()->back()->with($this->message("Login Error", 'error'));
            }
        }
        else {
            return redirect()->back()->with($this->message("Vendor Email Or Password Invalid!", 'error'));
        }

    }

    public function forgetPassword(){
        $page_title = 'Forget Password';
        return view('vendor.auth.forget_password', compact('page_title'));
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:vendors,email',
        ]);
        $page_title = 'Otp Confirm';
        $vendor = Vendor::where('email', $request->email)->first();
        $otp = mt_rand(10000, 99999);
        $email = $vendor->email;
        $details['otp'] = $otp;
        try {
            Mail::to($request->email)->send(new ResetPassword($details));
        } catch(\Swift_TransportException $e){
            if($e->getMessage()) {
                dd($e->getMessage());
            }
        }
        DB::table('password_resets')->insert([
            'email' => $vendor->email,
            'otp' => $otp,
            'created_at' => Carbon::now()
        ]);
        return view('vendor.auth.otp', compact('page_title', 'email'));
    }

    public function otpConfirm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:vendors',
            'otp' => 'required',
        ]);
        $page_title = 'Update Password';
        $vendor = Vendor::where('email', $request->email)->first();
        $email = $vendor->email;
        $otp_confirm = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'otp' => $request->otp
            ])
            ->first();
        if (!$otp_confirm) {
            return redirect()->back()->with('OTP not same!');
        }

        return view('vendor.auth.password_change', compact('page_title', 'email'));
    }

    /**
     * Write code on Method
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|object
     */
    public function submitResetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:vendors',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);
        $vendor = Vendor::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);
        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return redirect()->route('vendor.login')->with('Your Password Update Successfully');
    }

    public function logout(Request $request)
    {
        Auth::guard('vendor')->logout();
        return redirect()->route('vendor.login')->with($this->message("Vendor Logout Successfully", "success"));
    }

    public function profile()
    {
        $vendor = Auth::guard('vendor')->user();
        $page_title = 'Vendor Profile';
        return view('vendor.profile', compact('vendor', 'page_title'));
    }

    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => 'required',
        ]);
        $vendor = Vendor::findorFail($id);
        $vendor->name = $request->name;
        $vendor->email = $request->email;
        $vendor->phone = $request->phone;
        $vendor->update();
        if ($vendor) {
            return redirect()->back()->with($this->message("Profile Update Successfully", "success"));
        } else {
            return redirect()->back()->with($this->message("Profile Update Error", "error"));
        }
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $vendor = Vendor::findOrFail($id);
        if (Hash::check($request->old_password, $vendor->password)) {
            $vendor->fill([
                'password' => Hash::make($request->password)
            ])->save();

            return redirect()->route('profile')->with($this->message("Update Password Successfully", 'success'));
        } else {
            return redirect()->back()->with($this->message("Update Password Error", 'error'));
        }
    }

    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook()
    {
        try {
            $vendor = Socialite::driver('facebook')->user();
            $isUser = Vendor::where('social_id', $vendor->id)->first();

            if($isUser){
                Auth::login($isUser);
                return redirect('/dashboard');
            }else{
                $createUser = Vendor::create([
                    'name' => $vendor->name,
                    'email' => $vendor->email,
                    'fb_id' => $vendor->id,
                    'password' => encrypt('vendor@123')
                ]);

                Auth::login($createUser);
                return redirect('/dashboard');
            }

        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handleGoogleCallback()
    {
        try {
            $vendor = Socialite::driver('google')->user();
            $findvendor = Vendor::where('social_id', $vendor->id)->first();
            if($findvendor){
                Auth::login($findvendor);
                return redirect('/');
            }else{
                $newUser = Vendor::create([
                    'name' => $vendor->name,
                    'email' => $vendor->email,
                    'google_id'=> $vendor->id,
                    'password' => encrypt('123456dummy')
                ]);
                Auth::login($newUser);
                return redirect('/home');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}

<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Mail\ForgetPassword;
use App\Mail\Login;
use App\Models\Category;
use App\Models\Country;
use App\Models\Garage;
use App\Models\User;
use App\Models\Vendor;
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

        $data['company'] = User::where('type', 'company')->get();
        $data['page_title'] = 'Vendor Register';
        $data['countries'] = Country::all();
        $data['categories'] = Category::all();
        return view('vendor.auth.register', $data);
    }

    public function vendorRegister(Request $request)
    {
        // return $request;
        $request->validate([
            // 'profile_image' => 'required',
            "id_card" => 'required',
            'name' => ['required', 'string', 'max:255'],
            'garage_name' => 'required',
            'garages_catagary' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:vendors'],
            'country' => ['required', 'string'],
            'city' => ['required', 'string'],
            'post_box' => 'required',
            // 'company'=>'required',
            // 'phone' => 'required|digits:12',
            'image_license' => 'required',
            'trading_license' => 'required',
            'vat' => 'required',
            'billing_area' => 'required',
            'billing_city' => 'required',
            'billing_address' => 'required',
            'appointment_number' => 'required',
        ]);

        $role = Role::where('name', 'vendor')->first();

        $vendor = new Vendor();
        if ($request->file('profile_image')) {
            $doucments1 = hexdec(uniqid()) . '.' . strtolower($request->file('profile_image')->getClientOriginalExtension());
            $request->file('profile_image')->move('public/image/profile/', $doucments1);
            $file1 = 'public/image/profile/' . $doucments1;
            $vendor->image = $file1;
        }else{
            $vendor->image = "public/assets/images/1744022049828589.jpg";
        }
        if ($request->file('id_card')) {
            $doucments2 = hexdec(uniqid()) . '.' . strtolower($request->file('id_card')->getClientOriginalExtension());
            $request->file('id_card')->move('public/image/profile/', $doucments2);
            $file2 = 'public/image/profile/' . $doucments2;
            $vendor->id_card = $file2;
        }
        if ($request->file('image_license')) {
            $doucments3 = hexdec(uniqid()) . '.' . strtolower($request->file('image_license')->getClientOriginalExtension());
            $request->file('image_license')->move('public/image/profile/', $doucments3);
            $file3 = 'public/image/profile/' . $doucments3;
            $vendor->image_license = $file3;

        }

        $vendor->name = $request->name;
        $vendor->email = $request->email;
        $vendor->phone = $request->appointment_number;
        $vendor->password = Hash::make($request->password);
        $vendor->country = $request->country;
        $vendor->city = $request->city;
        $vendor->post_box = $request->post_box;
        $vendor->appointment_number = $request->appointment_number;
        $vendor->garage_name = $request->garage_name;
        $vendor->vat = $request->vat;
        $vendor->billing_area = $request->billing_area;
        $vendor->billing_city = $request->billing_city;
        $vendor->billing_address = $request->billing_address;
        $vendor->garages_catagory = implode(',', $request->garages_catagary);
        $vendor->trading_license = $request->trading_license;
        $vendor->save();

        if (isset($request->company)) {
            foreach ($request->company as $id) {
                $company = User::find($id);
                $vendor->company()->attach($company);
            }
        }

        $vendor_email = $request->email;
        $data['name'] = $request->name;
        $data['link'] = url('vendor/login');

        if ($vendor) {
            $vendor->assignRole($role);
            Mail::to($vendor_email)->send(new Login($data));
            return redirect()->route('vendor.login')->with($this->data("You've Registered Successfully as a Vendor!", 'success'));
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
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $vendor = Vendor::where('email', $request->email)->first();
        if (isset($vendor) && $vendor->action == 0) {
            return redirect()->back()->with($this->data("Your Account has been Deactivate by Admin!", 'error'));
        }
        if (Auth::guard('vendor')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $vendor_role = Auth::guard('vendor')->user()->hasRole('vendor');
            if ($vendor_role) {
                $garage = Garage::where('vendor_id', Auth::guard('vendor')->id())->first();
                if (empty($garage)) {
                    return redirect()->route('vendor.workshop.index')->with($this->data("create Workshop first ", 'success'));
                } else {
                    return redirect()->route('vendor.dashboard')->with($this->data("You've Login Successfully", 'success'));
                }
            } else {
                return redirect()->back()->with($this->data("you have not this Role!", 'error'));
            }
        } else {
            return redirect()->back()->with($this->data("Vendor Email Or Password Invalid!", 'error'));
        }
    }

    public function forgetPassword()
    {
        $page_title = 'Forget Password';
        return view('vendor.auth.forget_password', compact('page_title'));
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:vendors,email',
        ]);
        $vendor = Vendor::where('email', $request->email)->first();
        $data['email'] = $vendor->email;
        $data['token'] = str_random(30);
        $data['url'] = url('vendor/token_confirm/' . $data['token']);

        try {
            /*Mail::send('emails.forgetPassword', $data, function ($messages) use ($vendor) {
            $messages->to();
            $messages->subject("Forget Password");
            });*/
            Mail::to($data['email'])->send(new ForgetPassword($data));
            DB::table('password_resets')->insert([
                'email' => $vendor->email,
                'token' => $data['token'],
                'created_at' => Carbon::now(),
            ]);
            return redirect()->back()->with($this->data("Forget Password Email Send Successfully.", 'success'));

            // Mail::to($request->email)->send(new ResetPassword($details));
        } catch (\Swift_TransportException $e) {
            if ($e->getMessage()) {
                dd($e->getMessage());
            }
            return redirect()->back()->with($this->data("Forget Password Email Send Error.", 'error'));
        }
    }

    public function tokenConfirm($token)
    {
        $token_confirm = DB::table('password_resets')
            ->where([
                'token' => $token,
            ])
            ->first();
        if ($token_confirm) {
            return view('vendor.auth.password_change', compact('token'));
        } else {
            return redirect()->route('vendor.forget_password')->with($this->data('Token Not Match. Please Try Again', 'error'));
        }

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
            'password' => 'required|string|min:6|confirmed',
        ]);
        $token = DB::table('password_resets')
            ->where([
                'token' => $request->confirm_token,
            ])
            ->first();
        $vendor = Vendor::where('email', $token->email)
            ->update(['password' => Hash::make($request->password)]);
        //DB::table('password_resets')->where(['email' => $request->email])->delete();

        return $this->message($vendor, 'vendor.login', 'success', 'error');
    }

    public function logout(Request $request)
    {
        Auth::guard('vendor')->logout();
        return redirect()->route('vendor.login')->with($this->data("You've Logout Successfully", "success"));
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
            'phone' => 'required|digits:12',
        ]);
        $vendor = Vendor::findorFail($id);
        $vendor->name = $request->name;
        $vendor->email = $request->email;
        $vendor->phone = $request->phone;
        $vendor->update();
        if ($vendor) {
            return redirect()->back()->with($this->data("Profile Update Successfully", "success"));
        } else {
            return redirect()->back()->with($this->data("Profile Update Error", "error"));
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
                'password' => Hash::make($request->password),
            ])->save();

            return redirect()->route('profile')->with($this->data("Update Password Successfully", 'success'));
        } else {
            return redirect()->back()->with($this->data("Update Password Error", 'error'));
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

            if ($isUser) {
                Auth::login($isUser);
                return redirect('/dashboard');
            } else {
                $createUser = Vendor::create([
                    'name' => $vendor->name,
                    'email' => $vendor->email,
                    'fb_id' => $vendor->id,
                    'password' => encrypt('vendor@123'),
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
            if ($findvendor) {
                Auth::login($findvendor);
                return redirect('/');
            } else {
                $newUser = Vendor::create([
                    'name' => $vendor->name,
                    'email' => $vendor->email,
                    'google_id' => $vendor->id,
                    'password' => encrypt('123456dummy'),
                ]);
                Auth::login($newUser);
                return redirect('/home');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    //accept term and condition
    public function terms(Request $request)
    {
        $vendor = Vendor::find($request->authid)->update(['term_condition' => 1]);
        return response()->json('success');
    }
}

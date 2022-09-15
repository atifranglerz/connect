<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Mail\Login;
use App\Models\User;
use App\Models\Country;
use App\Models\userCompany;
use App\Mail\ForgetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Notifications\ResetPassword;

class AuthController extends Controller
{
    public function register()
    {
        $page_title = 'User Register';

        $data['company'] = User::where('type','company')->get();
        $data['countries'] = Country::all();
        return view('user.auth.register', $data, compact('page_title'));
    }

    public function userRegister(Request $request)
    {
        $request->validate([
            // 'images' => 'required',
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'country' => 'required',
            'city' => 'required',
            'post_box' => 'required',
            'address' => 'required',
            'phone' => 'required|digits:12',
            'password' => 'required|confirmed',
            // 'company' => 'required',
        ]);
        $role = Role::where('name', 'user')->first();
        $user = new User();

        if ($request->file('images')) {
            foreach ($request->file('images') as $image) {
                $name = time() . '.' . $image->getClientOriginalExtension();
                $name = $image->move('public/image/profile/', $name);
                $user['image'] = $name;
            }
        }else{
            $user['image'] = "public/assets/images/avatar.jpg";
        }

        $user->name = $request->name;
        $user->city = $request->city;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->country = $request->country;
        $user->city = $request->city;
        $user->post_box = $request->post_box;
        $user->save();

        $company = User::find($request->company);
        $user->company()->attach($company);

        $user_email = $user->email;
        $data['name'] = $user->name;
        $data['link'] = url('user/login');
        if ($user) {
            $user->assignRole($role);
            Mail::to($user_email)->send(new Login($data));
            return redirect()->route('user.login')->with($this->data("You've Registered Successfully as a Customer!", 'success'));
        } else {
            return redirect()->back()->with($this->data("User Register Error", 'error'));
        }
    }


    public function login()
    {

        $page_title = 'User Login';
        return view('user.auth.login', compact('page_title'));
    }

    public function userLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        if (isset($user) && $user->action == 0) {
            return redirect()->back()->with($this->data("Your Account has been Deactivate by Admin!", 'error'));
        }

        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password, 'type' => 'user'])) {
            $user_role = Auth::guard('web')->user()->hasRole('user');
            if ($user_role) {
                return redirect()->route('user.dashboard')->with($this->data("You've Login Successfully", 'success'));
            }
        }
        return redirect()->back()->with($this->data("User Email Or Password Invalid!", 'error'));

    }

    // ----------------------------------Insuracne Company Login and Registration------------------------------------------------------


    public function companyRegisterForm()
    {
        $page_title = 'Company Register';
        return view('user.auth.company_register', compact('page_title'));
    }

    public function companyRegister(Request $request)
    {
        $request->validate([
        //   'profile_image' =>'required',
            "id_card" =>'required',
            'name' => ['required', 'string', 'max:255'],
            'company_name'=>'required',
            'email' => ['required','string', 'email', 'max:255', 'unique:users'],
            'country'=>['required','string'],
            'city'=> ['required','string'],
            'post_box'=>'required',
            'phone' => 'required|digits:12',
            'image_license'=>'required',
            'trading_license'=>'required',
            'billing_area'=>'required',
            'billing_city'=>'required',
            'billing_address'=>'required',
        ]);
        $role = Role::where('name', 'user')->first();
        $company = new User();

        if ($request->file('profile_image')) {
            $doucments2 = hexdec(uniqid()) . '.' . strtolower($request->file('profile_image')->getClientOriginalExtension());
            $request->file('profile_image')->move('public/image/profile/', $doucments2);
            $file2 = 'public/image/profile/' . $doucments2;
            $company->image = $file2;
        }else{
            $company->image = "public/assets/images/avatar.jpg";

        }
        $company->name = $request->company_name;
        $company->city = $request->city;
        $company->email = $request->email;
        $company->phone = $request->phone;
        $company->password = bcrypt($request->password);
        $company->country = $request->country;
        $company->city = $request->city;
        $company->post_box = $request->post_box;
        $company->type = "company";
        $company->save();

        $userCompany = new userCompany();
        $userCompany->company_id = $company->id;
        $userCompany->owner_name = $request->name;
        $userCompany->billing_area = $request->billing_area;
        $userCompany->billing_city = $request->billing_city;
        $userCompany->billing_address = $request->billing_address;
        $userCompany->trading_license=$request->trading_license;

        if ($request->file('id_card')) {
            $doucments2 = hexdec(uniqid()) . '.' . strtolower($request->file('id_card')->getClientOriginalExtension());
            $request->file('id_card')->move('public/image/profile/', $doucments2);
            $file2 = 'public/image/profile/' . $doucments2;
            $userCompany->id_card = $file2 ;
        }
        if ($request->file('image_license')) {
            $doucments3 = hexdec(uniqid()) . '.' . strtolower($request->file('image_license')->getClientOriginalExtension());
            $request->file('image_license')->move('public/image/profile/', $doucments3);
            $file3 = 'public/image/profile/' . $doucments3;
            $userCompany->image_license= $file3 ;
        }
        $userCompany->save();

        $company_email = $request->email;
        $data['name'] = $request->name;
        $data['link'] = url('user/companyLogin');
        if ($company) {
            $company->assignRole($role);
            Mail::to($company_email)->send(new Login($data));
            return redirect()->route('user.companyLogin')->with($this->data("You've Registered Successfully as an Insurance Company", 'success'));
        } else {
            return redirect()->back()->with($this->data("Company Register Error", 'error'));
        }
    }


    public function companyLoginForm()
    {
        $page_title = 'Company Login';
        return view('user.auth.company_login', compact('page_title'));
    }

    public function companyLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
         $user = User::where('email', $request->email)->first();
        if (isset($user) && $user->action == 0) {
            return redirect()->back()->with($this->data("Your Account has been Deactivate by Admin!", 'error'));
        }

        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password, 'type' => 'company'])) {
            $user_role = Auth::guard('web')->user()->hasRole('user');
            if ($user_role) {
                return redirect()->route('user.dashboard')->with($this->data("You've Login Successfully", 'success'));
            }
        }
        return redirect()->back()->with($this->data("Company Email Or Password Invalid!", 'error'));


    }
    // ---------------------------------- End Insuracne Company Login and Registration------------------------------------------------------


    public function forgetPassword()
    {
        $page_title = 'Forget Password';
        return view('user.auth.forget_password', compact('page_title'));
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users,email',
        ]);
        $vendor = User::where('email', $request->email)->first();
        $data['email'] = $vendor->email;
        $data['token'] = str_random(30);
        $data['url'] = url('user/token_confirm', $data['token']);
        try {
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
                return redirect()->back()->with($this->data("Forget Password Email Send Error.", 'error'));
            }
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
            return view('user.auth.password_change', compact('token'));
        } else {
            return $this->message($token_confirm, 'user.forget_password', 'Token Match Successfully,', 'Token Dose Match Error,');
        }

    }

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
        $user = User::where('email', $token->email)
            ->update(['password' => Hash::make($request->password)]);
        DB::table('password_resets')->where(['email' => $request->email])->delete();


        $user = User::where('email', $token->email)->first();
        if($user->type == "user"){
            return redirect()->route('user.login')->with($this->data("Password Update Successfully", 'success'));
        }else{
            return redirect()->route('user.companyLogin')->with($this->data("Password Update Successfully", 'success'));
        }
    }

    public function logout(Request $request)
    {
        $type = Auth::user()->type;
        $user = Auth::guard('web')->logout();
        if($type == "user"){
            return redirect()->route('user.login')->with($this->data("You've Logout Successfully", 'success'));
        }else{
            return redirect()->route('user.companyLogin')->with($this->data(" You've Logout Successfully", 'success'));
        }

    }

    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $isUser = User::where('social_id', $user->id)->first();

            if ($isUser) {
                Auth::login($isUser);
                return redirect('/dashboard');
            } else {
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'fb_id' => $user->id,
                    'password' => encrypt('user@123'),
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
            $user = Socialite::driver('google')->user();
            $finduser = User::where('social_id', $user->id)->first();
            if ($finduser) {
                Auth::login($finduser);
                return redirect('/');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
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
        $user = User::find($request->authid)->update(['term_condition' => 1]);
        return response()->json('success');
    }
}

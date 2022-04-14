<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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
        $page_title = 'User Register';
        return view('user.auth.register', compact('page_title'));
    }

    public function userRegister(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => 'required',
            'password' => ['required', 'confirmed',],
        ]);
        $role = Role::where('name', 'user')->first();
        $user = new  User();
        $user->name = $request->name;
        $user->city = $request->city;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->country = $request->country;
        $user->city = $request->city;
        $user->post_box = $request->post_box;
        $user->save();
        if ($user) {
            $user->assignRole($role);
            return redirect()->route('user.dashboard')->with($this->data("User Register Successfully", 'success'));
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
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $user_role = Auth::guard('web')->user()->hasRole('user');
            if ($user_role) {
                return redirect()->route('user.dashboard')->with($this->data("Login Error", 'error'));
            }
        }
        return redirect()->back()->with($this->data("User Email Or Password Invalid!", 'error'));

    }

    public function forgetPassword(){
        $page_title = 'Forget Password';
        return view('user.auth.forget_password', compact('page_title'));
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users,email',
        ]);
        $page_title = 'Otp Confirm';
        $user = User::where('email', $request->email)->first();
        $otp = mt_rand(10000, 99999);
        $email = $user->email;
        $details['otp'] = $otp;
        try {
            Mail::to($request->email)->send(new ResetPassword($details));
        } catch(\Swift_TransportException $e){
            if($e->getMessage()) {
                dd($e->getMessage());
            }
        }
        DB::table('password_resets')->insert([
            'email' => $user->email,
            'otp' => $otp,
            'created_at' => Carbon::now()
        ]);
        return view('user.auth.otp', compact('page_title', 'email'));
    }

    public function otpConfirm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'otp' => 'required',
        ]);
        $page_title = 'Update Password';
        $user = User::where('email', $request->email)->first();
        $email = $user->email;
        $otp_confirm = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'otp' => $request->otp
            ])
            ->first();
        if (!$otp_confirm) {
            return redirect()->back()->with('OTP not same!');
        }

        return view('user.auth.password_change', compact('page_title', 'email'));
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
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);
        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);
        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return redirect()->route('user.login')->with('Your Password Update Successfully');
    }

    public function logout(Request $request)
    {
        $user = Auth::guard('web')->logout();
        return $this->message($user, 'user.login', 'User Logout Successfully', 'User Logout Error');
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

            if($isUser){
                Auth::login($isUser);
                return redirect('/dashboard');
            }else{
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'fb_id' => $user->id,
                    'password' => encrypt('user@123')
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
            if($finduser){
                Auth::login($finduser);
                return redirect('/');
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
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

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\ForgetPassword;
use App\Mail\Login;
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
            'image' => 'required' ,
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:vendors'],
            'country'=>['required','alpha'] ,
            'city'=> ['required','alpha'] ,
            'post_box'=>'required',
            'address'=>'required',
            'phone' => 'required',
            'password' => 'required|confirmed',
        ]);
        $role = Role::where('name', 'user')->first();
        $user = new  User();
        if ($request->file('image')) {
            $doucments = hexdec(uniqid()) . '.' . strtolower($request->file('image')->getClientOriginalExtension());
            $request->file('image')->move('public/image/ads/', $doucments);
            $file = 'public/image/ads/' . $doucments;
            $user->image = $file ;
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
        $user_email = $request->email;
        $data['name'] = $request->name ;
        if ($user) {
            $user->assignRole($role);
            Mail::to($user_email)->send(new Login($data));
            return redirect()->route('user.login')->with($this->data("User Register Successfully", 'success'));
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
                return redirect()->route('user.dashboard')->with($this->data("Login Successfully", 'success'));
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
        $vendor = User::where('email', $request->email)->first();
        $data['email'] = $vendor->email;
        $data['token'] = str_random(30);
        $data['url'] = url('user/token_confirm', $data['token']);
        try {
            Mail::to($data['email'])->send(new ForgetPassword($data));
            DB::table('password_resets')->insert([
                'email' => $vendor->email,
                'token' => $data['token'],
                'created_at' => Carbon::now()
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
        $vendor = User::where('email', $token->email)
            ->update(['password' => Hash::make($request->password)]);
        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return $this->message($vendor, 'user.login', 'Password Update Successfully', 'Password Update Error');
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

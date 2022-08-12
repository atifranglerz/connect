<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Mail\Login;
use App\Mail\ForgetPassword;
use App\Models\Country;
use App\Models\InsuranceCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function register()
    {
        $page_title = 'Company Register';
        return view('company.auth.register', compact('page_title'));
    }

    public function companyRegister(Request $request)
    {
        $request->validate([
            'images' => 'required',
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:insurance_companies'],
            'country' => ['required'],
            'city' => ['required'],
            'address' => 'required',
            'phone' => 'required|digits:12',
            'password' => 'required|confirmed',
        ]);
        $role = Role::where('name', 'company')->first();
        $company = new InsuranceCompany();
        if ($request->file('images')) {
            foreach ($request->file('images') as $image) {
                $name = time() . '.' . $image->getClientOriginalExtension();
                $name = $image->move('public/image/profile/', $name);
                $company['image'] = $name;
            }
        }
        $company->name = $request->name;
        $company->city = $request->city;
        $company->email = $request->email;
        $company->phone = $request->phone;
        $company->password = bcrypt($request->password);
        $company->country = $request->country;
        $company->city = $request->city;
        $company->save();
        $company_email = $request->email;
        $data['name'] = $request->name;
        $data['link'] = url('company/login');
        if ($company) {
            $company->assignRole($role);
            Mail::to($company_email)->send(new Login($data));
            return redirect()->route('company.login')->with($this->data("Company Register Successfully", 'success'));
        } else {
            return redirect()->back()->with($this->data("Company Register Error", 'error'));
        }
    }

    public function login()
    {
        $page_title = 'Company Login';
        return view('company.auth.login', compact('page_title'));
    }

    public function companyLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::guard('company')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $company_role = Auth::guard('company')->user()->hasRole('company');
            if ($company_role) {
                return redirect()->route('company.dashboard')->with($this->data("Login Successfully", 'success'));
            }
        }
        return redirect()->back()->with($this->data("Company Email Or Password Invalid!", 'error'));

    }


    public function forgetPassword()
    {
        $page_title = 'Forget Password';
        return view('company.auth.forget_password', compact('page_title'));
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:insurance_companies,email',
        ]);
        $company = InsuranceCompany::where('email', $request->email)->first();
        $data['email'] = $company->email;
        $data['token'] = str_random(30);
        $data['url'] = url('company/token_confirm', $data['token']);
        try {
            Mail::to($data['email'])->send(new ForgetPassword($data));
            DB::table('password_resets')->insert([
                'email' => $company->email,
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
            return view('company.auth.password_change', compact('token'));
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
        $company = InsuranceCompany::where('email', $token->email)
            ->update(['password' => Hash::make($request->password)]);
        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return $this->message($company, 'company.login', 'Password Update Successfully', 'Password Update Error');
    }


    public function logout(Request $request)
    {

        $company = Auth::guard('company')->logout();
        return redirect()->route('company.login')->with($this->data("Your Company Logout Successfully", 'success'));
    }


}

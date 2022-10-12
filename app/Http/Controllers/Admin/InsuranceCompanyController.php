<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Mail\Registration;
use App\Models\userCompany;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class InsuranceCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $company = User::with('roles','insurance')
        //     ->whereHas('roles', function ($q) {
        //         $q->Where('name', 'user');
        //     })->where('type', 'company')
        //     ->get();
        $company=User::with('roles','insurance')->where('type','company')->get();
        $page_title = 'Insurance Company';
        return view('admin.insuranceCompany.index', compact('company', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users'],
            'phone' => 'required',
            'owner_name'=>'required',
            'trading_license'=>'required',
            'billing_area'=>'required',
            'billing_city'=>'required',
            'billing_address'=>'required',
        ]);
        // $role = Role::where('name', 'company')->first();
        $company = new User();
        $company->name = $request->name;
        $company->email = $request->email;
        $company->phone = $request->phone;
        $company->address = $request->address;
        $company->post_box = $request->post_box;
        $company->city = $request->city;
        $company->type='company';
        if ($request->file('image')) {
            $doucments1 = hexdec(uniqid()) . '.' . strtolower($request->file('image')->getClientOriginalExtension());
            $request->file('image')->move('public/image/profile/', $doucments1);
            $file1 = 'public/image/profile/' . $doucments1;
            $company->image = $file1;
        }else{
            $company->image = "public/assets/images/1744022049828589.jpg";
        }
        $company->save();
        $user_company=new userCompany();
        if ($request->file('id_card')) {
            $images = [];
            foreach ($request->file('id_card') as $data) {
                $image = hexdec(uniqid()) . '.' . strtolower($data->getClientOriginalExtension());
                $data->move('public/image/profile/', $image);
                $images[] = 'public/image/profile/' . $image;
            }
            $user_company->id_card = implode(",", $images);
        }
        if ($request->file('image_license')) {
            $images = [];
            foreach ($request->file('image_license') as $data) {
                $image = hexdec(uniqid()) . '.' . strtolower($data->getClientOriginalExtension());
                $data->move('public/image/profile/', $image);
                $images[] = 'public/image/profile/' . $image;
            }
            $user_company->image_license = implode(",", $images);
        }
        $user_company->owner_name=$request->owner_name;
        $user_company->trading_license=$request->trading_license;
        $user_company->billing_area=$request->billing_area;
        $user_company->billing_city=$request->billing_city;
        $user_company->billing_address=$request->billing_address;
        $user_company->company_id=$company->id;
        $user_company->save();
        $company_email = $request->email;
        $data->name = $company->name;
        $data->email = $company->email;
        $data->type = $company->type;
        $data->id = $company->id;
        // $data->link = url('company/login');
        if ($company) {
            // $company->assignRole($role);
            Mail::to($company_email)->send(new Registration($data));

            $_SESSION["msg"] = "You've Registered Successfully as a Vendor!";
            $_SESSION["alert"] = "success";
            return $this->message($company, 'admin.insurance-company', 'Company added Successfully', 'Company Update Error');
        } else {
            return redirect()->back()->with($this->data("Company Register Error", 'error'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('admin.insuranceCompany.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = User::with('insurance')->findOrFail($id);
        $page_title = 'company';
        return view('admin.insuranceCompany.edit', compact('company', 'page_title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            //'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => 'required',
            'owner_name'=>'required',
            'trading_license'=>'required',
            'billing_area'=>'required',
            'billing_city'=>'required',
            'billing_address'=>'required',
        ]);
        $company = User::findOrFail($id);
        $company->name = $request->name;
        //$user->email = $request->email;
        $company->phone = $request->phone;
        $company->address = $request->address;
        $company->post_box = $request->post_box;
        $company->city = $request->city;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move(public_path('images'), $filename);
            $company['image'] = 'public/images/' . $filename;
        }
        $company->save();
        $user_company=userCompany::where('company_id',$company->id)->first();
        if ($request->file('id_card')) {
            $images = [];
            foreach ($request->file('id_card') as $data) {
                $image = hexdec(uniqid()) . '.' . strtolower($data->getClientOriginalExtension());
                $data->move('public/image/profile/', $image);
                $images[] = 'public/image/profile/' . $image;
            }
            $user_company->id_card = implode(",", $images);
        }
        if ($request->file('image_license')) {
            $images = [];
            foreach ($request->file('image_license') as $data) {
                $image = hexdec(uniqid()) . '.' . strtolower($data->getClientOriginalExtension());
                $data->move('public/image/profile/', $image);
                $images[] = 'public/image/profile/' . $image;
            }
            $user_company->image_license = implode(",", $images);
        }
        $user_company->owner_name=$request->owner_name;
        $user_company->trading_license=$request->trading_license;
        $user_company->billing_area=$request->billing_area;
        $user_company->billing_city=$request->billing_city;
        $user_company->billing_address=$request->billing_address;
        $user_company->save();
        return $this->message($company, 'admin.insurance-company', 'Company Update Successfully', 'Company Update Error');
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $company = User::findOrFail($id);
        if (Hash::check($request->old_password, $company->password)) {
            $company->password = bcrypt($request->password);
            $company->save();

            return redirect()->route('admin.insurance-company')->with($this->data("Update Insurance Company Password Successfully", 'success'));
        } else {
            return redirect()->back()->with($this->data("Update Insurance Company Password Error", 'error'));
        }
    }

    public function activate($id)
    {
        $company = User::findOrFail($id);
        if ($company->action == 0) {
            $company->fill([
                'action' => 1,
            ])->save();
            return redirect()->route('admin.insurance-company')->with($this->data("Insurance Company Activate Successfully", 'success'));
        } else {
            return redirect()->back()->with($this->data("Insurance Company Activate Error", 'error'));
        }
    }

    public function deactivate($id)
    {
        $company = User::findOrFail($id);
        if ($company->action == 1) {
            $company->fill([
                'action' => 0,
            ])->save();
            return redirect()->route('admin.insurance-company')->with($this->data("Insurance Company DeActivate Successfully", 'success'));
        } else {
            return redirect()->back()->with($this->data("Insurance Company DeActivate Error", 'error'));
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $company = User::findOrFail($id);
        $company->delete();
        return $this->message($company, 'admin.insurance-company', 'Insurance Company Deleted successfully', 'Insurance Company Delete Error');
    }
}

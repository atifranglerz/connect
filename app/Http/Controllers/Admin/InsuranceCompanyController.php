<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InsuranceCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = User::with('roles')
            ->whereHas('roles', function ($q) {
                $q->Where('name', 'user');
            })->where('type', 'company')
            ->get();
        $page_title = 'Insurance Company';
        return view('admin.insuranceCompany.index', compact('company', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = User::findOrFail($id);
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
        ]);
        $company = User::findOrFail($id);
        $company->name = $request->name;
        //$company->email = $request->email;
        $company->phone = $request->phone;
        $company->save();
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

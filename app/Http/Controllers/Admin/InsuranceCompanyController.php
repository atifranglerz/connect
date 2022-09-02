<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\InsuranceCompany;
use App\Http\Controllers\Controller;
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
        $company = InsuranceCompany::with('roles')
            ->whereHas('roles', function ($q) {
                $q->Where('name', 'company');
            })
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
        $company = InsuranceCompany::findOrFail($id);
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
        $company = InsuranceCompany::findOrFail($id);
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
        $company = InsuranceCompany::findOrFail($id);
        if ($company->hasRole('company')) {
            if (Hash::check($request->old_password, $company->password)) {
                $company->password = bcrypt($request->password);
                $company->save();

                return redirect()->route('admin.insurance-company')->with($this->data("Update Insurance Company Password Successfully", 'success'));
            } else {
                return redirect()->back()->with($this->data("Update Insurance Company Password Error", 'error'));
            }
        } else {
            return redirect()->back()->with($this->data('You do not have the required authorization!', 'error'));
        }

    }

    public function activate($id)
    {
        $company = InsuranceCompany::findOrFail($id);
        if ($company->hasRole('company')) {
            if ($company->action == 0) {
                $company->fill([
                    'action' => 1,
                ])->save();
                return redirect()->route('admin.insurance-company')->with($this->data("Insurance Company Activate Successfully", 'success'));
            } else {
                return redirect()->back()->with($this->data("Insurance Company Activate Error", 'error'));
            }
        } else {
            return redirect()->back()->with($this->data('You do not have the required authorization!', 'error'));
        }
    }

    public function deactivate($id)
    {
        $company = InsuranceCompany::findOrFail($id);
        if ($company->hasRole('company')) {
            if ($company->action == 1) {
                $company->fill([
                    'action' => 0,
                ])->save();
                return redirect()->route('admin.insurance-company')->with($this->data("Insurance Company DeActivate Successfully", 'success'));
            } else {
                return redirect()->back()->with($this->data("Insurance Company DeActivate Error", 'error'));
            }
        } else {
            return redirect()->back()->with($this->data('You do not have the required authorization!', 'error'));
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
        $company = InsuranceCompany::findOrFail($id);
        if ($company->hasRole('company')) {

            $company->delete();
            return $this->message($company, 'admin.insurance-company', 'Insurance Company Deleted successfully', 'Insurance Company Delete Error');
        } else {
            return redirect()->back()->with($this->data('You do not have the required authorization!', 'error'));
        }
    }
}

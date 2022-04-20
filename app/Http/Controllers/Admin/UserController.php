<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $users = User::with('roles')
            ->whereHas('roles', function ($q) {
                $q->Where('name', 'user');
            })
            ->get();
        $page_title = 'Customer';
        return view("admin.user.index", compact('users', 'page_title'));
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $page_title = 'Edit Customer';
        return view('admin.user.edit', compact('user', 'page_title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            //'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => 'required',
        ]);
        $user = User::findOrFail($id);
        $user->name = $request->name;
        //$user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();
        return $this->message($user, 'admin.user.index', 'User Update Successfully', 'User Update Error');
    }


    public function updatePassword(Request $request, $id) {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $user = User::findOrFail($id);
        if (Hash::check($request->old_password, $user->password)) {
            $user->fill([
                'password' => Hash::make($request->new_password)
            ])->save();

            return redirect()->route('admin.user.index')->with($this->data("Update User Password Successfully", 'success'));
        } else {
            return redirect()->back()->with($this->data("Update User Password Error", 'error'));
        }
    }

    public function activate($id) {
        $user = User::findOrFail($id);
        if($user->action == 0){
            $user->fill([
                'action' => 1
            ])->save();
            return redirect()->route('admin.user.index')->with($this->data("User Activate Successfully", 'success'));
        } else {
            return redirect()->back()->with($this->data("User Activate Error", 'error'));
        }
    }

    public function deactivate($id) {
        $user = User::findOrFail($id);
        if($user->action == 1){
            $user->fill([
                'action' => 0
            ])->save();
            return redirect()->route('admin.user.index')->with($this->data("User DeActivate Successfully", 'success'));
        } else {
            return redirect()->back()->with($this->data("User DeActivate Error", 'error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return $this->message($user, 'admin.user.index', 'User Delete Successfully', 'User Delete Error');
    }
}

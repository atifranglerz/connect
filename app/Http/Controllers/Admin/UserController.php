<?php

namespace App\Http\Controllers\Admin;

use App\Mail\Login;
use App\Models\User;
use App\Mail\Rejection;
use App\Mail\Registration;
use App\Mail\AccountStatus;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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
            })->where('type', 'user')
            ->get();
        $page_title = 'Customer';
        return view("admin.user.index", compact('users', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            // 'images' => 'required',
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'country' => 'required',
            'city' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);
        $role = Role::where('name', 'user')->first();
        $user = new User();
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move(public_path('images'), $filename);
            $user['image'] = 'public/images/' . $filename;
        } else {
            $user['image'] = "public/assets/images/1744022049828589.jpg";
        }
        $user->name = $request->name;
        $user->city = $request->city;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->type = 'user';
        $user->save();
        $company = User::find($request->company);
        $user->company()->attach($company);
        $user_email = $user->email;
        $data['name'] = $user->name;
        $data['email'] = $user->email;
        $data['type'] = $user->type;
        $data['id'] = $user->id;
        $data['link'] = url('user/login');
        if ($user) {
            $user->assignRole($role);
            Mail::to($user_email)->send(new Registration($data));
            $_SESSION["msg"] = "You've Registered Successfully as a Customer!";
            $_SESSION["alert"] = "success";
            return redirect()->route('admin.user.index');
        } else {
            return redirect()->back()->with($this->data("User Register Error", 'error'));
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
        $company = User::where('type', 'company')->get();
        return view('admin.user.create', compact('company'));
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
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
        ]);
        $user = User::findOrFail($id);
        $user->name = $request->name;
        //$user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->city = $request->city;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move(public_path('images'), $filename);
            $user['image'] = 'public/images/' . $filename;
        }
        $user->save();
        return $this->message($user, 'admin.user.index', 'User Update Successfully', 'User Update Error');
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $user = User::findOrFail($id);
        if (Hash::check($request->old_password, $user->password)) {
            $user->password = bcrypt($request->password);
            $user->save();

            return redirect()->route('admin.user.index')->with($this->data("Update User Password Successfully", 'success'));
        } else {
            return redirect()->back()->with($this->data("Update User Password Error", 'error'));
        }
    }

    public function activate($id)
    {
        $user = User::findOrFail($id);
        if ($user->action == 0) {
            $user->fill([
                'action' => 1,
            ])->save();
            $data['reason'] = 'Congratulation! Your account is activated.';
            Mail::to($user->email)->send(new AccountStatus($data));
            return redirect()->route('admin.user.index')->with($this->data("User Activate Successfully", 'success'));
        } else {
            return redirect()->back()->with($this->data("User Activate Error", 'error'));
        }
    }

    public function deactivate(Request $request)
    {
        $user = User::find($request->user_id);
        if ($user->action == 1) {
            $user->fill([
                'action' => 0,
            ])->save();

            $data['reason'] = $request->comment_val;
            Mail::to($user->email)->send(new AccountStatus($data));
            return response()->json([
                'success' => 'Rejection Message send successfully',
            ]);
            //     return redirect()->route('admin.user.index')->with($this->data("User DeActivate Successfully", 'success'));
            // } else {
            //     return redirect()->back()->with($this->data("User DeActivate Error", 'error'));
        } else {
            return response()->json([
                'success' => 'Not Found',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return $this->message($user, 'admin.user.index', 'User Delete Successfully', 'User Delete Error');
    }
}

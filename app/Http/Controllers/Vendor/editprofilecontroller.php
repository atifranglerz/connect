<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class editprofilecontroller extends Controller
{
    public  function edit()
    {
        return view('vendor.edit_profile');
    }
}

<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Bids_detailController extends Controller
{
    public function index ()
    {
        return view('vendor.bids_detail');
    }
}

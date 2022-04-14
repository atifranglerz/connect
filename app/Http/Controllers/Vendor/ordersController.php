<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ordersController extends Controller
{
    public function index()
    {
        return view('vendor.orders');
    }
    public function fullfillment ()
    {
        return view('vendor.fullfillment');
    }
    public function active_order ()
    {
        return view('vendor.orderindex');
    }
    public function create ()
    {
        return view('vendor.create_ads');
    }
}

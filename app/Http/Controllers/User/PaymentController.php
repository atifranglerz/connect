<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index ()
    {
        $page_title = "payment";
        return view('user.payment.payment',compact('page_title'));
    }
    public function store ()
    {

    }
}

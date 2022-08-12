<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Order;
use App\Models\UserBid;
use App\Models\VendorBid;
use App\Models\TermCondition;
use App\Models\PrivacyPolicy;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index(){

        $page_title = 'Dashboard';
 
        $data['terms'] =  PrivacyPolicy::first();
        $data['policy'] = TermCondition::first();

        return view('company.index', compact('data','page_title'));


    }
}

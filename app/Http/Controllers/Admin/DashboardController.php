<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $page_title = 'Admin Dashboard';
        $dateFrom = Carbon::now()->subDays(30);
        $dateTo = Carbon::now();
        //monthlyRevenue = PaymentTransactions::whereNotNull('created_at')->whereBetween('created_at', [$dateFrom, $dateTo])->sum('amount');
        $monthlyRevenue = 0;
        $monthlyAdmin = Admin::whereHas('roles', function ($q) {
            $q->where('name', 'admin');
        })->whereNotNull('created_at')->whereBetween('created_at', [$dateFrom, $dateTo])->count();
        //$monthlyOrder = packageSubscription::whereNotNull('created_at')->whereBetween('created_at', [$dateFrom, $dateTo])->count();
        $monthlyOrder = 0;

        $previousDateFrom = Carbon::now()->subDays(60);
        $previousDateTo = Carbon::now()->subDays(31);
        //$previousMonthlyRevenue = PaymentTransactions::whereNotNull('created_at')->whereBetween('created_at', [$previousDateFrom, $previousDateTo])->sum('amount');
        $previousMonthlyRevenue = 0;
        $previousMonthlyAdmin = Admin::whereHas('roles', function ($q) {
            $q->where('name', 'admin');
        })->whereNotNull('created_at')->whereBetween('created_at', [$previousDateFrom, $previousDateTo])->count();
        $previousMonthlyOrder = Admin::whereNotNull('created_at')->whereBetween('created_at', [$previousDateFrom, $previousDateTo])->count();

        // Revenue  //
        /*if ($previousMonthlyRevenue > 0 && $monthlyRevenue > 0) {
            if ($previousMonthlyRevenue < $monthlyRevenue) {
                if ($previousMonthlyRevenue > 0) {
                    $percent_from = $monthlyRevenue - $previousMonthlyRevenue;
                    $percentRevenue = $percent_from / $previousMonthlyRevenue * 100; //increase percent
                } else {
                    $percentRevenue = 100; //increase percent
                }
            } else {
                $percent_from = $previousMonthlyRevenue - $monthlyRevenue;
                $percentRevenue = $percent_from / $previousMonthlyRevenue * 100; //decrease percent
            }
        } else {
            $percent_from = 0;
            $percentRevenue = 100;
        }*/

        // Admin  //

        return view('admin.index', compact('page_title', 'monthlyRevenue', 'previousMonthlyRevenue', 'monthlyAdmin', 'previousMonthlyAdmin', 'monthlyOrder', 'previousMonthlyOrder'));
    }
}

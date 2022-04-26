<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserBid;
use App\Models\User ;
use App\Models\ModelYear ;
use App\Models\Company ;

class QuotesController extends Controller
{
    public function index()
    {
        $page_title = 'index ';
        $data = UserBid::all();
        return view('vendor.quotes.index', compact('page_title' ,'data'));
    }
    public function quotedetail ($id)
    {
        $page_title = 'quote detail ';
        $data = UserBid::with('user','company','model')->findOrFail($id);
        return view('vendor.quotes.detail', compact('page_title' , 'data'));
    }
    public function bidresponse (Request $request)
    {
        dd($request);
    }
}

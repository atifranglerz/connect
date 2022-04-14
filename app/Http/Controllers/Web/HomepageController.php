<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        return view('web/index') ;
    }
    public function carService()
    {
        $page_title = 'carservice Page';
        return view('web.car_service', compact('page_title'));
    }
    public function register()
    {
        $page_title = 'Register Page';
        return view('web.register', compact('page_title'));
    }
    public function usedcars()
    {
        $page_title = 'used cars';
        return view('web.used_cars', compact('page_title'));
    }
    public function allvendor()
    {
        $page_title = 'used cars';
        return view('web.vendorlist', compact('page_title'));
    }
    public function news()
    {
        $page_title = 'latest news';
        return view('web.news', compact('page_title'));
    }
    public function faqnews()
    {
        $page_title = 'faq';
        return view('web.faq', compact('page_title'));
    }
    public function forget_pass()
    {
        $page_title = 'forget password';
        return view('web.forgetpassword', compact('page_title'));
    }
}

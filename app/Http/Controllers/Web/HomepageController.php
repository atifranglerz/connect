<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Admin\PrivacyPolicyController;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Category;
use App\Models\PrivacyPolicy;
use App\Models\TermCondition;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $page_title = "home" ;
        $data = category::all();
        return view('web/index' , compact('page_title','data')) ;
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
    public function term()
    {
        $page_title = 'Terms And Conditions';
        $term = TermCondition::firstorFail();
        return view('web.term', compact('page_title', 'term'));
    }
    public function privacyPolicy()
    {
        $page_title = 'Privacy Policy';
        $privacyPolicy = PrivacyPolicy::firstorFail();
        return view('web.privacyPolicy', compact('page_title', 'privacyPolicy'));
    }
    public function loginchoice ()
    {
        $page_title = 'login choice';
        return view('web.loginpage', compact('page_title'));
    }
    public function about()
    {
        $page_title = 'about';
        $about = About::firstorFail();
        return view('web.about', compact('page_title','about'));
    }
}

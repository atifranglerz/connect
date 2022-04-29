<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Admin\PrivacyPolicyController;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Ads;
use App\Models\Category;
use App\Models\Garage;
use App\Models\GarageCategory;
use App\Models\News;
use App\Models\PrivacyPolicy;
use App\Models\TermCondition;
use App\Models\Vendor;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $data['page_title']  = "home" ;
        $data['services'] = Category::limit(8)->latest()->get();
        $data['news'] = News::limit(8)->latest()->get();
        $data['ads'] = Ads::limit(8)->latest()->get();
        $data['garage'] = Garage::limit(8)->latest()->get();

        return view('web/index' ,$data) ;
    }
    public function carService()
    {
        $data['page_title']  = "carservice Page" ;
        $data['services'] = Category::all();
        return view('web.car_service', $data);
    }

    public function vendorsByService($id)
    {
        $data['page_title']  = 'vendors by service';
        $garage_category = GarageCategory::where('category_id',$id)->distinct()->pluck('garage_id');
        $data['garages'] = Garage::whereIn('id',$garage_category)->get();

        return view('web.vendorlistbyservice', $data);
    }

    public function allvendor()
    {
        $data['page_title']  = 'vendors list';
        $data['garages'] = Garage::all();
        return view('web.vendorlist', $data);
    }

    public function vendorDetails($id)
    {
        $data['page_title']  = 'vendor detail';
        $data['garage'] = Garage::find($id);
        return view('web.gerage_detail', $data);
    }

    public function serviceDetail($id)
    {
        $data['page_title']  = "Service Detail Page" ;
        $data['services'] = Category::find($id);
        return view('web.car_service', $data);
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

    public function news()
    {
        $data['page_title'] = 'latest news';
        $data['news'] = News::all();
        return view('web.news', $data);
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

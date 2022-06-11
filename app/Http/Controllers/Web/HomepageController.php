<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Admin\PrivacyPolicyController;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Ads;
use App\Models\Category;
use App\Models\ContactVendor;
use App\Models\Garage;
use App\Models\GarageCategory;
use App\Models\News;
use App\Models\PrefferedGarage;
use App\Models\PrivacyPolicy;
use App\Models\Slider;
use App\Models\TermCondition;
use App\Models\UserReview;
use App\Models\Vendor;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $data['page_title']  = "home" ;
        $data['services'] = Category::limit(8)->latest()->get();
        $data['news'] = News::limit(4)->latest()->get();
        $data['ads'] = Ads::limit(8)->latest()->get();
        $data['garage'] = Garage::limit(8)->latest()->get();
        $data['slider']=Slider::all();

        return view('web/index' ,$data) ;
    }
    public function carService()
    {
        $data['page_title']  = "carservice Page" ;
        $data['services'] = Category::latest()->get();

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
        $data['services'] = Category::all();
        $data['user_wishlist'] = \App\Models\UserWishlist::where('user_id',auth()->id())->where('garage_id',$data['garage']->id)->first();
        $data['user_review'] = \App\Models\UserReview::where('garage_id',$data['garage']->id)->get();
        $totalReviews = UserReview::where('garage_id',$data['garage']->id)->count();
        $rating= UserReview::where('garage_id',$data['garage']->id)->sum('rating');
        if($totalReviews ==0 && $rating ==0)
        {
            $data['overAllRatings'] = 0;
        }else{
            $data['overAllRatings'] = $rating/$totalReviews;
        }
        return view('web.gerage_detail', $data);
    }

    public function contactVendor(Request $request)
    {
        $request->validate([
            'car_model' => 'required',
            'car_make' =>'required',
            'category' =>'required',
            'customer_name'=>'required',
            'email'=>'required',
            'contact_no'=>'required',
            'detail'=>'required',
        ]);
        $contact_vendors = new ContactVendor();
        $contact_vendors->car_model = $request->car_model;
        $contact_vendors->car_make = $request->car_make;
        $contact_vendors->category = $request->category;
        $contact_vendors->customer_name = $request->customer_name;
        $contact_vendors->email = $request->email;
        $contact_vendors->contact_no = $request->contact_no;
        $contact_vendors->detail = $request->detail;
        $contact_vendors->save();
        return redirect()->back()->with('alert-success', 'Contacted Vendor successfully');;
    }

    public function addToPrefferedGarage(Request $request)
    {
        $preferredgarageexist = \App\Models\UserWishlist::where('user_id',$request->user_id)->where('garage_id',$request->garage_id)->first();
        if($preferredgarageexist) {
            $preferredgarageexist->delete();
            return redirect()->back()->with('alert-garage-success', 'Removed from Preffered Successfully');
        }else{
            $preferred_garage = new \App\Models\UserWishlist();
            $preferred_garage->user_id = $request->user_id;
            $preferred_garage->garage_id = $request->garage_id;
            $preferred_garage->save();
            return redirect()->back()->with('alert-garage-success', 'Added To Preffered Successfully');
        }
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
        $data['page_title']  = 'used cars';
        $data['ads'] = Ads::all();

        return view('web.used_cars', $data);
    }

    public function carDetail($id)
    {
        $data['page_title']  = 'used car';
        $data['ad'] = Ads::find($id);

        return view('web.car_detail', $data);
    }

    public function searchService(Request $request)
    {
        $search = $request->query('keywords');
        $category = $request->query('category');
        $garage_category = GarageCategory::where('category_id',$category)->pluck('garage_id');

        if ($garage_category){
            $data['garages'] = Garage::where(function ($q) use ($search){
                $q->where('garage_name','Like','%'.$search.'%');
            })->whereIn('id',$garage_category)->distinct()->get();
            return view('web.vendorlistbyservice', $data);
        }else{
            $data['garages'] = Garage::where(function ($q) use ($search){
                $q->where('garage_name','Like','%'.$search.'%');
            })->get();

            return view('web.vendorlistbyservice', $data);
        }
    }

    public function news()
    {
        $data['page_title'] = 'latest news';
        $data['news'] = News::all();
        return view('web.news', $data);
    }

    public function newsDetail($id)
    {
        $data['page_title'] = 'latest news';
        $data['news'] = News::find($id);
        return view('web.news_detail', $data);
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

<?php

use App\Http\Controllers\Admin\SliderController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('about', 'Admin\AboutController@show');
Route::group(['namespace' => 'Web'], function () {

    Route::get('/config_cache', function () {
        Artisan::call('config:cache');
        return 'Configuration cache cleared!';
    });
    Route::get('/cache_clear', function () {
        Artisan::call('cache:clear');
        return 'Application cache cleared!';
    });
    Route::get('/view_clear', function () {
        Artisan::call('view:clear');
        return 'Application cache cleared!';
    });
    Route::get('/optimize_clear', function () {
        Artisan::call('optimize:clear');
        return 'Application cache cleared!';
    });
    Route::get('/queue_listen', function () {
        Artisan::call('queue:listen');
        return 'Application queue listen success!';
    });
    Route::get('/queue_work', function () {
        Artisan::call('queue:work');
        return 'Application queue work success';
    });

    Route::get('language', 'HomepageController@language');
    Route::get('/', 'HomepageController@index')->name('home');
    Route::get('category-garage', 'HomepageController@categoryGarage');
    Route::get('register', 'HomepageController@register')->name('register');
    Route::get('loginpage', 'HomepageController@loginchoice')->name('loginpage');
    Route::get('used_cars', 'HomepageController@usedcars')->name('used_cars');
    Route::post('search-used-car', 'HomepageController@searchCar')->name('search-used-car');
    Route::get('car-detail/{id}', 'HomepageController@carDetail')->name('car_detail');
    Route::get('car_service', 'HomepageController@carService')->name('car_service');
    Route::get('vendors-by-service/{id}', 'HomepageController@vendorsByService')->name('vendors-by-service');
    Route::get('service-detail/{id}', 'HomepageController@serviceDetail')->name('service-detail');
    Route::get('gerage-detail/{id}', 'HomepageController@vendorDetails')->name('gerage_detail');
    Route::post('contact-vendor', 'HomepageController@contactVendor')->name('contact-vendor');
    Route::post('add-to-preffered-garage', 'HomepageController@addToPrefferedGarage')->name('add-to-preffered-garage');
    Route::get('vendorlist', 'HomepageController@allvendor')->name('vendorlist');
    Route::get('search_service', 'HomepageController@searchService')->name('search_service');
    Route::get('service-garage', 'HomepageController@serviceGarage')->name('service-garage');
    Route::get('search-garage', 'HomepageController@searchGarage')->name('search-garage');
    Route::get('news', 'HomepageController@news')->name('news');
    Route::get('faq', 'HomepageController@faqnews')->name('faq');
    Route::get('news_detail/{id}', 'HomepageController@newsDetail')->name('news_detail');
    Route::get('home', 'HomepageController@index')->name('home');
    Route::get('term_condition', 'HomepageController@term')->name('term');
    Route::get('about', 'HomepageController@about')->name('about');
    Route::get('privacy_policy', 'HomepageController@privacyPolicy')->name('privacy_policy');

});
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {
    Route::get('/', function () {
        return view('admin.auth.login');
    })->name('admin.login');
    /* Admin Login Or Register Form */
    Route::get('login', 'AuthController@login')->name('login');
    Route::get('register', 'AuthController@register')->name('register');
    Route::post('login', 'AuthController@adminLogin')->name('login');
    Route::post('register', 'AuthController@adminRegister')->name('register');
    /*Forgot Password*/
    Route::get('forget_password', 'AuthController@forgetPassword')->name('forget_password');
    Route::post('reset-password', 'AuthController@resetPassword')->name('reset_password');
    Route::get('otp', 'AuthController@otp')->name('otp');
    Route::post('otp_confirm', 'AuthController@otpConfirm')->name('otp_confirm');
    Route::post('password_change', 'AuthController@submitResetPassword')->name('password_change');
    /* Admin Auth Routes */
    Route::group(['middleware' => ['auth:admin', 'role:admin']], function () {
        /* Dashboard */
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
        /* Update Profile */
        Route::get('profile', 'AuthController@profile')->name('profile');
        Route::post('update-profile/{id}', 'AuthController@updateProfile')->name('profile.update');
        Route::post('update-profile-password/{id}', 'AuthController@updatePassword')->name('profile.updatePassword');
        /* Logout */
        Route::post('logout', 'AuthController@logout')->name('logout');
        /* All User Route */
        Route::get('users/activate/{user}', 'UserController@activate')->name('user.activate');
        Route::get('users/deactivate/{user}', 'UserController@deactivate')->name('user.deactivate');
        //Route::get('get/user/permission/{role}', 'UserController@getRole');
        Route::post('users/updatePassword/{user}', 'UserController@updatePassword')->name('user.updatePassword');
        Route::resource('user', 'UserController')->except('create', 'store', 'show');
        /* All Vendor Route */
        Route::get('vendor/activate/{vendor}', 'VendorController@activate')->name('vendor.activate');
        Route::get('vendor/deactivate/{vendor}', 'VendorController@deactivate')->name('vendor.deactivate');
        //Route::get('get/vendor/permission/{role}', 'VendorController@getRole');
        Route::post('vendor/updatePassword/{vendor}', 'VendorController@updatePassword')->name('vendor.updatePassword');
        Route::resource('vendor', 'VendorController')->except('create', 'store', 'show');
        /* All Category & SubCategory Route */
        Route::resource('category', 'CategoryController');
        /* Category set orders */
        Route::post('category/order', 'CategoryController@orderUpdate')->name('cat_order.update');
        Route::resource('subcategory', 'SubCategoryController');
        Route::resource('childcategory', 'ChildCategoryController');
        Route::resource('brand', 'BrandController');
        Route::resource('model', 'ModelController');
        Route::resource('model_year', 'ModelYearController');
        Route::resource('company', 'CompanyController');
        Route::resource('garage', 'GarageController');
        Route::resource('order', 'OrderController');
        Route::resource('news', 'NewsController');
        /* slider */
        Route::get('slider', [SliderController::class, 'index']);
        Route::post('slider', [SliderController::class, 'store']);
        Route::get('slider/edit/{id}', [SliderController::class, 'edit']);
        Route::post('slider/update/{id}', [SliderController::class, 'update']);
        Route::any('slider/destroy/{id}', [SliderController::class, 'destroy']);

        /* All About Route */
        Route::get('about', 'AboutController@index')->name('about.index');
        Route::get('about/edit/{id}', 'AboutController@edit')->name('about.edit');
        Route::post('about/update/{id}', 'AboutController@update')->name('about.update');
        /* All Contact Route */
        Route::get('contact', 'ContactController@index')->name('contact.index');
        Route::get('contact/edit/{id}', 'ContactController@edit')->name('contact.edit');
        Route::post('contact/update/{id}', 'ContactController@update')->name('contact.update');
        /* All Term & Condition */
        Route::get('term&condition', 'TermConditionController@index')->name('term.index');
        Route::get('term&condition/edit/{id}', 'TermConditionController@edit')->name('term.edit');
        Route::post('term&condition/update/{id}', 'TermConditionController@update')->name('term.update');
        /* All Privacy Policy */
        Route::get('privacyPolicy', 'PrivacyPolicyController@index')->name('privacyPolicy.index');
        Route::get('privacyPolicy/edit/{id}', 'PrivacyPolicyController@edit')->name('privacyPolicy.edit');
        Route::post('privacyPolicy/update/{id}', 'PrivacyPolicyController@update')->name('privacyPolicy.update');
    });
});

Route::group(['prefix' => 'vendor', 'namespace' => 'Vendor', 'as' => 'vendor.'], function () {
    /*Admin Login Or Register Form*/
    Route::get('login', 'AuthController@login');
    Route::get('register', 'AuthController@register');
    Route::get('register_garage_view', 'GarageController@registerGarage')->name('register_garage_view');
    Route::post('login', 'AuthController@vendorLogin')->name('login');
    Route::post('register', 'AuthController@vendorRegister')->name('register');
    Route::post('terms_condition', 'AuthController@terms')->name('terms_condition');
    //Route::post('create_ads/index','AdsController@store')->name('create_ads/index');

    /*Route::get('facebook', 'AuthController@facebookRedirect')->name('facebook');
    Route::get('facebook/callback', 'AuthController@loginWithFacebook');
    Route::get('google', 'AuthController@redirectToGoogle')->name('google');
    Route::get('google/callback', 'AuthController@handleGoogleCallback');*/
    Route::get('forget_password', 'AuthController@forgetPassword')->name('forget_password');
    Route::post('reset-password', 'AuthController@resetPassword')->name('reset_password');
    Route::get('password_change', 'AuthController@password_change');
    Route::get('token_confirm/{token}', 'AuthController@tokenConfirm')->name('token_confirm');
    Route::post('password_change', 'AuthController@submitResetPassword')->name('password_change');
    /*Vendor Auth Routes*/
    Route::group(['middleware' => ['auth:vendor', 'role:vendor']], function () {
        Route::get('term_condition', 'TermConditionController@index')->name('term_condition');
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
        //chatting
        Route::get('chat/index', 'ChatController@index')->name('chat.index');
        Route::get('chat/{id}', 'ChatController@chat')->name('chat');
        Route::post('chat/favorite', 'ChatController@favorite')->name('chat.favorite');
        Route::post('chat/chatSend', 'ChatController@store')->name('chatSend');
        Route::post('chat/delete', 'ChatController@delete')->name('chat.delete');
        Route::post('chat/alldelete', 'ChatController@alldelete')->name('chat.all_delete');
        Route::post('chat/chatted_delete', 'ChatController@chattedDelete')->name('chat.chatted_delete');
        Route::post('chat/online/status', 'ChatController@status')->name('online.status');
        Route::post('chat/chatted/status', 'ChatController@chatted')->name('chatted.status');

        //notification
        Route::post('notification', 'NotificationController@notification')->name('notification');
        Route::post('status/notification', 'NotificationController@status')->name('status.notification');

        Route::get('orders', 'ordersController@index')->name('orders');
        Route::get('create/order', 'ordersController@create');
        Route::get('fullfillment/{id}', 'ordersController@fullfillment')->name('fullfillment');
        Route::get('order/all-active', 'ordersController@order_all')->name('all-active-order');
        Route::get('order/index', 'ordersController@active_order')->name('order/index');
        Route::post('queryChat/', 'ordersController@queryChat')->name('queryChat');
        Route::get('addfund/{id}', 'ordersController@addfund')->name('addfund');
        Route::post('finalFund', 'ordersController@finalFund')->name('finalFund');
        Route::post('completeInovoice', 'ordersController@completeInovoice')->name('completeInovoice');
        Route::get('print-order-details/{id}', 'ordersController@printOrderDetails')->name('print-order-details');

        Route::get('quoteindex', 'QuotesController@index')->name('quoteindex');
        Route::get('requested-inspections', 'QuotesController@requestedInspections');
        Route::get('quotedetail/{id}', 'QuotesController@quotedetail')->name('quotedetail');
        Route::get('view-offer/{id}', 'QuotesController@viewOffer')->name('view-offer');
        Route::post('bidresponse', 'QuotesController@bidresponse')->name('bidresponse');
        Route::get('my-bids', 'BidController@getBids')->name('my-bids');
        Route::get('bid-details/{id}', 'BidController@bidDetails')->name('bid-details');
        Route::resource('ads', 'AdsController');
        Route::resource('used_car', 'UsedCarController');
        Route::get('garage-finish', 'WorkshopController@finish');
        Route::resource('workshop', 'WorkshopController');
        Route::resource('profile', 'ProfileController');
        /*Logout*/
        Route::post('logout', 'AuthController@logout')->name('logout');
        Route::get('archive','ArchiveController@index')->name('archive');
        Route::post('archive/download','ArchiveController@fileDownload')->name('archive.download');

    });
});

Route::group(['prefix' => 'user', 'namespace' => 'User', 'as' => 'user.'], function () {
    Route::get('login', 'AuthController@login');
    Route::get('register', 'AuthController@register');
    Route::post('login', 'AuthController@userLogin')->name('login');
    Route::post('register', 'AuthController@userRegister')->name('register');
    Route::post('terms_condition', 'AuthController@terms')->name('terms_condition');

    /*Route::get('facebook', 'AuthController@facebookRedirect')->name('facebook');
    Route::get('facebook/callback', 'AuthController@loginWithFacebook');
    Route::get('google', 'AuthController@redirectToGoogle')->name('google');
    Route::get('google/callback', 'AuthController@handleGoogleCallback');*/
    Route::get('forget_password', 'AuthController@forgetPassword')->name('forget_password');
    Route::post('reset-password', 'AuthController@resetPassword')->name('reset_password');
    Route::get('otp', 'AuthController@otp')->name('otp');
    Route::get('token_confirm/{token}', 'AuthController@tokenConfirm')->name('token_confirm');
    Route::post('otp_confirm', 'AuthController@otpConfirm')->name('otp_confirm');
    Route::post('password_change', 'AuthController@submitResetPassword')->name('password_change');
    Route::group(['middleware' => ['auth:web', 'role:user']], function () {
        Route::get('term_condition', 'TermConditionController@index')->name('term_condition');
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
        Route::post('payment_page', 'PaymentController@index')->name('payment_page');
        Route::post('payment-info', 'PaymentController@payment_info')->name('payment-info');
        Route::get('payment-insurance/{id}', 'PaymentController@payment_insurance')->name('payment-insurance');
        //profile
        Route::get('/profile', 'ProfileController@index')->name('profile.index');
        Route::get('/profile/edit/{id}', 'ProfileController@edit')->name('profile.edit');
        Route::post('/profile/edit/{id}', 'ProfileController@updateprofile')->name('profile.post');
        Route::post('/profile_password', 'ProfileController@updatepassword')->name('profile.update_password');
        //chatting
        //  Route::get('chat/index', 'chatcontroller@index')->name('chat.index');
        Route::get('chat/{id}', 'ChatController@chat')->name('chat');
        Route::post('chat/favorite', 'ChatController@favorite')->name('chat.favorite');
        Route::post('chat/chatSend', 'ChatController@store')->name('chatSend');
        Route::post('chat/delete', 'ChatController@delete')->name('chat.delete');
        Route::post('chat/alldelete', 'ChatController@alldelete')->name('chat.all_delete');
        Route::post('chat/chatted_delete', 'ChatController@chattedDelete')->name('chat.chatted_delete');
        Route::post('chat/online/status', 'ChatController@status')->name('online.status');
        Route::post('chat/chatted/status', 'ChatController@chatted')->name('chatted.status');
        //notification
        Route::post('notification', 'NotificationController@notification')->name('notification');
        Route::post('status/notification', 'NotificationController@status')->name('status.notification');

        // payment via insurance company
        Route::post('email', 'InsurancePaymentController@email')->name('email');
        Route::post('payment-request', 'InsurancePaymentController@payment_request')->name('payment-request');

        /* Logout */
        Route::post('logout', 'AuthController@logout')->name('logout');
        Route::resource('chat', 'ChatController');
        Route::resource('ads', 'AdsController');
        Route::get('quoteindex', 'QuoteController@index')->name('quoteindex');

        Route::get('quotecreate', 'QuoteController@create')->name('quotecreate');
        Route::post('quotestore', 'QuoteController@store')->name('quotestore');
        Route::get('response/{id}', 'QuoteController@reply')->name('response');
        Route::get('print-order-details/{id}', 'QuoteController@printOrderDetails')->name('print-order-details');
        Route::get('vendorReply/{id}', 'QuoteController@vendorResponse')->name('vendorReply');
        Route::resource('user_review', 'UserReviewController');
        Route::resource('wishlist', 'WishlistController');
        Route::resource('payment', 'InsurancePaymentController');
        Route::resource('order', 'OrderController');
        Route::get('order/summary/{id}', 'OrderController@summary')->name('order.summary');
        Route::get('order/invoce/{id}', 'OrderController@invoce')->name('order.invoce');
        Route::get('order/cancel/view/{id}', 'OrderController@cancelView')->name('order.cancel.view');
        Route::post('order/cancel', 'OrderController@cancelOrder')->name('order.cancel');
        Route::get('accept/resolution/{id}', 'OrderController@acceptResolution')->name('accept-resolution');
        Route::get('reject/resolution/{id}', 'OrderController@rejectResolution')->name('reject-resolution');
        // Route::get('pending-order-update', [OrderController::class, 'pendingOrderUpdate']);
        Route::get('pending-order-update', 'OrderController@pendingOrderUpdate');
        Route::get('archive','ArchiveController@index')->name('archive');
        Route::post('archive/download','ArchiveController@fileDownload')->name('archive.download');

    });
});

Route::group(['prefix' => 'company', 'namespace' => 'Company', 'as' => 'company.'], function () {
    Route::get('/', function () {
        return view('company.auth.login');
    })->name('admin.login');
    /* Admin Login Or Register Form */
    Route::get('login', 'AuthController@login')->name('login');
    Route::get('register', 'AuthController@register')->name('register');
    Route::post('login', 'AuthController@companyLogin')->name('login');
    Route::post('register', 'AuthController@companyRegister')->name('register');
    /*Forgot Password*/
    Route::get('forget_password', 'AuthController@forgetPassword')->name('forget_password');
    Route::post('reset-password', 'AuthController@resetPassword')->name('reset_password');
    Route::get('token_confirm/{token}', 'AuthController@tokenConfirm')->name('token_confirm');
    Route::get('otp', 'AuthController@otp')->name('otp');
    Route::post('otp_confirm', 'AuthController@otpConfirm')->name('otp_confirm');
    Route::post('password_change', 'AuthController@submitResetPassword')->name('password_change');
    /* Admin Auth Routes */
    Route::group(['middleware' => ['auth:company', 'role:company']], function () {
        /* Dashboard */
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
        Route::post('terms_condition', 'TermConditionController@terms')->name('terms_condition');
        Route::get('term_condition', 'TermConditionController@index')->name('term_condition');

        /* Logout */
        Route::post('logout', 'AuthController@logout')->name('logout');
        /* Company profile */
        Route::get('/profile', 'ProfileController@index')->name('profile');
        Route::get('/profile/edit/{id}', 'ProfileController@edit')->name('profile.edit');
        Route::post('/profile/edit/{id}', 'ProfileController@updateprofile')->name('profile.post');
        // Route::post('/profile_password', 'ProfileController@updatepassword')->name('profile.update_password');

        //insurance request
        Route::get('insurance-index', 'RequestController@index')->name('insurance-index');
        Route::get('paid-insurance', 'RequestController@paidInsurance')->name('paid-insurance');
        Route::get('car/detail/{id}', 'RequestController@carDetail')->name('car-detail');
        Route::get('pay/payment/{id}', 'RequestController@payPayment')->name('pay-payment');
        Route::get('print-order-details/{id}', 'RequestController@printOrderDetails')->name('print-order-details');

    });
});

<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\GarageController;
use App\Http\Controllers\Admin\InsuranceCompanyController;
use App\Http\Controllers\Admin\ModelYearController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PercentageController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VendorController;
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

    Route::get('/composer_update', function () {
        $output = shell_exec('php composer update');
        return $output;

    });
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

    // route for the language translation
    Route::post('language/{locale}', function ($locale) {
        app()->setLocale($locale);
        session()->put('locale', $locale);
        return response()->json([
            'success' => 'Status updated successfully',
        ]);
    });

    // Route::get('language', 'HomepageController@language');
    Route::get('/', 'HomepageController@index')->name('home');
    Route::get('category-garage', 'HomepageController@categoryGarage');
    Route::get('register', 'HomepageController@register')->name('register');
    Route::get('loginpage', 'HomepageController@loginchoice')->name('loginpage');
    Route::get('registerpage', 'HomepageController@registerchoice')->name('registerpage');
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
    Route::post('topGarage', 'HomepageController@topGarage')->name('topGarage');
    Route::get('news', 'HomepageController@news')->name('news');
    Route::get('faq', 'HomepageController@faqnews')->name('faq');
    Route::get('news_detail/{id}', 'HomepageController@newsDetail')->name('news_detail');
    Route::get('home', 'HomepageController@index')->name('home');
    Route::get('term_condition', 'HomepageController@term')->name('term');
    Route::get('about', 'HomepageController@about')->name('about');
    Route::get('privacy_policy', 'HomepageController@privacyPolicy')->name('privacy_policy');
    Route::post('company/model', 'HomepageController@company')->name('company-model');

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
        /*Customer/User*/
        Route::get('add-user', 'UserController@show')->name('addUser');
        Route::post('add-user', 'UserController@create')->name('add');
        /*Vendor*/
        Route::get('add-vendor', 'VendorController@show')->name('addVendor');
        Route::post('add-vendor', 'VendorController@create')->name('add');

        /*Insurance Company*/
        Route::get('add-company', 'InsuranceCompanyController@show')->name('addCompany');
        Route::post('add-company', 'InsuranceCompanyController@create')->name('add');
        /* Car Ads */
        Route::resource('ads', 'AdsController');
        Route::any('status-request-ad/{id}', 'AdsController@statusAds');
        Route::any('delete-ads/{id}', 'AdsController@deleteAds');
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

        /* All Insurance Company Route */
        Route::get('insurance-company/activate/{id}', 'InsuranceCompanyController@activate')->name('insurance-company.activate');
        Route::get('insurance-company/deactivate/{id}', 'InsuranceCompanyController@deactivate')->name('insurance-company.deactivate');
        //Route::get('get/company/permission/{role}', 'InsuranceCompanyController@getRole');
        Route::post('insurance-company/updatePassword/{id}', 'InsuranceCompanyController@updatePassword')->name('insurance-company.updatePassword');

        Route::get('insurance-company/', 'InsuranceCompanyController@index')->name('insurance-company');
        Route::get('insurance-company/edit/{id}', 'InsuranceCompanyController@edit')->name('insurance-company.edit');
        Route::put('insurance-company/update/{id}', 'InsuranceCompanyController@update')->name('insurance-company.update');
        Route::delete('insurance-company/destroy/{id}', 'InsuranceCompanyController@destroy')->name('insurance-company.destroy');

        Route::resource('company', 'InsuranceCompanyController')->except('create', 'store', 'show');

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
        // approved-request-ad/
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
        // All payemnt withdrawl request of vendors
        Route::get('withdraw/index', 'WithdrawlController@index')->name('withdraw.index');
        Route::get('withdraw/status/{id}', 'WithdrawlController@status')->name('withdraw.status');

        Route::get('/percentage', [PercentageController::class, 'index']);
        Route::get('edit-percentage/{id}', [PercentageController::class, 'edit_percentage']);
        Route::post('update-percentage/{id}', [PercentageController::class, 'update_percentage']);

        Route::get('faqs', [FaqController::class, 'index']);
        Route::get('add-faq', [FaqController::class, 'get_add_faq']);
        Route::post('add-faq', [FaqController::class, 'add_faq']);
        Route::get('edit-faq/{id}', [FaqController::class, 'edit_faq']);
        Route::post('update-faq/{id}', [FaqController::class, 'update_faq']);
        Route::any('delete-faq/{id}', [FaqController::class, 'delete_faq']);

        Route::any('delete-category/{id}', [CategoryController::class, 'delete']);
        Route::any('delete-company/{id}', [CompanyController::class, 'delete']);
        Route::any('delete-garage/{id}', [GarageController::class, 'delete']);
        Route::any('delete-order/{id}', [OrderController::class, 'delete']);
        Route::any('delete-news/{id}', [NewsController::class, 'delete']);
        Route::any('delete-vendor/{id}', [VendorController::class, 'delete']);
        Route::any('delete-insurance/{id}', [InsuranceCompanyController::class, 'delete']);
        Route::any('delete-user/{id}', [UserController::class, 'delete']);
        Route::any('delete-model-year/{id}', [ModelYearController::class, 'delete']);
        Route::any('delete-slider/{id}', [SliderController::class, 'delete']);

        /*----------Car Model of Car Brands---------------*/
        Route::get('car-model', 'CarModelController@CarModel')->name('car-model');
        Route::post('store-model', 'CarModelController@store')->name('store-model');
        Route::get('edit-model/{id}', 'CarModelController@edit')->name('edit-model');
        Route::post('update-model/{id}', 'CarModelController@update')->name('update-model');
        Route::get('view-model/{id}', 'CarModelController@view')->name('view-model');
        Route::any('delete-models/{id}', 'CarModelController@delete')->name('delete-models');
        Route::any('delete-model/{id}', 'CarModelController@deleteModel')->name('delete-model');

    });
});

Route::group(['prefix' => 'vendor', 'namespace' => 'Vendor', 'as' => 'vendor.'], function () {
    /*Admin Login Or Register Form*/
    Route::get('login', 'AuthController@login');
    Route::get('register', 'AuthController@register');
    Route::get('register_garage_view', 'GarageController@registerGarage')->name('register_garage_view');
    Route::post('login', 'AuthController@vendorLogin')->name('login');
    Route::post('register', 'AuthController@vendorRegister')->name('register');
    Route::post('vendor/validation', 'AuthController@emailvalidate')->name('email-validation');
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

        //payment with and accounta detail
        Route::get('acount/index', 'AccountController@index')->name('acount.index');
        Route::get('acount/create', 'AccountController@create')->name('acount.create');
        Route::post('acount/store', 'AccountController@store')->name('acount.store');
        Route::post('acount/update', 'AccountController@update')->name('acount.update');
        Route::post('acount/withdraw_request', 'AccountController@withdraw')->name('withdraw_request');

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
        Route::post('company/model', 'AdsController@company')->name('company-model');

        Route::resource('used_car', 'UsedCarController');
        Route::get('garage-finish', 'WorkshopController@finish');
        Route::resource('workshop', 'WorkshopController');
        Route::resource('profile', 'ProfileController');
        /*Logout*/
        Route::post('logout', 'AuthController@logout')->name('logout');
        Route::get('archive', 'ArchiveController@index')->name('archive');
        Route::post('archive/download', 'ArchiveController@fileDownload')->name('archive.download');
        Route::post('archive/delete', 'ArchiveController@fileDelete')->name('archive.delete');

    });
});

Route::group(['prefix' => 'user', 'namespace' => 'User', 'as' => 'user.'], function () {
    Route::get('login', 'AuthController@login');
    Route::get('register', 'AuthController@register');
    Route::post('login', 'AuthController@userLogin')->name('login');
    Route::post('register', 'AuthController@userRegister')->name('register');
    Route::post('terms_condition', 'AuthController@terms')->name('terms_condition');

    /* Company Login Or Register Route */
    Route::get('companyLogin', 'AuthController@companyLoginForm')->name('companyLogin');
    Route::post('companyLogin', 'AuthController@companyLogin')->name('companyLogin');
    Route::get('companyRegister', 'AuthController@companyRegisterForm')->name('companyRegister');
    Route::post('companyRegister', 'AuthController@companyRegister')->name('companyRegister');
    Route::post('customer/validation', 'AuthController@emailvalidate')->name('user-email-validation');
    Route::post('company/validation', 'AuthController@emailvalidate1')->name('company-email-validation');
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
        Route::post('payment-info', 'PaymentController@orderPlace')->name('payment-info');
        Route::post('order/place', 'PaymentController@orderPlaceByCompany')->name('order_place');
        Route::get('payment-insurance/{id}', 'PaymentController@orderPlaceForInsurance')->name('payment-insurance');
        //payment stripe
        Route::get('stripe', 'PaymentController@stripe');
        Route::post('stripe', 'PaymentController@stripePost')->name('stripe.post');
        //profile
        Route::get('/profile', 'ProfileController@index')->name('profile.index');
        Route::get('/profile/edit/{id}', 'ProfileController@edit')->name('profile.edit');
        Route::post('/profile/edit/{id}', 'ProfileController@updateprofile')->name('profile.post');
        Route::post('/profile_password', 'ProfileController@updatepassword')->name('profile.update_password');
        //chatting
        //  Route::get('chat/index', 'chatcontroller@index')->name('chat.index');
        Route::get('chat/{id}', 'ChatController@chat')->name('chat');
        Route::get('customerChat/{id}', 'ChatController@customerChat')->name('customerChat');
        Route::post('chat/favorite', 'ChatController@favorite')->name('chat.favorite');
        Route::post('chat/favoriteUser', 'ChatController@favoriteUser')->name('chat.favoriteUser');
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
        /* Quote */
        Route::get('quoteindex', 'QuoteController@index')->name('quoteindex');
        Route::get('quotecreate', 'QuoteController@create')->name('quotecreate');
        Route::post('quotestore', 'QuoteController@store')->name('quotestore');
        Route::get('response/{id}', 'QuoteController@reply')->name('response');
        Route::get('print-order-details/{id}', 'QuoteController@printOrderDetails')->name('print-order-details');
        Route::get('vendorReply/{id}', 'QuoteController@vendorResponse')->name('vendorReply');
        Route::post('company/model', 'QuoteController@company')->name('company-model');
        /* Resourse */
        Route::resource('user_review', 'UserReviewController');
        Route::resource('wishlist', 'WishlistController');
        Route::resource('payment', 'InsurancePaymentController');
        Route::resource('order', 'OrderController');
        /* Order */
        Route::get('order/summary/{id}', 'OrderController@summary')->name('order.summary');
        Route::get('order/invoce/{id}', 'OrderController@invoce')->name('order.invoce');
        Route::get('order/cancel/view/{id}', 'OrderController@cancelView')->name('order.cancel.view');
        Route::post('order/cancel', 'OrderController@cancelOrder')->name('order.cancel');
        Route::get('accept/resolution/{id}', 'OrderController@acceptResolution')->name('accept-resolution');
        Route::get('reject/resolution/{id}', 'OrderController@rejectResolution')->name('reject-resolution');
        Route::post('order/complete', 'OrderController@completeOrder')->name('order.complete');
        // Route::get('pending-order-update', [OrderController::class, 'pendingOrderUpdate']);
        Route::get('pending-order-update', 'OrderController@pendingOrderUpdate');
        Route::get('archive', 'ArchiveController@index')->name('archive');
        Route::post('archive/download', 'ArchiveController@fileDownload')->name('archive.download');
        Route::post('archive/delete', 'ArchiveController@fileDelete')->name('archive.delete');

        //company insurance panel links
        Route::get('insurance-index', 'RequestController@index')->name('insurance-index');
        Route::get('car/detail/{id}', 'RequestController@carDetail')->name('car-detail');
        Route::get('payments/{id}', 'RequestController@Payment')->name('payments');
        Route::post('pay/payment', 'RequestController@payPayment')->name('pay-payment');
        Route::get('print-order-detail/{id}', 'RequestController@printOrderDetails')->name('print-order-detail');

    });
});

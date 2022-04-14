<?php

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

    Route::get('/', 'HomepageController@index')->name('home');
    Route::get('register', 'HomepageController@register')->name('register');
    Route::get('used_cars', 'HomepageController@usedcars')->name('used_cars');
    Route::get('car_service', 'HomepageController@carService')->name('car_service');
    Route::get('vendorlist', 'HomepageController@allvendor')->name('vendorlist');
    Route::get('news', 'HomepageController@news')->name('news');
    Route::get('faq', 'HomepageController@faqnews')->name('faq');
    Route::get('home', 'HomepageController@index')->name('home');
});
Route::group(['prefix' => 'admin', 'namespace' => 'admin', 'as' => 'admin.'], function () {
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
        Route::get('get/user/permission/{role}', 'UserController@getRole');
        Route::post('users/updatePassword/{user}', 'UserController@updatePassword')->name('user.updatePassword');
        Route::resource('user', 'UserController')->except('create', 'store', 'show');
        /* All Vendor Route */
        Route::get('vendor/activate/{vendor}', 'VendorController@activate')->name('vendor.activate');
        Route::get('vendor/deactivate/{vendor}', 'VendorController@deactivate')->name('vendor.deactivate');
        Route::get('get/vendor/permission/{role}', 'VendorController@getRole');
        Route::post('vendor/updatePassword/{vendor}', 'VendorController@updatePassword')->name('vendor.updatePassword');
        Route::resource('vendor', 'VendorController')->except('create', 'store', 'show');
        /* All Category & SubCategory Route */
        Route::resource('category', 'CategoryController');
        Route::resource('subcategory', 'SubCategoryController');
        Route::resource('childcategory', 'ChildCategoryController');
        Route::resource('brand', 'BrandController');
        Route::resource('model', 'ModelController');
        Route::resource('model_year', 'ModelYearController');
        Route::resource('company', 'CompanyController');
        Route::resource('garage', 'GarageController');
        Route::resource('order', 'OrderController');
        Route::resource('news', 'NewsController');

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
    /* Admin Login Or Register Form */
    Route::get('login', 'AuthController@login');
    Route::get('register', 'AuthController@register');
    Route::post('login', 'AuthController@vendorLogin')->name('login');
    Route::post('register', 'AuthController@vendorRegister')->name('register');
    /*Route::get('facebook', 'AuthController@facebookRedirect')->name('facebook');
    Route::get('facebook/callback', 'AuthController@loginWithFacebook');
    Route::get('google', 'AuthController@redirectToGoogle')->name('google');
    Route::get('google/callback', 'AuthController@handleGoogleCallback');*/
    Route::get('forget_password', 'AuthController@forgetPassword')->name('forget_password');
    Route::post('reset-password', 'AuthController@resetPassword')->name('reset_password');
    Route::get('otp', 'AuthController@otp')->name('otp');
    Route::post('otp_confirm', 'AuthController@otpConfirm')->name('otp_confirm');
    Route::post('password_change', 'AuthController@submitResetPassword')->name('password_change');
    /* Vendor Auth Routes */
    Route::group(['middleware' => ['auth:vendor', 'role:vendor']], function () {
        Route::get('/dashboard', function () {
            return view('vendor.index');
        })->name('dashboard');
        /* Logout */
        Route::post('logout', 'AuthController@logout')->name('logout');
    });
});

Route::group(['prefix' => 'user', 'namespace' => 'User', 'as' => 'user.'], function () {
    /* Admin Login Or Register Form */
    Route::get('login', 'AuthController@login');
    Route::get('register', 'AuthController@register');
    Route::post('login', 'AuthController@userLogin')->name('login');
    Route::post('register', 'AuthController@userRegister')->name('register');
    /*Route::get('facebook', 'AuthController@facebookRedirect')->name('facebook');
    Route::get('facebook/callback', 'AuthController@loginWithFacebook');
    Route::get('google', 'AuthController@redirectToGoogle')->name('google');
    Route::get('google/callback', 'AuthController@handleGoogleCallback');*/
    Route::get('forget_password', 'AuthController@forgetPassword')->name('forget_password');
    Route::post('reset-password', 'AuthController@resetPassword')->name('reset_password');
    Route::get('otp', 'AuthController@otp')->name('otp');
    Route::post('otp_confirm', 'AuthController@otpConfirm')->name('otp_confirm');
    Route::post('password_change', 'AuthController@submitResetPassword')->name('password_change');
    /* User Auth Routes */
    Route::group(['middleware' => ['auth:web', 'role:user']], function () {
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
        Route::get('/profile', 'ProfileController@index')->name('profile.index');
        Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit');
        Route::post('/profile', 'ProfileController@updateProfile')->name('profile.post');
        Route::post('/profile_password', 'ProfileController@updatePassword')->name('profile.update_password');
        Route::resource('chat', 'ChatController');
        Route::resource('ads', 'AdsController');
        Route::resource('quote', 'QuoteController');
        Route::resource('wishlist', 'WishlistController');
        Route::resource('payment', 'InsurancePaymentController');
        Route::resource('order', 'OrderController');

        /* Logout */
        Route::post('logout', 'AuthController@logout')->name('logout');
    });
});


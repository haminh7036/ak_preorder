<?php

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
Route::get('/g-shock-dream-challenge', 'LandingPageController@landing_page_1');
Route::get('/thong-tin-su-kien-g-shock-dream-challenge', 'LandingPageController@landing_page_2');
Route::get('/baby-ba-130', 'LandingPageController@landing_page_3');
Route::group(['namespace'=>'PreOrder'], function (){
    Route::get('/preorder','PreOrderMainController@index');
    Route::get('/preorder/{slug}','PreOrderMainController@order')->name('preorder_order');
    Route::post('/cities/getProvince','PreOrderMainController@province')->name('province');
    Route::post('/cities/getShops','PreOrderMainController@shops')->name('shops');
    Route::post('/preorder/store/{slug}','PreOrderMainController@comfirm_order')->name('store_pre_order');
    Route::get('/order-confirmed', 'PreOrderMainController@success')->name('preorder_store_success');
});
Route::post('/store-registrant', 'LandingPageController@store')->name('store_registrant');
Route::prefix('pre-order-admin')->group(function () {
    Auth::routes();
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/', 'HomeController@admin')->name('home');
        Route::get('home', 'HomeController@admin')->name('home');
        Route::get('my-profile', 'MembersController@profile')->name('my_profile');
        Route::post('my-profile', 'MembersController@updateProfile')->name('my_profile');
        Route::resource('registrants', 'RegistrantController');
        Route::resource('interviewers', 'InterviewerController');
        Route::post('update-interviewer/{id}', 'InterviewerController@updateInterviewer')->name('update_interview');
        Route::post('create-interviewer', 'InterviewerController@storeInterviewer')->name('store_interviewer');
        Route::resource('slide-images', 'SlideImageController');
        Route::post('store-images','SlideImageController@store')->name('store_images_slide');
        Route::resource('pages', 'PagesController');
        Route::resource('link-videos','LinkVideoController');
        Route::resource('posts', 'PostController');
        Route::resource('celebrity', 'CelebrityController');
        Route::post('update-posts/{id}', 'PostController@updatePost')->name('update_post');

        //Pre-Order
        Route::group(['namespace'=>'PreOrder'], function ()
        {
            Route::resource('product', 'PreorderProductController');
            Route::resource('image', 'PreorderImageController');
            Route::resource('order', 'PreorderOrderController');
            Route::resource('pre-order-page', 'PreorderPageController');
            Route::resource('specifications', 'PreOrderSpecificationsController');
            Route::patch('update-product-status/{id}', 'PreorderProductController@changeStatus')->name('update_status_product');
            Route::patch('update-status-deposit-status/{id}', 'PreorderOrderController@changeStatus')->name('update_status_deposit_status');
        });
    });
});

Route::get('logout', 'Auth\LoginController@logout');

Route::fallback(function () {
    return abort(404);
});
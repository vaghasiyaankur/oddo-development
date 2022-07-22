<?php

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

Route::prefix('frontend')->group(function() {
});

/* Home Page */
Route::get('/', 'HomeController@index')->name('home.index');


/* Hotel Page */
Route::get('/hotel', 'HotelController@index')->name('hotel.index');

/* Hotel Details */
Route::get('/hotel-detail/{slug}','HotelController@hotelDetail')->name('hotel.detail');

/* City Page */
Route::get('/city', 'CityController@index')->name('city.index');
Route::get('/explore/city/{slug}', 'CityController@explore')->name('city.explore');


/* Search Page */
Route::get('/search', 'SearchController@index')->name('search.index');


/* Planner Page */
Route::get('/planner', 'PlannerController@index')->name('planner.index');

/* Saved Page */
Route::get('/saved', 'SavedController@index')->name('saved.index');


/* Order Histrory Page */
Route::get('/order-history', 'OrderHistoryController@index')->name('orderhistory.index');

/* Upcoming Trip Page */
Route::get('/upcoming-trip', 'UpcomingTripController@index')->name('upcomingtrips.index');

/* Checkout Page */
Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');


Route::view('/login', 'frontend::auth.login');

Route::view('/register', 'frontend::auth.register');

Route::post('user/login', 'Auth\LoginController@login')->name('user.login');
Route::get('user/logout', 'Auth\LoginController@logout')->name('logout.index');
Route::post('user/register', 'Auth\RegisterController@store')->name('user.register');
Route::post('user/forget-password', 'Auth\ForgetPasswordController@forgetpassword')->name('user.forget-password');
Route::get('/reset-password/{token}', 'Auth\ResetPasswordController@getPassword')->name('user.resetPassword');
Route::post('/reset-password', 'Auth\ResetPasswordController@updatePassword')->name('user.updatePassword');


Route::middleware(['auth', 'user-access:user'])->group(function(){
//     /* Profile Page */
    Route::get('/my-account', 'ProfileController@index')->name('myaccount.index');
    
});


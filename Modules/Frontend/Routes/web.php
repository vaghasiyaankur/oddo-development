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

// Route::prefix('frontend')->group(function() {
// });

/* Home Page */
Route::get('/', 'HomeController@index')->name('home.index');


/* Hotel Page */
Route::get('/hotel', 'HotelController@index')->name('hotel.index');

/* City Page */
Route::get('/city', 'CityController@index')->name('city.index');

/* Search Page */
Route::get('/search', 'SearchController@index')->name('search.index');


/* Planner Page */
Route::get('/planner', 'PlannerController@index')->name('planner.index');

/* Saved Page */
Route::get('/saved', 'SavedController@index')->name('saved.index');

/* Profile Page */
Route::get('/my-account', 'ProfileController@index')->name('myaccount.index');

/* Order Histrory Page */
Route::get('/order-history', 'OrderHistoryController@index')->name('orderhistory.index');

/* Upcoming Trip Page */
Route::get('/upcoming-trip', 'UpcomingTripController@index')->name('upcomingtrips.index');

/* Checkout Page */
Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');


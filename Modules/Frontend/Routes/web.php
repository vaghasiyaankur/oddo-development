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

// user register/login
Route::post('user/login', 'Auth\LoginController@login')->name('user.login');
Route::get('user/logout', 'Auth\LoginController@logout')->name('logout.index');
Route::post('user/register', 'Auth\RegisterController@store')->name('user.register');
Route::get('/user/verification/{token}', 'Auth\RegisterController@userVerification')->name('user.verification');

Route::post('user/forget-password', 'Auth\ForgetPasswordController@forgetpassword')->name('user.forget-password');
Route::get('/reset-password/{token}', 'Auth\ResetPasswordController@getPassword')->name('user.resetPassword');
Route::post('/reset-password', 'Auth\ResetPasswordController@updatePassword')->name('user.updatePassword');

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

/* Upcoming Trip Page */
Route::get('/upcoming-trip', 'UpcomingTripController@index')->name('upcomingtrips.index');

/* Checkout Page */
Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');

/* WishList Route  */
Route::controller(WishlistController::class)->group(function(){
    Route::post('add-wishlist', 'addWishlist')->name('add.wishlist');
    Route::post('remove-wishlist', 'removeWishlist')->name('remove.wishlist');
});

// google socialite
Route::controller(Auth\Socialite\GoogleController::class)->group(function(){
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});

Route::controller(Auth\Socialite\FacebookController::class)->group(function(){
    Route::get('auth/facebook', 'redirectToFacebook')->name('auth.facebook');
    Route::get('auth/facebook/callback', 'handleFacebookCallback');
});

Route::middleware(['auth', 'user-access:user'])->group(function(){
    /* Profile Page */
    Route::get('/my-account', 'ProfileController@index')->name('myaccount.index');
    Route::post('/update-user', 'ProfileController@update')->name('update.user');
    Route::post('/change-password', 'ProfileController@changePassword')->name('change.password');

    /* Saved Page */
    Route::prefix('saved')->controller(SavedController::class)->group(function(){
        Route::get('/', 'index')->name('saved.index');
        Route::post('/remove/wishlist', 'destroy')->name('wishlish.remove');
        Route::get('wishlist/list', 'wishlistList')->name('wishlist.list');
    });

    /* Order Histrory Page */
    Route::prefix('order')->controller(OrderHistoryController::class)->group(function(){
        Route::get('/history', 'index')->name('orderhistory.index');
        Route::post('/store', 'store')->name('add.review');
        Route::post('/view', 'show')->name('show.review');
        Route::get('/list', 'list')->name('list.review');
    });

    // payment
    Route::prefix('payment')->controller(PaymentController::class)->group(function(){
        Route::post('show/stripe', 'showStripe')->name('show.stripe');
        Route::get('/succeeded', 'StripeSucceed')->name('succeed.stripe');
        Route::post('/razorpay', 'razorpayStore')->name('payment.razorpay');

        Route::get('createpaypal','createpaypal')->name('createpaypal');
        Route::get('processPaypal','processPaypal')->name('processPaypal');
        Route::get('processSuccess','processSuccess')->name('processSuccess');
        Route::get('processCancel','processCancel')->name('processCancel');
    });

    Route::post('/hotel/review', 'HotelController@hotelReview')->name('hotel.review');

    Route::post('/hotel/photo', 'HotelController@hotelPhoto')->name('hotel.photo');
});


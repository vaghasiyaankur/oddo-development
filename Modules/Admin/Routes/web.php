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

Route::prefix('admin')->group(function() {
    Route::view('/amenity', 'admin::amenity');
    Route::view('/location', 'admin::location');
    Route::view('/amenity-types', 'admin::amenity-type');
    Route::view('/facilities', 'admin::facilities');
    Route::view('/property', 'admin::property');
});

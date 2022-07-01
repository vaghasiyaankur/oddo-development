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
    Route::view('/amenity', 'admin::amenity')->name('amenity');
    Route::view('/location', 'admin::location')->name('location');
    Route::view('/amenity-types', 'admin::amenity-type')->name('amenity-types');
    Route::view('/facilities', 'admin::facilities')->name('facilities');
    Route::view('/property', 'admin::property')->name('property');
});

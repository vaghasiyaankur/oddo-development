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
    Route::view('/amenity-view', 'admin::amenity');
    Route::view('/location', 'admin::location');
    Route::view('/amenity-types', 'admin::amenity-type');
    Route::view('/facilities', 'admin::facilities');
    Route::view('/property', 'admin::property');

    Route::controller(AmenityCategoryController::class)->group(function(){
        Route::get('/amenity-category', 'amenityCategory')->name('amenity.category');
        Route::post('/add-amenity-category', 'addAmenityCategory')->name('add.amenitycategory');
        Route::get('/amenity-category-getlist', 'getList')->name('amenitycategory.list');
        Route::post('/update-amenity-category/{id}', 'updateAmenityCategory')->name('update.amenitycategory');
        Route::post('/amenity-status', 'amenityStatus')->name('status.amenity');
        Route::post('/delete-amenity/{id}', 'deleteAmenityCategory')->name('delete.amenitycategory');
    });

    Route::controller(AmenityController::class)->group(function(){
        Route::get('/amenity', 'index')->name('amenity.index');
    });

});

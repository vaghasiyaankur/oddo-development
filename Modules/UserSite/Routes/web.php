<?php

// use App\Http\Controllers\ItemController;
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
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Route::controller(PropertyController::class)->group(function(){
    Route::get('property-category', 'category')->name('property-category');
    Route::get('property-form', 'property_form')->name('property-form');
    Route::post('add-property-form', 'property_submit')->name('add-property-form');
    Route::get('facilities-form', 'facilities')->name('facilities-form');
    Route::view('layout-form', 'usersite::add-layout')->name('layout-form');
    Route::get('layout-pricing-form', 'layout_pricing')->name('layout-pricing-form');
    Route::post('room-lists', 'room_list')->name('room-lists');
    Route::get('room-list', 'room_lists')->name('room-list'); 
    Route::get('amenities', 'amenities')->name('amenities');
    Route::post('add-room', 'add_room')->name('add-room'); 
    Route::post('add-facilities', 'add_facilities')->name('add-facilities');
    Route::post('add-amenities', 'add_amenities')->name('add-amenities');
    Route::view('photos', 'usersite::photo')->name('photo');
});


// Route::get('/update-column', function(){
//     Schema::table('hotels', function (Blueprint $table) {
//        $table->string('amenity_id')->nullable();
//     });
// });

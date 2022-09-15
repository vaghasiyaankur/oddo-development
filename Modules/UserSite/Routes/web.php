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






// Route::get('/update-column', function(){
//     Schema::table('hotels', function (Blueprint $table) {
//        $table->string('amenity_id')->nullable();
//     });
// });

Route::prefix('user')->group(function() {
    Route::middleware(['auth', 'user-access:user'])->group(function(){
        Route::controller(UserController::class)->group(function(){
            Route::get('/home', 'index')->name('user.view');
            Route::get('property-list', 'propertyList')->name('property.List');
        });

        Route::view('/calender', 'usersite::user.calender')->name('calender');

        Route::view('/booking', 'usersite::user.booking')->name('booking');
        // proeprty form
        Route::controller(PropertyController::class)->group(function(){
            Route::get('property-category', 'category')->name('property-category');
            Route::get('basic-info/{id}', 'basicInfo')->name('basic-info');
            Route::post('cities', 'cities')->name('cities');
            Route::post('add-property', 'add_property')->name('add-property');
            // Route::post('add-property-form', 'property_submit')->name('add-property-form');

            Route::post('add-property-form', 'property_submitUpdate')->name('add-property-form');
            Route::post('add-facilities', 'facilities_add_update')->name('add-facilities');
            Route::post('add-amenities', 'amenities_add_update')->name('add-amenities');
            Route::post('add-layout', 'layouts_add_update')->name('add-layoutprice');
            Route::post('add-photos', 'photos_add_update')->name('add-photos');

            Route::get('facilities-form/{id}', 'facilities')->name('facilities-form');
            Route::view('layout-form/{id}', 'usersite::add-layout')->name('layout-form');
            Route::get('layout-pricing-form/{id}', 'layout_pricing')->name('layout-pricing-form');
            Route::post('room-lists', 'room_list')->name('room-lists');
            Route::get('room-list/{id}  ', 'room_lists')->name('room-list');
            Route::get('amenities/{id}', 'amenities')->name('amenities');
            // Route::post('add-room', 'add_room')->name('add-room');
            // Route::post('add-facilities', 'add_facilities')->name('add-facilities');
            // Route::post('add-amenities', 'add_amenities')->name('add-amenities');
            Route::view('photos/{id}', 'usersite::photo')->name('photo');
            Route::post('save-photos', 'save_photos')->name('save-photos');
            // Route::view('policy/{id}', 'usersite::policies')->name('policy');
            Route::get('policy/{id}', 'viewPolicy')->name('policy');
            Route::post('add-policy', 'add_policy')->name('add-policy');


            // edit Property
            // Route::get('edit/basic-info/{id}', 'editProperty')->name('edit.proeprty');
            Route::post('update-property-form', 'updateProperty')->name('update-property-form');


            Route::get('edit/layout-list/{id}', 'editLayout')->name('edit.layout');
            // Route::get('edit/layout-pricing-form/{id}' , 'editLayoutPrice')->name('edit.layoutPrice');
            Route::post('update-room', 'updateRoom')->name('update-room');

            Route::get('edit/facilities/{id}', 'editFacilities')->name('edit.facilities');
            Route::post('update/facilities', 'updateFacilities')->name('update.facilities');

            Route::get('edit/amenities/{id}', 'editAmenities')->name('edit.amenities');
            Route::post('update/amenities', 'updateAmenities')->name('update.amenities');

            Route::get('edit/photo/{id}', 'editPhoto')->name('edit.photo');
            Route::post('update/photos', 'updatePhotos')->name('update-photos');

            // delete Property
            Route::post('propertyDelete/{id}', 'deleteProperty')->name('delete.proeprty');
            Route::post('deleteRoom/{hotelid}/{id}', 'deleteRoom')->name('delete.room');
        });
        Route::prefix('booking')->controller(BookingController::class)->group(function(){
            Route::get('/', 'index')->name('booking');
            Route::post('filter', 'bookingFilter')->name('booking.filter');
        });
    });
});

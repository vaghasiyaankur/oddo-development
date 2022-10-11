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
            Route::post('/image','imageShow')->name('show.image');
            Route::get('property-list', 'propertyList')->name('property.List');
        });

        Route::view('/calender', 'usersite::user.calender')->name('calender');

        // proeprty form
        Route::controller(PropertyController::class)->group(function(){

            // property category
            Route::get('property-category', 'category')->name('property-category');
            Route::post('add-property', 'add_property')->name('add-property');
            
            // basic information
            Route::get('basic-info/{id}', 'basicInfo')->name('basic-info');
            Route::post('cities', 'cities')->name('cities');
            Route::post('add-property-form', 'property_submitUpdate')->name('add-property-form');

            // layout & pricing
            Route::get('layout-pricing-form/{id}', 'layout_pricing')->name('layout-pricing-form');
            Route::get('room-list/{id}  ', 'room_lists')->name('room-list');
            Route::post('add-layout', 'layouts_add_update')->name('add-layoutprice');
            Route::view('layout-form/{id}', 'usersite::add-layout')->name('layout-form');
            Route::post('room-lists', 'room_list')->name('room-lists');
            Route::post('edit/room/{id}', 'editRoom')->name('room.edit');

            // facilities
            Route::get('facilities-form/{id}', 'facilities')->name('facilities-form');
            Route::post('add-facilities', 'facilities_add_update')->name('add-facilities');

            // amenities
            Route::get('amenities/{id}', 'amenities')->name('amenities');
            Route::post('add-amenities', 'amenities_add_update')->name('add-amenities');

            // policies
            Route::get('policy/{id}', 'viewPolicy')->name('policy');
            Route::post('add-policy', 'add_policy')->name('add-policy');

            // delete Property
            Route::post('propertyDelete/{id}', 'deleteProperty')->name('delete.proeprty');
            Route::post('deleteRoom/{hotelid}/{id}', 'deleteRoom')->name('delete.room');

            //Photos   
            Route::get('photos/{id}', 'viewPhotos')->name('photo');
            Route::post('/save-photos/{id}', 'save_photos')->name('save-photos');
            Route::post('update/photos', 'updatePhotos')->name('update-photos');


            // Route::post('update-photos', 'photoUpdate')->name('update-photos');
            // Route::post('add-photos', 'photos_add_update')->name('add-photos');

            // edit Property
            // Route::get('edit/basic-info/{id}', 'editProperty')->name('edit.proeprty');
            // Route::post('update-property-form', 'updateProperty')->name('update-property-form');

            // Route::get('edit/layout-list/{id}', 'editLayout')->name('edit.layout');
            // Route::get('edit/layout-pricing-form/{id}' , 'editLayoutPrice')->name('edit.layoutPrice');
            // Route::post('update-room', 'updateRoom')->name('update-room');

            // Route::get('edit/facilities/{id}', 'editFacilities')->name('edit.facilities');
            // Route::post('update/facilities', 'updateFacilities')->name('update.facilities');

            // Route::get('edit/amenities/{id}', 'editAmenities')->name('edit.amenities');
            // Route::post('update/amenities', 'updateAmenities')->name('update.amenities');

            // Route::get('edit/photo/{id}', 'editPhoto')->name('edit.photo');
            // Route::post('update/photos', 'updatePhotos')->name('update-photos');
        });

        // booking 
        Route::prefix('booking')->controller(BookingController::class)->group(function(){
            Route::get('/', 'index')->name('booking');
            Route::post('filter', 'bookingFilter')->name('booking.filter');
        });
    });
});

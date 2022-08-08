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

    Route::controller(LoginController::class)->group(function(){
        Route::get('/login', 'index')->name('admin.index');
        Route::post('/login', 'login')->name('admin.login');
        Route::get('/logout', 'logout')->name('admin.logout');
    });

    Route::middleware(['auth', 'user-access:admin'])->group(function () {
        // amenity category
        Route::controller(AmenityCategoryController::class)->group(function(){
            Route::get('/amenity-category', 'amenityCategory')->name('amenityCategory.index');
            Route::post('/add-amenity-category', 'addAmenityCategory')->name('add.amenitycategory');
            Route::get('/amenity-category-getlist', 'getList')->name('amenitycategory.list');
            Route::post('/update-amenity-category/{id}', 'updateAmenityCategory')->name('update.amenitycategory');
            Route::post('/amenity-status', 'amenityCategoryStatus')->name('status.amenityCategory');
            Route::post('/delete-amenity-category/{id}', 'deleteAmenityCategory')->name('delete.amenitycategory');
        });

        // amenity
        Route::controller(AmenityController::class)->group(function(){
            Route::get('/amenity', 'index')->name('amenity.index');
            Route::get('/amenity-list', 'amenityList')->name('amenity.list');
            Route::post('/add-amenity', 'store')->name('add.amenity');
            Route::post('/update-amenity/{id}', 'update')->name('update.amenity');
            Route::post('/delete-amenity/{id}', 'destroy')->name('delete.amenity');
            Route::post('/feature-amenity', 'featureAmenity')->name('featured.amenity');
        });

        // faclilities
        Route::controller(FacilitiesController::class)->group(function(){
            Route::get('/facilities', 'index')->name('facilities.index');
            Route::get('/facilities-list', 'facilitiesList')->name('facilities.list');
            Route::post('/add-facility', 'store')->name('add.facility');
            Route::post('/update-facility/{id}', 'update')->name('update.facility');
            Route::post('/status-facility', 'statusFacility')->name('status.facility');
            Route::post('/delete-facility/{id}', 'destroy')->name('delete.facility');
        });

        // roomType
        Route::controller(RoomTypeController::class)->group(function(){
            Route::get('/room-type', 'index')->name('roomType.index');
            Route::get('/room-type-list', 'roomTypeList')->name('roomtype.list');
            Route::post('/add-room-type', 'store')->name('add.roomtype');
            Route::post('/update-roomtype/{id}', 'update')->name('update.roomtype');
            Route::post('/delete-roomtype/{id}', 'destroy')->name('delete.roomtype');
            Route::post('/status-roomtype', 'statusRoomType')->name('status.roomtype');
        });

        // room
        Route::controller(RoomController::class)->group(function(){
            Route::get('/room', 'index')->name('room.index');
            Route::get('/room-list', 'roomList')->name('room.list');
            Route::post('/add-room', 'store')->name('add.room');
            Route::post('/update-room/{id}', 'update')->name('update.room');
            Route::post('/delete-room/{id}', 'destroy')->name('delete.room');
            Route::post('/status-room', 'statusRoom')->name('status.room');
        });

        // location
        Route::controller(LocationController::class)->group(function(){
            Route::get('/location', 'index')->name('location.index');
            Route::get('/location-list', 'locationList')->name('location.list');
            Route::post('/add-location', 'store')->name('add.location');
            Route::post('/featured-location', 'featuredLocation')->name('featured.location');
            Route::post('/delete-location/{id}', 'destroy')->name('delete.location');
            Route::post('/update-location/{id}', 'update')->name('update.location');
        });

        // bathroomItem
        Route::controller(BathroomItemController::class)->group(function(){
            Route::get('/bathroom', 'index')->name('bathroomitem.index');
            Route::get('/bathroom-list', 'bathroomList')->name('bathroom.list');
            Route::post('/add-bathroom', 'store')->name('add.bathroom');
            Route::post('/update-bathroom/{id}', 'update')->name('update.bathroom');
            Route::post('/status-bathroom', 'statusBathRoom')->name('status.bathroom');
            Route::post('/delete-bathroom/{id}', 'destroy')->name('delete.bathroom');
        });

        // bedtype
        Route::controller(BedtypesController::class)->group(function(){
            Route::get('/bed', 'index')->name('bed.index');
            Route::get('/bed-list', 'bedtypeList')->name('bedtype.list');
            Route::post('/add-bed', 'store')->name('add.bedtype');
            Route::post('/status-bed', 'statusBedType')->name('status.bedtype');
            Route::post('/delete-bed/{id}', 'destroy')->name('delete.bedtype');
            Route::post('/update-bed/{id}', 'update')->name('update.bedtype');
        });

        // foodType
        Route::controller(FoodTyeController::class)->group(function(){
            Route::get('/food', 'index')->name('food.index');
            Route::get('/food-list', 'foodList')->name('food.list');
            Route::post('/add-food', 'store')->name('add.food');
            Route::post('/status-food', 'statusFood')->name('status.food');
            Route::post('/delete-food/{id}', 'destroy')->name('delete.food');
            Route::post('/update-food/{id}', 'update')->name('update.food');
        });

        // property
        Route::controller(PropertyController::class)->group(function(){
            Route::get('/property','index')->name('property.index');
            Route::get('/property-list', 'propertyList')->name('property.list');
            Route::post('/property-status','PropertyStatus')->name('property.status');
        });

        // Setting
        Route::controller(SettingController::class)->group(function(){
            Route::view('setting', 'admin::Settings.index')->name('setting.index');
        });

    });


    // Route::view('/amenity-view', 'admin::amenity');
    // Route::view('/location-old', 'admin::location');
    // Route::view('/amenity-types', 'admin::amenity-type');
    // Route::view('/facilities', 'admin::facilities');
    // Route::view('/property', 'admin::property')->name('property');
});

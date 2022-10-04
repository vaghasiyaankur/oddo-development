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
    
    Route::group(['middleware' => ['guest']], function() {
        Route::controller(LoginController::class)->group(function(){
            Route::get('/login', 'index')->name('admin.index');
            Route::post('/login', 'login')->name('admin.login');
        });
    });
    
    
    Route::middleware(['auth', 'user-access:admin'])->group(function () {
        // dashboard
        Route::controller(DashboardController::class)->group(function(){
            Route::get('/dashboard', 'index')->name('dashboard');
        });

        //profile
        Route::view('/profile', 'admin::profile.index')->name('profile');

        // Amenity category
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
        Route::controller(FoodTypeController::class)->group(function(){
            Route::get('/food', 'index')->name('food.index');
            Route::get('/food-list', 'foodList')->name('food.list');
            Route::post('/add-food', 'store')->name('add.food');
            Route::post('/status-food', 'statusFood')->name('status.food');
            Route::post('/delete-food/{id}', 'destroy')->name('delete.food');
            Route::post('/update-food/{id}', 'update')->name('update.food');
        });

        // Photo Category
        Route::controller(PhotoCategoryController::class)->group(function(){
            Route::get('/photo-category', 'index')->name('photocategory.index');
            Route::get('/photo-list', 'photoList')->name('photoCategory.list');
            Route::post('/add-photo-catgory', 'store')->name('add.photoCategory');
            Route::post('/update-photo-category/{id}', 'update')->name('update.photoCategory');
            Route::post('/delete-photo-category/{id}', 'destroy')->name('delete.photoCategory');
            Route::post('/photo-status', 'photoCategoryStatus')->name('status.photoCategory');
        });

        // property
        Route::controller(PropertyController::class)->group(function(){
            Route::get('/property','index')->name('property.index');
            Route::get('/property-list', 'propertyList')->name('property.list');
            Route::post('/property-status','PropertyStatus')->name('property.status');
            Route::get('/single-property/{slug}', 'SingleProperty')->name('property.single');
        });

         // Setting
        Route::controller(SettingController::class)->group(function(){
            Route::get('setting', 'index')->name('setting.index');
            Route::post('setting', 'changeSetting')->name('setting.change');

            // general Setting
            Route::post('update/generalsetting', 'updateGeneralSetting')->name('update.generalSetting');

            // email setting
            Route::post('update/emailsetting', 'updateEmailSetting')->name('update.emailSetting');
            Route::get('emailSetting/show', 'emailSettingShow')->name('emailsetting.show');

            Route::get('edit/emailtemplate', 'editEditTemplate')->name('edit.emailTemplate');
            Route::post('update/emailtemplate', 'updateEmailTemplate')->name('update.EmailTemplate');
            Route::get('emailtemplate/show', 'emailTemplateShow')->name('emailtemplate.show');

            // logo & favicon
            Route::get('logoFavicon/show', 'logoFaviconShow')->name('logoFavicon.show');
            Route::post('update/logo', 'updateLogo')->name('update.logo');
            Route::post('delete/favicon/{id}', 'deleteFavicon')->name('delete.favicon');
            Route::post('delete/logo/{id}', 'deleteLogo')->name('delete.logo');
        });

        // booking
        Route::controller(BookingController::class)->group(function(){
            Route::get('booking', 'index')->name('booking.index');
            Route::get('/booking-list', 'bookingList')->name('booking.list');
            Route::post('/status-booking', 'statusBooking')->name('status.booking');
        });

        // payment gateway
        Route::controller(PaymentGatewayController::class)->group(function(){
            Route::get('payment', 'index')->name('paymentGateway.index');
            Route::post('payment/status', 'paymentStatus')->name('paymentGateways.status');

            // paypal
            Route::post('update/paypal/{uuid}', 'updatePaypal')->name('update.paypal');
            Route::get('/show/paypal', 'showPaypal')->name('show.paypal');

            // stripe
            Route::post('/update/stripe/{uuid}', 'updateStripe')->name('update.stripe');
            Route::get('/show/stripe', 'showStripe')->name('show.stripe');

            // razorpay
            Route::post('/update/razorpay/{uuid}', 'updateRazorpay')->name('update.razorpay');
            Route::get('/show/razorpay', 'showRazorpay')->name('show.razorpay');
        });

        // payment
        Route::controller(PaymentController::class)->group(function(){
            Route::get('payments', 'index')->name('payment.index');
            Route::get('/payment-list', 'paymentList')->name('payment.list');
        });

        // review
        Route::controller(ReviewController::class)->group(function(){
            Route::get('review', 'index')->name('review.index');
            Route::get('review-list', 'ReviewList')->name('review.list');
        });

        // admin
        Route::controller(AdminController::class)->group(function(){
            Route::post('notification', 'notification')->name('property.notification');
            Route::post('notification/show', 'showNotification')->name('notification.show');
            Route::post('notification/delete', 'deleteNotification')->name('notification.delete');
        });

        // pages
        Route::controller(PagesController::class)->group(function() {
            Route::get('/pages', 'index')->name('pages.index');
            Route::get('/add-page', 'create')->name('page.create');
            Route::post('/add-page', 'store')->name('page.store');
            Route::post('delete-page/{id}', 'destroy')->name('page.delete');
            Route::get('page-list', 'pageList')->name('page.list');
            Route::get('edit-page/{id}', 'edit')->name('page.edit');
            Route::post('update-page', 'update')->name('page.update');
        });

        // log out
        Route::get('/logout', 'LoginController@logout')->name('admin.logout');
    });


    // Route::view('/amenity-view', 'admin::amenity');
    // Route::view('/location-old', 'admin::location');
    // Route::view('/amenity-types', 'admin::amenity-type');
    // Route::view('/facilities', 'admin::facilities');
    // Route::view('/property', 'admin::property')->name('property');
});

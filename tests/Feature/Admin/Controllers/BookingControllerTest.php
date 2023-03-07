<?php

namespace Tests\Feature\Admin\Controllers;

use App\Models\HotelBooking;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookingControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->adminLogin();
    }

    /**
     * @return void
     */
    public function test_booking_list()
    {
        $response = $this->get(route('booking.index'));
        $bookings = HotelBooking::paginate(10);
        $response->assertSee($bookings);
        $response->assertViewIs('admin::Booking.index');
    }

    /**
     * @return void
     */
    public function test_booking_list_filter()
    {

        $response = $this->get(route('booking.list'), [
            'search' => 'demodd',
        ]);

        $bookings = HotelBooking::paginate(10);
        $response->assertSee($bookings);
        $response->assertViewIs('admin::Booking.bookingList');
    }

    // /**
    //  * @return void
    //  */
    // public function test_change_booking_status()
    // {
    //     $response = $this->post(route('status.booking'));
    //     $response->assertStatus(200);
    // }
}

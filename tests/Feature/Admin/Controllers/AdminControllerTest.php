<?php

namespace Tests\Feature\Admin\Controllers;

use App\Models\Hotel;
use App\Models\LogoFavicon;
use App\Models\Notification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->adminLogin();
    }

    /**
     * Notification Static function
     *
     * @return void
     */
    public function test_notification()
    {
        $LogoFavicon = LogoFavicon::first();
        $response = $this->post(route('property.notification'));
        $response->assertStatus(200);
    }

    /**
     * notification count
     *
     * @return void
     */
    public function test_notification_count()
    {
        $hotelCount = Notification::count();

        $response = $this->post(route('property.notification'));
        $response->assertStatus(200)->assertJson(['hotelCount' => $hotelCount]);
    }

    /**
     * Show Notification
     *
     * @return void
     */
    public function test_notification_show()
    {
        $notifications = Notification::select('hotel_id')->get();
        $hotels = array();

        foreach ($notifications as $key => $notification) {
            $hotels[] = Hotel::where('id', $notification->hotel_id)
                ->select('id', 'property_name', 'UUID', 'created_at')->get();
        }

        $data['hotels'] = $hotels;

        $response = $this->post(route('notification.show'));
        $response->assertViewIs('layout::admin.includes.notification');
        $response->assertSee($data['hotels']);
    }

    /**
     * Delete Notification
     *
     * @return void
     */
    public function test_notification_delete()
    {

        Notification::create([
            'user_id' => '2',
            'hotel_id' => '1',
        ]);

        $hotel = Notification::where('hotel_id', 1)->delete();
        $response = $this->post(route('notification.delete'));
        $response->assertStatus(200)->assertJson(["message" => 'notification delete successfully.']);
        $this->assertCount(0, Notification::all());
    }
}

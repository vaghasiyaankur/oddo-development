<?php

namespace Tests\Feature\Admin\Controllers;

use App\Models\RoomType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoomTypeControllerTest extends TestCase
{
    use RefreshDatabase;

    private $roomtypedetail;

    protected function setUp(): void
    {
        parent::setUp();
        $this->roomtypedetail = RoomType::paginate(10);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_room_type_list()
    {
        $this->adminLogin();
        $response = $this->get(route('roomType.index'));

        $response->assertSee($this->roomtypedetail);

        $response->assertViewIs('admin::roomType.index');
    }

    /**
     * @return void
     */
    public function test_add_room_type()
    {
        $this->adminLogin();
        $response = $this->post(route('add.roomtype'), [
            'roomtype' => 'Doubles',
        ]);

        $roomtype = RoomType::latest('id')->first();
        $this->assertEquals('Doubles', $roomtype->room_type);

        $response->assertStatus(200);
    }

    /**
     *
     * @return void
     */
    public function test_update_room_type()
    {
        $this->adminLogin();

        $response = $this->post(route('update.roomtype', 1), [
            'roomtype' => 'Triples',
        ]);

        $roomtype = RoomType::where('id', 1)->first();
        $this->assertEquals('Triples', $roomtype->room_type);

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_delete_room_type()
    {
        $this->adminLogin();
        $response = $this->post(route('delete.roomtype', 5));

        $roomtype = RoomType::where('id', 5)->count();
        $this->assertEquals(0, $roomtype);

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_change_room_type_status()
    {
        $this->adminLogin();

        $response = $this->post(route('status.roomtype'), [
            'status' => 1,
            'id' => 1,
        ]);

        $roomtype = RoomType::where('id', 1)->first();
        $this->assertEquals(0, $roomtype->status);

        $response->assertStatus(200);
    }
}

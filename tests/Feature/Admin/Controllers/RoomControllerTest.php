<?php

namespace Tests\Feature\Admin\Controllers;

use App\Models\RoomList;
use App\Models\RoomType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoomControllerTest extends TestCase
{
    use RefreshDatabase;

    private $room, $roomLists;

    protected function setUp(): void
    {
        parent::setUp();
        $this->room = RoomType::get();
        $this->roomLists = RoomList::paginate(10);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_room_list()
    {
        $this->adminLogin();
        $response = $this->get(route('room.index'));

        $this->assertNotEmpty($this->room);
        $this->assertNotEmpty($this->roomLists);

        $response->assertViewIs('admin::room.index');
    }

    /**
     *
     * @return void
     */
    public function test_add_room()
    {
        $this->adminLogin();

        $response = $this->post(route('add.room'), [
            'roomName' => 'roomName',
            'roomType' => 1,
        ]);

        $roomlist = RoomList::latest('id')->first();
        $this->assertEquals($roomlist->room_name, 'roomName');

        $response->assertStatus(200);
    }

    /**
     *
     * @return void
     */
    public function test_update_room()
    {
        $this->adminLogin();

        $response = $this->post(route('update.room', 1), [
            'editRoomName' => 'updateRoomName',
            'edtiRoomType' => 1,
        ]);

        $roomlist = RoomList::where('id', 1)->first();
        $this->assertEquals($roomlist->room_name, 'updateRoomName');
        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_delete_room_detail()
    {
        $this->adminLogin();
        $response = $this->post(route('delete.room', 31));

        $roomtype = RoomType::where('id', 31)->count();
        $this->assertEquals(0, $roomtype);

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_change_room_status()
    {
        $this->adminLogin();
        $response = $this->post(route('status.room'), [
            'status' => 1,
            'id' => 1,
        ]);

        $roomlist = RoomList::where('id', 1)->first();
        $this->assertEquals($roomlist->status, 0);

        $response->assertStatus(200);
    }

    /**
     *
     * @return void
     */
    public function test_filter_room()
    {
        $this->adminLogin();
        $response = $this->get(route('room.list'));

        $response->assertViewIs('admin::room.room_list');
    }
}

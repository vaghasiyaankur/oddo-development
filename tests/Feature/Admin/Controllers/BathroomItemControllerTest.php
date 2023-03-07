<?php

namespace Tests\Feature\Admin\Controllers;

use App\Models\BathroomItem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BathroomItemControllerTest extends TestCase
{
    use RefreshDatabase;

    private $items;

    protected function setUp(): void
    {
        parent::setUp();
        $this->items = BathroomItem::latest()->paginate(10);
        $this->adminLogin();
    }

    /**
     * @return void
     */
    public function test_list_bathroom_item_details()
    {
        $response = $this->get(route('bathroomitem.index'));
        $response->assertViewIs('admin::bathroom.index');
        $response->assertSee($this->items);
    }

    /**
     * @return void
     */
    public function test_filter_bathroom_item_list()
    {
        $response = $this->get(route('bathroom.list'));
        $response->assertViewIs('admin::bathroom.bathroomList');
        $response->assertSee($this->items);
    }

    /**
     * @return void
     */
    public function test_add_bathroom_item()
    {
        $response = $this->post(route('add.bathroom'), [
            'item' => 'demo',
            'bathroomIcon' => 'bi-icon',
        ]);

        $bathroomItem = BathroomItem::latest('id')->first();
        $this->assertEquals($bathroomItem->item, 'demo');

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_update_bathroom_item()
    {
        $bathroomItem = BathroomItem::where('id', 1)->first();

        $response = $this->post(route('update.bathroom', $bathroomItem->UUID), [
            'item' => 'dryer',
            'icon' => 'bi-align-start',
        ]);

        $bathroomItem = BathroomItem::where('id', 1)->first();
        $this->assertEquals($bathroomItem->item, 'dryer');

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_change_bathroom_status()
    {
        $bathroomItem = BathroomItem::where('id', 1)->first();
        $response = $this->post(route('status.bathroom'), [
            'status' => '1',
            'id' => $bathroomItem->UUID,
        ]);

        $bathroomItem = BathroomItem::where('id', 1)->first();
        $this->assertEquals($bathroomItem->status, 0);

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_delete_bathroom_item()
    {
        $bathroomItem = BathroomItem::where('id', 1)->first();
        $response = $this->post(route('delete.bathroom', $bathroomItem->UUID));

        $bathroomItemCount = BathroomItem::where('id', 1)->count();
        $this->assertEquals(0, $bathroomItemCount);
        $response->assertStatus(200);
    }

}

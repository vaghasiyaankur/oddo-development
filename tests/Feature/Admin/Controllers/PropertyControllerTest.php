<?php

namespace Tests\Feature\Admin\Controllers;

use App\Models\Hotel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PropertyControllerTest extends TestCase
{
    use RefreshDatabase;

    private $properties;

    protected function setUp(): void
    {
        parent::setUp();
        $this->properties = Hotel::with('propertytype')
            ->select('property_name', 'status', 'star_rating', 'property_id', 'slug', 'id')
            ->paginate(10);

        $this->adminLogin();
    }

    /**
     * @return void
     */
    public function test_list_property_details()
    {
        $response = $this->get(route('property.index'));
        $response->assertViewIs('admin::Properties.index');
    }

    /**
     * @return void
     */
    public function test_filter_property_list()
    {
        $response = $this->get(route('property.list'));
        $response->assertViewIs('admin::Properties.PropertyList');
    }

    /**
     * @return void
     */
    public function test_change_property_status()
    {
        $hotel = Hotel::where('id', 1)->select('id', 'UUID')->first();
        $response = $this->post(route('property.status'), [
            'status' => '1',
            'id' => $hotel->UUID,
        ]);

        $hotel = Hotel::where('id', 1)->first();
        $this->assertEquals($hotel->status, 0);

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_single_property_detail()
    {
        $hotel = Hotel::where('id', 1)->select('id', 'slug')->first();
        $response = $this->get(route('property.single', $hotel->slug));
        $response->assertViewIs('admin::Properties.single-property');
        $response->assertViewHas('hotel');
    }
}

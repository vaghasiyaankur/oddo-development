<?php

namespace Tests\Feature\Admin\Controllers;

use App\Models\Amenities;
use App\Models\AmenitiesCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AmenityControllerTest extends TestCase
{
    use RefreshDatabase;

    private $amenityCategories, $amenities;

    protected function setUp(): void
    {
        parent::setUp();
        $this->amenityCategories = AmenitiesCategory::active()->get();
        $this->amenities = Amenities::get();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_list_of_amenity()
    {
        $this->AdminLogin();
        $response = $this->get(route('amenity.index'));
        $this->assertNotEmpty($this->amenityCategories);
        $this->assertNotEmpty($this->amenities);

        $response->assertViewIs('admin::Amenity.index');
    }

    /**
     *
     * @return void
     */
    public function test_add_amenity_detail()
    {
        $this->adminLogin();
        $response = $this->post(route('add.amenity'), [
            'amenityName' => 'amenity',
            'amenityIcon' => 'amenityIcon',
            'status' => 1,
            'amenityCategory' => 1,
        ]);

        $amenity = Amenities::latest('id')->first();
        $this->assertEquals($amenity->amenities, 'amenity');

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_update_amenity_detail()
    {
        $this->adminLogin();
        $response = $this->post(route('update.amenity', 1), [
            'amenityName' => 'update_amenity_name',
            'amenityIcon' => 'amenity_icon',
            'status' => 1,
            'amenityCategory' => 1,
        ]);

        $amenity = Amenities::where('id', 1)->first();
        $this->assertEquals($amenity->amenities, 'update_amenity_name');

        $response->assertStatus(200);
    }

    /**
     *
     * @return void
     */
    public function test_delete_amenity_detail()
    {
        $this->adminLogin();
        $response = $this->post(route('delete.amenity', 1));

        $amenity = Amenities::where('id', 1)->count();
        $this->assertEquals(0, $amenity);

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_change_amenity_feature_status()
    {
        $this->adminLogin();
        $response = $this->post(route('featured.amenity'), [
            'featured' => 1,
            'id' => 2,
        ]);

        $amenity = Amenities::where('id', 2)->first();
        $this->assertEquals(0, $amenity->featured);

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_amenity_details()
    {
        $this->adminLogin();
        $response = $this->get(route('amenity.list'), [
            'search' => 'Bidet',
        ]);

        $response->assertViewIs('admin::Amenity.amenity_list');
    }
}

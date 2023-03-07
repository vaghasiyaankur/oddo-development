<?php

namespace Tests\Feature\Admin\Controllers;

use App\Models\AmenitiesCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AmenityCategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    private $amenityCategories;

    protected function setUp(): void
    {
        parent::setUp();
        $this->amenityCategories = AmenitiesCategory::latest()->paginate(10);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_list_of_amenity_category()
    {
        $this->adminLogin();
        $response = $this->get(route('amenityCategory.index'));
        $response->assertSee($this->amenityCategories);

        $response->assertViewIs('admin::amenityCategory.index');
    }

    /**
     * @return void
     */
    public function test_create_amenity_category()
    {
        $this->adminLogin();

        $response = $this->post(route('add.amenitycategory', [
            'amenityCategory' => 'add',
        ]));

        $amenityCategory = AmenitiesCategory::latest('id')->first();
        $this->assertEquals('add', $amenityCategory->category);

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_filter_list_of_amenity_category()
    {
        $this->adminLogin();
        $response = $this->get(route('amenitycategory.list'));
        $response->assertSee($this->amenityCategories);

        $response->assertViewIs('admin::amenityCategory.category_list');

    }

    /**
     * @return void
     */
    public function test_update_amenity_category()
    {
        $this->adminLogin();
        $response = $this->post(route('update.amenitycategory', 1), [
            'category' => 'update',
        ]);

        $amenityCategory = AmenitiesCategory::where('id', 1)->first();
        $this->assertEquals('update', $amenityCategory->category);

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_change_amenity_category_status()
    {
        $this->adminLogin();
        $response = $this->post(route('status.amenityCategory'), [
            'status' => 1,
            'id' => 1,
        ]);

        $amenityCategory = AmenitiesCategory::where('id', 1)->first();
        $this->assertEquals(0, $amenityCategory->status);

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_delete_amenity_category()
    {
        $this->adminLogin();
        $response = $this->post(route('delete.amenitycategory', 1));

        $amenityCategory = AmenitiesCategory::where('id', 1)->count();
        $this->assertEquals(0, $amenityCategory);

        $response->assertStatus(200);
    }
}

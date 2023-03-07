<?php

namespace Tests\Feature\Admin\Controllers;

use App\Models\Photocategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PhotoCategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    private $photoCategories;

    protected function setUp(): void
    {
        parent::setUp();
        $this->photoCategories = Photocategory::latest()->paginate(10);
        $this->adminLogin();
    }

    /**
     * @return void
     */
    public function test_list_photo_category_details()
    {
        $response = $this->get(route('photocategory.index'));
        $response->assertViewIs('admin::photoCategory.index');
        $response->assertSee($this->photoCategories);
    }

    /**
     * @return void
     */
    public function test_filter_photo_category_list()
    {
        $response = $this->get(route('photoCategory.list'));
        $response->assertViewIs('admin::photoCategory.photoCategory_list');
        $response->assertSee($this->photoCategories);
    }

    /**
     * @return void
     */
    public function test_add_photo_category()
    {
        $response = $this->post(route('add.photoCategory'), [
            'photoCategory' => 'main',
        ]);

        $photocategory = Photocategory::latest('id')->first();
        $this->assertEquals($photocategory->name, 'main');

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_update_photo_category()
    {
        $response = $this->post(route('update.photoCategory', 1), [
            'photoCategory' => 'hotel view',
        ]);

        $photocategory = Photocategory::where('id', 1)->first();
        $this->assertEquals($photocategory->name, 'hotel view');

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_delete_photo_category()
    {
        $response = $this->post(route('add.photoCategory'), [
            'photoCategory' => 'main',
        ]);

        $photocategory = Photocategory::latest('id')->first();

        $response = $this->post(route('delete.photoCategory', $photocategory->id));

        $photocategoryCount = Photocategory::where('id', $photocategory->id)->count();
        $this->assertEquals(0, $photocategoryCount);
        $response->assertStatus(200);
    }
}

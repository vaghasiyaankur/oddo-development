<?php

namespace Tests\Feature\Admin\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class LocationControllerTest extends TestCase
{
    use RefreshDatabase;

    private $cities;
    private $countries;

    protected function setUp(): void
    {
        parent::setUp();
        $this->cities = City::latest()->get();
        $this->countries = Country::get();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_list_location()
    {
        $this->adminLogin();
        $response = $this->get(route('location.index'));

        $response->assertSee('Add Location');

        $this->assertNotEmpty($this->cities);
        $this->assertNotEmpty($this->countries);

        $response->assertViewIs('admin::location.index');
    }

    /**
     * @return void
     */
    public function test_filter_location()
    {
        $this->adminLogin();
        $response = $this->get(route('location.list'));
        $response->assertViewIs('admin::location.locationList');
    }

    /**
     * @return void
     */
    public function test_add_location()
    {
        $this->withoutExceptionHandling();
        Storage::fake('image');

        $this->adminLogin();

        $file = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAHElEQVQI12P4
        //8/w38GIAXDIBKE0DHxgljNBAAO9TXL0Y4OHwAAAABJRU5ErkJggg==';

        $response = $this->post(route('add.location'), [
            'name' => 'mumbai',
            'file' => $file,
            'country' => 1,
            'status' => 1,
        ]);

        $city = City::latest('id')->first();
        $this->assertEquals('mumbai', $city->name);

        $this->assertDatabaseHas('cities', [
            'name' => 'mumbai',
            'background_image' => $city->background_image,
        ]);

        $response->assertStatus(200);
        $this->assertTrue(Storage::disk('public')->exists($city->background_image));
    }

    /**
     *
     * @return void
     */
    public function test_location_featured()
    {
        $this->adminLogin();

        $city = City::where('id', 1)->first();

        $response = $this->post(route('featured.location'), [
            'featured' => '1',
            'uuId' => $city->UUID,
        ]);

        $city = City::where('id', 1)->first();
        $this->assertEquals(0, $city->featured);

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_delete_location()
    {
        $this->withoutExceptionHandling();
        Storage::fake('image');

        $this->adminLogin();

        $file = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAHElEQVQI12P4
        //8/w38GIAXDIBKE0DHxgljNBAAO9TXL0Y4OHwAAAABJRU5ErkJggg==';

        $response = $this->post(route('add.location'), [
            'name' => 'mumbai',
            'file' => $file,
            'country' => 1,
            'status' => 1,
        ]);

        $city_new = City::latest('id')->first();

        $city = City::where('id', $city_new->id)->first();
        $response = $this->post(route('delete.location', $city->UUID));

        $city = City::where('id', $city_new->id)->count();
        $this->assertEquals($city, 0);

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_update_location()
    {
        $this->adminLogin();

        $city = City::where('id', 1)->first();

        $file = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAHElEQVQI12P4
        //8/w38GIAXDIBKE0DHxgljNBAAO9TXL0Y4OHwAAAABJRU5ErkJggg==';

        $response = $this->post(route('update.location', $city->UUID), [
            'name' => 'dubai',
            'image' => '1',
            'file' => $file,
            'country' => 2,
            'status' => 1,
        ]);

        $city_data = City::where('id', 1)->first();
        $this->assertEquals(2, $city_data->country_id);
        $response->assertStatus(200);
    }
}

<?php

namespace Tests\Feature\Admin\Controllers;

use App\Models\Facilities;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FacilitiesControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_list_of_facilities()
    {
        $this->adminLogin();
        $response = $this->get(route('facilities.index'));

        $facilities = Facilities::count();
        $this->assertNotEquals(0, $facilities);

        $response->assertViewIs('admin::facilities.index');
    }

    /**
     * @return void
     */
    public function test_filter_facilities()
    {

        $this->adminLogin();
        $response = $this->get(route('facilities.list'));

        $facilities = Facilities::count();
        $this->assertNotEquals(0, $facilities);

        $response->assertViewIs('admin::facilities.facilities_list');
    }

    /**
     * @return void
     */
    public function test_add_facility()
    {
        $this->adminLogin();

        $response = $this->post(route('add.facility'), [
            'faclityName' => 'BarData',
            'faclityIcon' => 'bi-icon',
            'facilityColor' => '#000000',
            'facilityDescription' => 'falicityDescription',
        ]);

        $faclity = Facilities::latest('id')->first();
        $this->assertEquals($faclity->facilities_name, 'BarData');

        $response->assertStatus(200);
    }

    /**
     *
     * @return void
     */
    public function test_update_facility()
    {
        $this->adminLogin();
        $response = $this->post(route('update.facility', 1), [
            'editFaclityName' => 'Bars',
            'editFacilityColor' => '#000000',
            'editFaclityIcon' => 'bi-con',
            'editFacilityDescription' => 'editFacilityDescription',
        ]);

        $faclity = Facilities::where('id', 1)->first();
        $this->assertEquals($faclity->facilities_name, 'Bars');

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_delete_facility_detail()
    {
        $this->adminLogin();
        $response = $this->post(route('delete.facility', 1));

        $faclity = Facilities::where('id', 1)->count();
        $this->assertEquals($faclity, 0);

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_facility_status_change()
    {
        $this->adminLogin();
        $response = $this->post(route('status.facility'), [
            'status' => 1,
            'id' => 2,
        ]);

        $faclity = Facilities::where('id', 2)->first();
        $this->assertEquals($faclity->status, 0);

        $response->assertStatus(200);
    }

}

<?php

namespace Tests\Feature\Admin\Controllers;

use App\Models\BedType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BedtypesControllerTest extends TestCase
{

    use RefreshDatabase;

    private $bedTypes;

    protected function setUp(): void
    {
        parent::setUp();
        $this->bedTypes = BedType::latest()->paginate(10);
        $this->adminLogin();
    }

    /**
     * @return void
     */
    public function test_bathroom_item_details()
    {
        $response = $this->get(route('bed.index'));
        $response->assertViewIs('admin::bedType.index');
        $response->assertSee($this->bedTypes);
    }

    /**
     * @return void
     */
    public function test_filter_bathroom_item_list()
    {
        $response = $this->get(route('bedtype.list'));
        $response->assertViewIs('admin::bedType.bedTypeList');
        $response->assertSee($this->bedTypes);
    }

    /**
     * @return void
     */
    public function test_add_bathroom_item()
    {
        $response = $this->post(route('add.bedtype'), [
            'bedtype' => 'single',
            'bedsize' => '153-203 cm wide',
        ]);

        $bedType = BedType::latest('id')->first();
        $this->assertEquals($bedType->bed_type, 'single');

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_change_bathroom_item_status()
    {
        $bedType = BedType::where('id', 1)->first();
        $response = $this->post(route('status.bedtype'), [
            'status' => '1',
            'id' => $bedType->UUID,
        ]);

        $bedType = BedType::where('id', 1)->first();
        $this->assertEquals($bedType->status, 0);

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_delete_bathroom_item_detail()
    {
        $response = $this->post(route('add.bedtype'), [
            'bedtype' => 'single',
            'bedsize' => '153-203 cm wide',
        ]);

        $bedType = BedType::latest('id')->first();

        $response = $this->post(route('delete.bedtype', $bedType->UUID));

        $bathroomItemCount = BedType::where('id', $bedType->id)->count();
        $this->assertEquals(0, $bathroomItemCount);
        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_update_bathroom_item_detail()
    {
        $bedType = BedType::where('id', 1)->first();

        $response = $this->post(route('update.bedtype', $bedType->UUID), [
            'editBedtype' => 'single room',
            'editBedSize' => '96.5-188 cm wide',
        ]);

        $bedType = BedType::where('id', 1)->first();
        $this->assertEquals($bedType->bed_type, 'single room');
        $this->assertEquals($bedType->bed_size, '96.5-188 cm wide');


        $response->assertStatus(200);
    }

}

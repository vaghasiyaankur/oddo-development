<?php

namespace Tests\Feature\Admin\Controllers;

use App\Models\FoodType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FoodTypeControllerTest extends TestCase
{
    use RefreshDatabase;

    private $foodTypes;

    protected function setUp(): void
    {
        parent::setUp();
        $this->foodTypes = FoodType::latest()->paginate(10);
        $this->adminLogin();
    }

    /**
     * @return void
     */
    public function test_list_food_type_details()
    {
        $response = $this->get(route('food.index'));
        $response->assertViewIs('admin::food.index');
        $response->assertSee($this->foodTypes);
    }

    /**
     * @return void
     */
    public function test_filter_food_type_list()
    {
        $response = $this->get(route('food.list'));
        $response->assertViewIs('admin::food.foodList');
        $response->assertSee($this->foodTypes);
    }

    /**
     * @return void
     */
    public function test_add_food_type()
    {
        $response = $this->post(route('add.food'), [
            'food' => 'Chinese',
        ]);

        $food_type = FoodType::latest('id')->first();
        $this->assertEquals($food_type->food_type, 'Chinese');

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_update_food_type()
    {
        $foodType = FoodType::where('id', 1)->first();

        $response = $this->post(route('update.food', $foodType->UUID), [
            'editFood' => 'malaysian',
        ]);

        $foodType = FoodType::where('id', 1)->first();
        $this->assertEquals($foodType->food_type, 'malaysian');

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_change_food_type()
    {
        $food_type = FoodType::where('id', 1)->first();
        $response = $this->post(route('status.food'), [
            'status' => '1',
            'id' => $food_type->UUID,
        ]);

        $food_type = FoodType::where('id', 1)->first();
        $this->assertEquals($food_type->status, 0);

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_delete_bathroom_item()
    {
        $foodType = FoodType::where('id', 1)->first();
        $response = $this->post(route('delete.food', $foodType->UUID));

        $foodTypeCount = FoodType::where('id', 1)->count();
        $this->assertEquals(0, $foodTypeCount);
        $response->assertStatus(200);
    }
}

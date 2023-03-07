<?php

namespace Tests\Feature\Frontend\Controllers;

use App\Models\City;
use App\Models\Partner;
use App\Models\PropertyType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_home_index()
    {
        $cities = City::whereFeatured(1)->active()->get();
        $propertyTypes = PropertyType::active()->get();
        $partners = Partner::get();

        $response = $this->get(route('home.index'), [
            'search' => 'hello',
            'checkIn' => '',
            'checkOut' => '',
            'guest' => '',
            'room' => '',
        ]);

        $response->assertStatus(200);
        $response->assertViewHasAll(['partners', 'cities', 'propertyTypes']);
        $response->assertViewIs('frontend::home.index');
    }
}

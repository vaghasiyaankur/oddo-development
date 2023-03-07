<?php

namespace Tests\Feature\Admin\Controllers;

use Tests\TestCase;

class DashboardControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->AdminLogin();
        $response = $this->get(route('dashboard'));

        $response->assertStatus(200);
    }
}

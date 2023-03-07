<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $data = \App\Models\GeneralSetting::select('site_name')->first();
        $this->assertEquals($data->site_name, 'odda');

        $response = $this->get('/admin/login');

        $response->assertStatus(200);
    }

//     /**
//      * @return void
//      */
//     public function test_check_auth_login_admin()
//     {
//         $response = $this->from(route('dashboard'))->post(route('admin.login'), [
//             'email' => 'admin@example.com',
//             'password' => 'Demo@12345',
//         ]);

//         $response->assertSessionHasNoErrors();

//         $this->assertAuthenticated();
//     }
}

<?php

namespace Tests\Feature\Frontend\Controllers;

use Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * User Login
     *
     * @return void
     */
    public function test_user_login()
    {
        $response = $this->post(route('user.login'), [
            'email' => 'user@example.com',
            'password' => 'Demo@12345',
        ]);

        // $response->assertForbidden();
        $response->assertStatus(200)->assertJson(['success' => 'login successfully.']);
    }

    /**
     * @return void
     */
    public function test_user_log_out()
    {
        $this->userLogin();
        $response = $this->from('/')->get(route('logout.index'));
        $this->assertFalse(Auth::check());
    }
}

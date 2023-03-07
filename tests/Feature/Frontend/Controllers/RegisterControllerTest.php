<?php

namespace Tests\Feature\Frontend\Controllers;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * create user registration
     *
     * @return void
     */
    public function test_register_user()
    {
        $response = $this->post(route('user.register'), [
            'username' => 'abc',
            'lastName' => 'xyz',
            'email' => 'abc@gmail.com',
            'password' => 'Abc@12345',
            'RePassword' => 'Abc@12345',
        ]);

        // $response->assertForbidden();

        $response->assertStatus(200)
            ->assertJson(['success' => 'A verification link has been sent to your email account', 'status' => 1]);

    }
}

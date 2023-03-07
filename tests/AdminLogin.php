<?php
namespace Tests;

trait AdminLogin
{

    public function adminLogin()
    {
        // login
        $response = $this->from(route('dashboard'))->post(route('admin.login'), [
            'email' => 'admin@example.com',
            'password' => 'Demo@12345',
        ]);

        $this->assertAuthenticated();
    }

    public function UserLogin()
    {
        $response = $this->post(route('user.login'), [
            'email' => 'user@example.com',
            'password' => 'Demo@12345',
        ]);

        // $response->assertForbidden();
        $response->assertStatus(200)->assertJson(['success' => 'login successfully.']);
    }
}

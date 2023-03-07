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
}

<?php

namespace Tests\Feature\Admin\Controllers;

use Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login_page()
    {
        $response = $this->get(route('admin.index'));
        $response->assertViewIs('admin::auth.login');
    }

    /**
     * Odda Admin Logout
     *
     * @return void
     */
    public function test_log_out()
    {
        $this->adminLogin();
        $response = $this->from('admin/login')->get(route('admin.logout'));
        $this->assertFalse(Auth::check());
    }
}

<?php

namespace Tests\Feature;

use Tests\TestCase;

class AdminAccessTest extends TestCase
{
    public function test_login_screen_is_available(): void
    {
        $this->get('/login')->assertOk();
    }

    public function test_admin_dashboard_redirects_guests_to_login(): void
    {
        $this->get('/admin/dashboard')->assertRedirect('/login');
    }
}

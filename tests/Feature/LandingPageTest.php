<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LandingPageTest extends TestCase
{
    /** @test */
    public function it_has_application_name()
    {
    	$response = $this->get('/');

    	$response->assertSee('Laravel');
    }

    /** @test */
    public function it_has_login_label()
    {
    	$response = $this->get('/');

    	$response->assertSee('Login');
    }

    /** @test */
    public function it_has_register_label()
    {
    	$response = $this->get('/');

    	$response->assertSee('Register');
    }
}

<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_register()
    {
    	$response = $this->post('/register', [
    		'name' => 'Nasrul Hazim',
    		'email' => 'nhm@gmail.com',
    		'password' => 'secret',
    		'password_confirmation' => 'secret'
    	]);
    	$response->assertStatus(302);
    	$response->assertSee('Redirecting to');

        $this->assertAuthenticated();

        $this->assertDatabaseHas('users', [
	        'email' => 'nhm@gmail.com'
	    ]);
    }

    /** @test */
    public function it_throw_errors_on_invalid_password()
    {
    	$response = $this->post('/register', [
    		'name' => 'Nasrul Hazim',
    		'email' => 'demo@gmail.com',
    		'password' => 'secret',
    		'password_confirmation' => 'password'
    	]);
    	$response->assertSessionHasErrors(['password']);
    	$this->assertDatabaseMissing('users', [
    		'email' => 'demo@gmail.com'
    	]);
    }
}

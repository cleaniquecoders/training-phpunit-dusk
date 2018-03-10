<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
	use RefreshDatabase;

    /** @test */
    public function user_can_login()
    {
    	$user = factory(\App\User::class)->create();

    	$response = $this->post('/login', [
    		'email' => $user->email,
    		'password' => 'secret'
    	]);

    	$response->assertStatus(302);

        $this->assertAuthenticated();
    }

    /** @test */
    public function user_cannot_login()
    {
    	$user = factory(\App\User::class)->create();

    	$response = $this->post('/login', [
    		'email' => $user->email,
    		'password' => 'wrong-password'
    	]);
    	
    	$response->assertSessionHasErrors(['email']);
    }
}

<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Auth\Events\Registered;

class RegisteredEventTest extends TestCase
{
	use RefreshDatabase;

    /** @test */
    public function has_register_event_dispatched()
    {
    	$user = factory(\App\User::class)->create();

    	Event::fake();

    	event(new Registered($user));

    	Event::assertDispatched(Registered::class, function ($e) use ($user) {
            return $e->user->id === $user->id;
        });
    }
}

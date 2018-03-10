<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use App\Mail\Welcome;

class WelcomeMailTest extends TestCase
{
	use RefreshDatabase;
	
    /** @test */
    public function it_can_send_welcome_email_on_new_registration()
    {
    	$user = factory(\App\User::class)->create();

    	Mail::fake();

        Mail::to($user)->send(new Welcome($user));

    	Mail::assertSent(Welcome::class, function ($mail) use ($user) {
            return $mail->user->id === $user->id;
        });
    }
}

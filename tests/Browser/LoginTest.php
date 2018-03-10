<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    /** @test */
    public function can_login()
    {
        $user = factory(\App\User::class)->create();
        $this->browse(function ($browser) use ($user) {
            $browser->visit(new Pages\LoginTest($user));
        });
    }
}

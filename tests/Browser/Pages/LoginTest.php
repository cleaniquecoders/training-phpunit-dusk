<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;
use App\User;

class LoginTest extends BasePage
{
    /**
     * @var \App\User
     */
    public $user;

    /**
     * @param \App\User $user 
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url() 
    {
        return '/login';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $user = $this->user;

        $browser->assertPathIs($this->url())
            ->type('email', $user->email)
            ->type('password', 'secret')
            ->press('Login')
            ->assertPathIs('/home')
            ->pause(3000)
            /**
             * Do Logout
             */
            ->click('#navbarDropdown') // click on dropdown
            ->assertSee('Logout') // see logout label
            ->pause(3000)
            ->clickLink('Logout') // and logout
            ->pause(3000);
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@element' => '#selector',
        ];
    }
}

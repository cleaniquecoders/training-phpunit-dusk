<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PublicPagesTest extends DuskTestCase
{	
    /** @test */
    public function it_has_landing_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new Pages\HomePage());
        });
    }
}

<?php

namespace Tests\Feature;

use Tests\BrowserKitTestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DashboardTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function testItShowsTheUserNameOnNavbar()
    {
        $user = factory(\App\User::class)->create([
            'name' => 'John Doe',
        ]);

        $this->actingAs($user)
             ->visit('/')
             ->see('Olá, John Doe');
    }

    public function testItHidesMenuForGuests()
    {
        $this->visit('/')
             ->dontSee('Principal');
    }
}

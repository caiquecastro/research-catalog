<?php

namespace Tests\Feature;

use App\Research;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\BrowserKitTestCase;

class ResearchesTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function testItCanBeListed()
    {
        $this->actingAs(factory(\App\User::class)->create());

        factory(\App\Research::class, 10)->create();

        $this->get('researches');
        $this->assertViewHas('researches');
    }

    public function testItCanBeCreated()
    {
        $this->actingAs(factory(\App\User::class)->create());

        $this->visit('researches/create')
            ->type('Project X', 'name')
            ->press('Salvar');

        $this->assertEquals(1, Research::count());
        $this->seePageIs('researches/create');
    }
}

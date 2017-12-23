<?php

namespace Tests\Feature;

use App\Research;
use Tests\BrowserKitTestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ResearchesTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function testItCanBeListed()
    {
        factory(\App\Research::class, 10)->create();

        $this->get('researches');
        $this->assertViewHas('researches');
    }

    public function testItCanBeCreated()
    {
        $this->visit('researches/create')
            ->type('Project X', 'name')
            ->press('Salvar');

        $this->assertEquals(1, Research::count());
        $this->seePageIs('researches/create');
    }
}

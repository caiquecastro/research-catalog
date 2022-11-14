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
        $this->actingAs(User::factory()->create());

        Research::factory()->count(10)->create();

        $this->get('researches');
        $this->assertViewHas('researches');
    }

    public function testItCanBeCreated()
    {
        $this->actingAs(User::factory()->create());

        $this->visit('researches/create')
            ->type('Project X', 'name')
            ->press('Salvar');

        $this->assertEquals(1, Research::count());
        $this->seePageIs('researches/create');
    }
}

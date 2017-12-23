<?php

namespace Tests\Feature;

use Tests\BrowserKitTestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProjectTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function testProjectCanBeCreatedByAForm()
    {
        $this->actingAs(factory(\App\User::class)->create());

        $this->get('/projects/create');

        $this->seeStatusCode(200);
    }

    public function testProjectsCanBeListed()
    {
        $this->actingAs(factory(\App\User::class)->create());

        factory(\App\Project::class, 10)->create();

        $this->get('projects');

        $this->assertResponseOk();
        $this->assertViewHas('projects');
    }
}

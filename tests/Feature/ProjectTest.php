<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProjectTest extends TestCase
{
    use DatabaseTransactions;

    public function testItCanBeCreatedByAForm()
    {
        $this->actingAs(factory(\App\User::class)->create());

        $response = $this->get('/projects/create');

        $response->assertStatus(200);
    }

    public function testItRequiresANameToBeCreated()
    {
        $this->actingAs(factory(\App\User::class)->create());

        $response = $this->post('/projects', [
            //
        ]);

        $response->assertSessionHasErrors([
            'name' => 'O campo nome é obrigatório.',
        ]);
    }

    public function testItCanBeListed()
    {
        $this->actingAs(factory(\App\User::class)->create());

        factory(\App\Project::class, 10)->create();

        $response = $this->get('projects');

        $response->assertStatus(200);
        $response->assertViewHas('projects');
    }

    public function testItCanBeDeleted()
    {
        $this->actingAs(factory(\App\User::class)->create());

        $project = factory(\App\Project::class)->create();

        $response = $this->delete('projects/'.$project->id);

        $response->assertRedirect('projects/create');
    }
}

<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use DatabaseTransactions;

    public function testItCanBeCreatedByAForm()
    {
        $this->actingAs(User::factory()->create());

        $response = $this->get('/projects/create');

        $response->assertStatus(200);
    }

    public function testItRequiresANameToBeCreated()
    {
        $this->actingAs(User::factory()->create());

        $response = $this->post('/projects', [
            //
        ]);

        $response->assertSessionHasErrors([
            'name' => 'O campo nome é obrigatório.',
        ]);
    }

    public function testItCanBeListed()
    {
        $this->actingAs(User::factory()->create());

        Project::factory()->count(10)->create();

        $response = $this->get('projects');

        $response->assertStatus(200);
        $response->assertViewHas('projects');
    }

    public function testItCanBeDeleted()
    {
        $this->actingAs(User::factory()->create());

        $project = Project::factory()->create();

        $response = $this->delete('projects/'.$project->id);

        $response->assertRedirect('projects/create');
    }
}

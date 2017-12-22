<?php

namespace Tests\Feature;

use App\Role;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoleTest extends TestCase
{
    use RefreshDatabase;

    public function testRolesCanBeDeleted()
    {
        $role = factory(Role::class)->create();

        $response = $this->delete('roles/' . $role->id);

        $response->assertSessionHas('message', 'Função excluida com sucesso');
        $response->assertRedirect('/roles/create');
        $this->assertCount(0, Role::all());
    }
}

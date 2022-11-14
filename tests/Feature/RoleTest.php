<?php

namespace Tests\Feature;

use App\Role;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\BrowserKitTestCase;

class RoleTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function testRolesCanBeDeleted()
    {
        $this->actingAs(User::factory()->create());

        $role = factory(Role::class)->create();

        $this->delete('roles/'.$role->id);

        $this->assertSessionHas('message', 'Função excluida com sucesso');
        $this->assertRedirectedTo('/roles/create');
        $this->assertCount(0, Role::all());
    }

    public function testRolesCanBeEdited()
    {
        $this->actingAs(User::factory()->create());

        $role = factory(Role::class)->create();

        $this->get('roles/'.$role->id.'/edit');
        $this->see('Editar Função');

        $this->seeStatusCode(200);
    }

    public function testRolesAreListedOnIndex()
    {
        $this->actingAs(User::factory()->create());

        $this->get('roles');

        $this->assertResponseOk();
        $this->assertViewHas('roles');
    }

    public function testShowsSuccessMessageAfterCreateRole()
    {
        $this->actingAs(User::factory()->create());

        $this->visit('/roles/create')
             ->type('Professor', 'name')
             ->press('Salvar');

        $this->see('Função cadastrada com sucesso');
    }
}

<?php

namespace Tests\Feature;

use App\Role;
use Tests\BrowserKitTestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoleTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function testRolesCanBeDeleted()
    {
        $this->actingAs(factory(\App\User::class)->create());

        $role = factory(Role::class)->create();

        $this->delete('roles/'.$role->id);

        $this->assertSessionHas('message', 'Função excluida com sucesso');
        $this->assertRedirectedTo('/roles/create');
        $this->assertCount(0, Role::all());
    }

    public function testRolesCanBeEdited()
    {
        $this->actingAs(factory(\App\User::class)->create());

        $role = factory(Role::class)->create();

        $this->get('roles/'.$role->id.'/edit');
        $this->see('Editar Função');

        $this->seeStatusCode(200);
    }

    public function testRolesAreListedOnIndex()
    {
        $this->actingAs(factory(\App\User::class)->create());

        $this->get('roles');

        $this->assertResponseOk();
        $this->assertViewHas('roles');
    }
}

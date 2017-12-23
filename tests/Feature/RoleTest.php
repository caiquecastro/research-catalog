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
        $role = factory(Role::class)->create();

        $this->delete('roles/'.$role->id);

        $this->assertSessionHas('message', 'Função excluida com sucesso');
        $this->assertRedirectedTo('/roles/create');
        $this->assertCount(0, Role::all());
    }

    public function testRolesCanBeEdited()
    {
        $role = factory(Role::class)->create();

        $this->get('roles/'.$role->id.'/edit');
        $this->see('Editar Função');

        $this->seeStatusCode(200);
    }
}

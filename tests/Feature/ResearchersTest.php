<?php

namespace Tests\Feature;

use Tests\BrowserKitTestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ResearchersTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function testAllResearchersAttributesArePersisted()
    {
        $this->actingAs(factory(\App\User::class)->create());

        $role = factory(\App\Role::class)->create();

        $this->visit('researchers/create')
            ->type('John Doe', 'fullname')
            ->type('1990-06-20', 'birthday')
            ->type('johndoe@email.com', 'email')
            ->type('Brooklin Av.', 'address')
            ->select('M', 'gender')
            ->type('(12) 3636-3636', 'phone')
            ->type('(12) 99212-0505', 'mobile_phone')
            ->select($role->id, 'role_id')
            ->select('active', 'status')
            ->type('2017-12-06', 'admission_date')
            ->press('Salvar');

        $researcher = \App\Researcher::first();

        $this->assertEquals('John Doe', $researcher->fullname);
        $this->assertEquals('1990-06-20', $researcher->birthday);
        $this->assertEquals('johndoe@email.com', $researcher->email);
        $this->assertEquals('Brooklin Av.', $researcher->address);
        $this->assertEquals('M', $researcher->gender);
        $this->assertEquals('(12) 3636-3636', $researcher->phone);
        $this->assertEquals('(12) 99212-0505', $researcher->mobile_phone);
        $this->assertEquals('active', $researcher->status);
        $this->assertEquals('2017-12-06', $researcher->admission_date);
    }

    public function testResearcherCanBeEdited()
    {
        $this->actingAs(factory(\App\User::class)->create());

        $researcher = factory(\App\Researcher::class)->create();

        $this->visit('researchers/'.$researcher->id.'/edit')
            ->type('Jane Doe', 'fullname')
            ->press('Salvar');

        $this->seePageIs('/researchers');
        $this->assertEquals('Jane Doe', $researcher->fresh()->fullname);
    }

    public function testResearcherMustHaveABirthday()
    {
        $this->actingAs(factory(\App\User::class)->create());

        $this->visit('researchers/create')
            ->type('John Doe', 'fullname')
            ->press('Salvar');

        $this->see('O campo data de nascimento é obrigatório.');
    }

    public function testResearcherNameIsPreservedOnInputFieldOnValidationError()
    {
        $this->actingAs(factory(\App\User::class)->create());

        $this->visit('researchers/create')
            ->type('John Doe', 'fullname')
            ->press('Salvar');

        $this->see('John Doe');
    }

    public function testResearcherBirthdayIsPreservedOnInputFieldOnValidationError()
    {
        $this->actingAs(factory(\App\User::class)->create());

        $this->visit('researchers/create')
            ->type('1990-05-01', 'birthday')
            ->press('Salvar');

        $this->see('1990-05-01');
    }

    public function testResearcherMustHaveAnEmail()
    {
        $this->actingAs(factory(\App\User::class)->create());

        $this->visit('researchers/create')
            ->type('John Doe', 'fullname')
            ->type('1990-06-20', 'birthday')
            ->press('Salvar');

        $this->see('O campo e-mail é obrigatório.');
    }

    public function testResearcherMustHaveAnAddress()
    {
        $this->actingAs(factory(\App\User::class)->create());

        $this->visit('researchers/create')
            ->type('John Doe', 'fullname')
            ->type('1990-06-20', 'birthday')
            ->type('johndoe@email.com', 'email')
            ->press('Salvar');

        $this->see('O campo endereço é obrigatório.');
    }

    public function testResearcherAddressIsPreservedOnInputFieldOnValidationError()
    {
        $this->actingAs(factory(\App\User::class)->create());

        $this->visit('researchers/create')
            ->type('Brookling Avenue', 'address')
            ->press('Salvar');

        $this->see('Brookling Avenue');
    }

    public function testResearcherMustHaveAPhoneNumber()
    {
        $this->actingAs(factory(\App\User::class)->create());

        $this->visit('researchers/create')
            ->type('John Doe', 'fullname')
            ->type('1990-06-20', 'birthday')
            ->type('johndoe@email.com', 'email')
            ->type('Brooklin Av.', 'address')
            ->press('Salvar');

        $this->see('O campo telefone é obrigatório.');
    }

    public function testResearcherMustHaveAMobilePhoneNumber()
    {
        $this->actingAs(factory(\App\User::class)->create());

        $this->visit('researchers/create')
            ->type('John Doe', 'fullname')
            ->type('1990-06-20', 'birthday')
            ->type('johndoe@email.com', 'email')
            ->type('Brooklin Av.', 'address')
            ->type('(12) 3636-3636', 'phone')
            ->press('Salvar');

        $this->see('O campo celular é obrigatório.');
    }

    public function testResearcherMustHaveARole()
    {
        $this->actingAs(factory(\App\User::class)->create());

        $this->visit('researchers/create')
            ->type('John Doe', 'fullname')
            ->type('1990-06-20', 'birthday')
            ->type('johndoe@email.com', 'email')
            ->type('Brooklin Av.', 'address')
            ->type('(12) 3636-3636', 'phone')
            ->type('(12) 99212-0505', 'mobile_phone')
            ->press('Salvar');

        $this->see('O campo função é obrigatório.');
    }

    public function testResearcherMustHaveAnAdmissionDate()
    {
        $this->actingAs(factory(\App\User::class)->create());
        $role = factory(\App\Role::class)->create();

        $this->visit('researchers/create')
            ->type('John Doe', 'fullname')
            ->type('1990-06-20', 'birthday')
            ->type('johndoe@email.com', 'email')
            ->type('Brooklin Av.', 'address')
            ->type('(12) 3636-3636', 'phone')
            ->type('(12) 99212-0505', 'mobile_phone')
            ->select($role->id, 'role_id')
            ->press('Salvar');

        $this->see('O campo data de admissão é obrigatório.');
    }
}

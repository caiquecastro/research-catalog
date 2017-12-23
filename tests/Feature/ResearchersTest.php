<?php

namespace Tests\Feature;

use Tests\BrowserKitTestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ResearchersTest extends BrowserKitTestCase
{
    public function testAllResearchersAttributesArePersisted()
    {
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
        $researcher = factory(\App\Researcher::class)->create();

        $this->visit('researchers/' . $researcher->id . '/edit')
            ->type('Jane Doe', 'fullname')
            ->press('Salvar');
    }
}

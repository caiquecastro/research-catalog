<?php

namespace Tests\Feature;

use App\Subject;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\BrowserKitTestCase;

class SubjectsTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function testSubjectsIndexReturnHtmlWhenNotAjax()
    {
        $this->actingAs(User::factory()->create());

        Subject::factory()->count(10)->create();

        $this->get('subjects');

        $this->assertResponseOk();
        $this->assertViewHas('subjects');
    }
}

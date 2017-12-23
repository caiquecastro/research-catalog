<?php

namespace Tests\Feature;

use Tests\BrowserKitTestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SubjectsTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function testSubjectsIndexReturnHtmlWhenNotAjax()
    {
        $this->actingAs(factory(\App\User::class)->create());

        factory(\App\Subject::class, 10)->create();

        $this->get('subjects');

        $this->assertResponseOk();
        $this->assertViewHas('subjects');
    }
}

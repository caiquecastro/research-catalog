<?php

namespace Tests\Feature;

use Tests\BrowserKitTestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubjectsTest extends BrowserKitTestCase
{
    public function testSubjectsIndexReturnHtmlWhenNotAjax()
    {
        factory(\App\Subject::class, 10)->create();

        $this->get('subjects');

        $this->assertResponseOk();
        $this->assertViewHas('subjects');
    }
}

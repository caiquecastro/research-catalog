<?php

namespace Tests\Feature;

use Tests\BrowserKitTestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProjectTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function testProjectCanBeCreatedByAForm()
    {
        $this->get('/projects/create');

        $this->seeStatusCode(200);
    }
}

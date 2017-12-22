<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTest extends TestCase
{
    public function testProjectCanBeCreatedByAForm()
    {
        $response = $this->get('/projects/create');

        $response->assertStatus(200);
    }
}

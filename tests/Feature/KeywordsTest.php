<?php

namespace Tests\Feature;

use Tests\BrowserKitTestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class KeywordsTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function testItShowsAListOfKeywords()
    {
        $this->actingAs(factory(\App\User::class)->create());

        factory(\App\Keyword::class, 10)->create();

        $this->get('keywords');

        $this->assertResponseOk();
        $this->assertViewHas('keywords');
    }
}

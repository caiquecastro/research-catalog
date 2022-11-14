<?php

namespace Tests\Feature;

use App\Keyword;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\BrowserKitTestCase;

class KeywordsTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function testItShowsAListOfKeywords()
    {
        $this->actingAs(User::factory()->create());

        Keyword::factory()->count(10)->create();

        $this->get('keywords');

        $this->assertResponseOk();
        $this->assertViewHas('keywords');
    }
}

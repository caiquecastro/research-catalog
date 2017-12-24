<?php

namespace Tests\Feature;

use Tests\BrowserKitTestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function testUserCanLogin()
    {
        $this->visit('/login');
    }
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\BrowserKitTestCase;

class LoginTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function testUserCanLogin()
    {
        $this->visit('/login')
             ->type('johndoe@example.com', 'email')
             ->type('123456', 'password')
             ->press('Entrar')
             ->see('Credenciais informadas não correspondem com nossos registros.');
    }
}

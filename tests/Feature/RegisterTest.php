<?php

namespace Tests\Feature;

use App\User;
use Tests\BrowserKitTestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegisterTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function testPreventRegisterDuplicatedUserEmail()
    {
        $user = factory(User::class)->create([
            'email' => 'johndoe@example.com',
        ]);

        $this->visit('register')
            ->type('johndoe@example.com', 'email')
            ->press('Cadastre-se')
            ->see('O valor informado para o campo email já está em uso.');
    }

    public function testPreventRegisterUserWithInvalidPassword()
    {
        $this->visit('register')
            ->type('123', 'password')
            ->press('Cadastre-se')
            ->see('O campo senha deve conter no mínimo 6 caracteres.');
    }
}

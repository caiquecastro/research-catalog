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
            ->see('O valor informado para o campo e-mail já está em uso.');
    }

    public function testPreventRegisterUserWithInvalidPassword()
    {
        $this->visit('register')
            ->type('123', 'password')
            ->press('Cadastre-se')
            ->see('O campo senha deve conter no mínimo 6 caracteres.');
    }

    public function testPreventRegisterUserWithInvalidEmail()
    {
        $this->visit('register')
            ->type('a@a', 'email')
            ->press('Cadastre-se')
            ->see('O campo e-mail não contém um endereço de email válido.');
    }

    public function testPreventRegisterUserEmptyName()
    {
        $this->visit('register')
            ->press('Cadastre-se')
            ->see('O campo nome é obrigatório.');
    }
}

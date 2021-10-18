<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthUserTest extends TestCase
{
    public function test_pageLogin()
    {
        //Заходим на страницу авторизации пользователя
        $response=$this->get('/login');
        // Проверка
        $response->assertOK();
    }
    public function test_pageRegister() {
        //Заходим на страницу авторизации пользователя
        $response=$this->get('/registration');
        // Проверка
        $response->assertOK();

    }

    public function test_pageRegister() {
        //Заходим на страницу авторизации пользователя
        $response=$this->get('/project/create');
        // Проверка
        $response->assertOK();

    }
}

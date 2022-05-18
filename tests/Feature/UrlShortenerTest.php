<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UrlShortenerTest extends TestCase
{
    /**
     * Тест ответа главной страницы
     * @return void
     */
    public function test_service()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Проверяем успешную отправку формы
     * @return void
     */
    public function test_created_link()
    {
        $url = "https://youtube.com";
        $res = $this->post('/', ['url' => $url]);

        $res->assertStatus(201);
    }
}

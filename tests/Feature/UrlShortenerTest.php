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
        $link = Link::factory()->create();
        $res = $this->post('/', [
            'source_link' => $link->source_link,
            'key_link' => $link->key_link,
        ]);

        $res->assertStatus(200);
    }
}

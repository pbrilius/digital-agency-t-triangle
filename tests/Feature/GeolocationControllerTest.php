<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GeolocationControllerTest extends TestCase
{
    /**
     * Web solution basic URL QA
     *
     * @return void
     */
    public function testResponseStatusCode()
    {
        $response = $this->get('/web-solution');

        $response->assertStatus(200);
    }
}

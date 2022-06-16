<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CollectionCommandTest extends TestCase
{
    /**
     * A CLI JSON collection test
     *
     * @return void
     */
    public function testJsonCommandCollection()
    {
        $this->artisan('command:collect-json-fields')->assertSuccessful();
    }
}

<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use App\Models\Geolocation as Model;
use Mockery;
use Mockery\MockInterface;

class GeolocationTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testOopInvocation()
    {
        $mock = $this->createMock(Model::class);
        $this->assertIsObject($mock);
    }
}

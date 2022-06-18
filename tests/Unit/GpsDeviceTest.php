<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\GpsDevice;

class GpsDeviceTest extends TestCase
{
    /**
     * OOP on MVC basics
     *
     * @return void
     */
    public function testLinearProcedures()
    {
        $mock = $this->createMock(GpsDevice::class);
        $this->assertIsObject($mock);
    }
}

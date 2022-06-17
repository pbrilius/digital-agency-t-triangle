<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Providers\GpsDevice;

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

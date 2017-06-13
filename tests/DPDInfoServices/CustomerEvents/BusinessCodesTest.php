<?php

namespace Webit\DPDClient\DPDInfoServices\CustomerEvents;

use Webit\DPDClient\DPDInfoServices\AbstractInfoServicesTest;

class BusinessCodesTest extends AbstractInfoServicesTest
{
    /**
     * @test
     */
    public function shouldReturnAllCodes()
    {
        $refCLass = new \ReflectionClass('Webit\DPDClient\DPDInfoServices\CustomerEvents\BusinessCodes');

        $this->assertEquals($refCLass->getConstants(), BusinessCodes::all());
    }

    /**
     * @test
     */
    public function shouldReturnDeliveredCodes()
    {
        $this->assertEquals(14, count(BusinessCodes::delivered()));
    }
}

<?php

namespace Webit\DPDClient\DPDServices\PostalCode;

use Webit\DPDClient\DPDServices\AbstractServicesTest;

class FindPostalCodeResponseV1Test extends AbstractServicesTest
{
    /**
     * @test
     */
    public function testGetters()
    {
       $response = new FindPostalCodeResponseV1('OK');
       $this->assertEquals('OK', $response->status());
    }
}

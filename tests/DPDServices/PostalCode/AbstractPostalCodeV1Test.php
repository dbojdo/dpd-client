<?php

namespace Webit\DPDClient\DPDServices\PostalCode;

use Webit\DPDClient\DPDServices\AbstractServicesTest;

class AbstractPostalCodeV1Test extends AbstractServicesTest
{
    /**
     * @test
     */
    public function testGetters()
    {
        $countryCode = 'PL';
        $zipCode = '32020';

        $postalCode = new ConcretePostalCode($countryCode, $zipCode);

        $this->assertEquals(
            $countryCode, $postalCode->countryCode(),
            $zipCode, $postalCode->zipCode()
        );
    }
}

class ConcretePostalCode extends AbstractPostalCodeV1
{

}

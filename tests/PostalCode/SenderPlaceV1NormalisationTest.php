<?php

namespace Webit\DPDClient\PostalCode;

use Webit\DPDClient\AbstractIntegrationTest;

class SenderPlaceV1NormalisationTest extends AbstractIntegrationTest
{
    /**
     * @test
     * @dataProvider senderPlaces
     *
     * @param SenderPlaceV1 $senderPlace
     * @param $normalisedInput
     */
    public function shouldNormalisePostalCodeV1(SenderPlaceV1 $senderPlace, $normalisedInput)
    {
        $this->assertEquals(
            $normalisedInput,
            $this->normaliser()->normaliseInput($this->randomString(), $senderPlace)
        );
    }

    public function senderPlaces()
    {
        return array(
            array(
                new SenderPlaceV1('PL', '30-020'),
                array(
                    'countryCode' => 'PL',
                    'zipCode' => '30-020'
                )
            )
        );
    }
}

<?php

namespace Webit\DPDClient\DPDServices\PostalCode;

use Webit\DPDClient\DPDServices\AbstractIntegrationTest;

class PostalCodeV1NormalisationTest extends AbstractIntegrationTest
{
    /**
     * @test
     * @dataProvider postalCodes
     *
     * @param PostalCodeV1 $postalCode
     * @param $normalisedInput
     */
    public function shouldNormalisePostalCodeV1(PostalCodeV1 $postalCode, $normalisedInput)
    {
        $this->assertEquals(
            $normalisedInput,
            $this->normaliser()->normaliseInput($this->randomString(), $postalCode)
        );
    }

    public function postalCodes()
    {
        return array(
            array(
                new PostalCodeV1('PL', '30-020'),
                array(
                    'countryCode' => 'PL',
                    'zipCode' => '30-020'
                )
            )
        );
    }
}

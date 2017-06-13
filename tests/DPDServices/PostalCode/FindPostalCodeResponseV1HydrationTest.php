<?php

namespace Webit\DPDClient\DPDServices\PostalCode;

use Webit\DPDClient\DPDServices\AbstractIntegrationTest;

class FindPostalCodeResponseV1HydrationTest extends AbstractIntegrationTest
{
    /**
     * @test
     */
    public function shouldHydrateSoapResponse()
    {
        $arResult = array(
            'return' => array(
                'status' => 'OK'
            )
        );

        $result = $this->arrayToStdClass($arResult);
        $this->assertEquals(
            new FindPostalCodeResponseV1('OK'),
            $this->hydrator()->hydrateResult($result, 'findPostalCodeV1')
        );
    }
}

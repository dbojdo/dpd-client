<?php
/**
 * Created by PhpStorm.
 * User: dbojdo
 * Date: 26/06/2017
 * Time: 15:16
 */

namespace Webit\DPDClient\PostalCode;

use Webit\DPDClient\AbstractIntegrationTest;

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

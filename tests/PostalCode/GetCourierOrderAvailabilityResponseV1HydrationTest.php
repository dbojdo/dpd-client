<?php
/**
 * Created by PhpStorm.
 * User: dbojdo
 * Date: 26/06/2017
 * Time: 16:05
 */

namespace Webit\DPDClient\PostalCode;

use Webit\DPDClient\AbstractIntegrationTest;

class GetCourierOrderAvailabilityResponseV1HydrationTest extends AbstractIntegrationTest
{
    /**
     * @test
     * @dataProvider getCourierAvailabilityResponses
     */
    public function shouldHydrateSoapResponse(array $arSoapResult, $expectedResponse)
    {
        $result = $this->arrayToStdClass($arSoapResult);

        $this->assertEquals(
            $expectedResponse,
            $this->hydrator()->hydrateResult($result, 'getCourierOrderAvailabilityV1')
        );
    }

    public function getCourierAvailabilityResponses()
    {
        return array(
            'valid' => array(
                array(
                    'return' => array(
                        'status' => 'OK',
                        'ranges' => array(
                            array('range' => '12:00-16:00', 'offset' => 240),
                            array('range' => '16:00-20:00', 'offset' => 240)
                        )
                    )
                ),
                new GetCourierOrderAvailabilityResponseV1(
                    'OK',
                    array(
                        new CourierOrderAvailabilityRangeV1(
                            '12:00-16:00',
                            240
                        ),
                        new CourierOrderAvailabilityRangeV1(
                            '16:00-20:00',
                            240
                        )
                    )
                )
            ),
            'valid with extra empty range' => array(
                array(
                    'return' => array(
                        'status' => 'OK',
                        'ranges' => array(
                            array('range' => '12:00-16:00', 'offset' => 240),
                            array('range' => '16:00-20:00', 'offset' => 240),
                            null
                        )
                    )
                ),
                new GetCourierOrderAvailabilityResponseV1(
                    'OK',
                    array(
                        new CourierOrderAvailabilityRangeV1(
                            '12:00-16:00',
                            240
                        ),
                        new CourierOrderAvailabilityRangeV1(
                            '16:00-20:00',
                            240
                        )
                    )
                )
            ),
            'not found' => array(
                array(
                    'return' => array(
                        'status' => 'RANGE_NOT_FOUND',
                        'ranges' => null
                    )
                ),
                new GetCourierOrderAvailabilityResponseV1(
                    'RANGE_NOT_FOUND',
                    array()
                )
            )
        );
    }
}

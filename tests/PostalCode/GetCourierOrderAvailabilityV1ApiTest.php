<?php
/**
 * Created by PhpStorm.
 * User: dbojdo
 * Date: 26/06/2017
 * Time: 16:05
 */

namespace Webit\DPDClient\PostalCode;

use Webit\DPDClient\AbstractApiTest;

class GetCourierOrderAvailabilityV1ApiTest extends AbstractApiTest
{
    /**
     * @var GetCourierOrderAvailabilityV1
     */
    private $getCourierAvailability;

    protected function setUp()
    {
        $this->getCourierAvailability = new GetCourierOrderAvailabilityV1($this->soapExecutor());
    }

    /**
     * @group api
     * @test
     * @dataProvider postCodes
     * @param SenderPlaceV1 $senderPlace
     * @param string $status
     */
    public function shouldGetCourierAvailability(SenderPlaceV1 $senderPlace, $status)
    {
        $result = $this->getCourierAvailability->__invoke(
            $senderPlace,
            $this->authData()
        );

        $this->assertInstanceOf(
            'Webit\DPDClient\PostalCode\GetCourierOrderAvailabilityResponseV1',
            $result
        );

        $this->assertEquals($status, $result->status());

        if ($status == 'OK') {
            foreach ($result->ranges() as $range) {
                $this->assertInstanceOf(
                    'Webit\DPDClient\PostalCode\CourierOrderAvailabilityRangeV1',
                    $range
                );
            }
        }
    }

    public function postCodes()
    {
        return array(
            'valid PL' => array(
                new SenderPlaceV1('PL', '30798'),
                'OK'
            ),
            'valid UK' => array(
                new SenderPlaceV1('GB', 'RM81TF'),
                'RANGE_NOT_FOUND'
            ),
            'invalid UK' => array(
                new SenderPlaceV1('GB', 'RM8 1TF'),
                'WRONG_POSTAL_PATTERN'
            ),
            'invalid country' => array(
                new SenderPlaceV1('XX', 'RM81TF'),
                'NONEXISTING_COUNTRY_CODE'
            )
        );
    }
}

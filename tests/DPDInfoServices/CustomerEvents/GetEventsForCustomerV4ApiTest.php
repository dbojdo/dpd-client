<?php

namespace Webit\DPDClient\DPDInfoServices\CustomerEvents;

use Webit\DPDClient\DPDInfoServices\AbstractApiTest;

/**
 * @group api
 */
class GetEventsForCustomerV4ApiTest extends AbstractApiTest
{
    /** @var GetEventsForCustomerV4 */
    private $getEventsForCustomerV4;

    protected function setUp()
    {
        $this->getEventsForCustomerV4 = new GetEventsForCustomerV4($this->soapExecutor());
    }

    /**
     * @test
     */
    public function shouldGetEventsForCustomer()
    {
        $response = $this->getEventsForCustomerV4->__invoke(
            1000,
            'PL',
            $this->authData()
        );

        $this->assertInstanceOf(
            'Webit\DPDClient\DPDInfoServices\CustomerEvents\CustomerEventsResponseV3',
            $response
        );
    }
}

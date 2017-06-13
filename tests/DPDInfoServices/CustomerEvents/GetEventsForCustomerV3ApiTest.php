<?php

namespace Webit\DPDClient\DPDInfoServices\CustomerEvents;

use Webit\DPDClient\DPDInfoServices\AbstractApiTest;

/**
 * @group api
 */
class GetEventsForCustomerV3ApiTest extends AbstractApiTest
{
    /** @var GetEventsForCustomerV3 */
    private $getEventsForCustomerV3;

    protected function setUp()
    {
        $this->getEventsForCustomerV3 = new GetEventsForCustomerV3($this->soapExecutor());
    }

    /**
     * @test
     */
    public function shouldGetEventsForCustomer()
    {
        $response = $this->getEventsForCustomerV3->__invoke(
            10,
            $this->authData()
        );

        $this->assertInstanceOf(
            'Webit\DPDClient\DPDInfoServices\CustomerEvents\CustomerEventsResponseV2',
            $response
        );
    }
}
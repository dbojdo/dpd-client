<?php

namespace Webit\DPDClient\DPDInfoServices\CustomerEvents;

use Webit\DPDClient\DPDInfoServices\AbstractApiTest;

/**
 * @group api
 */
class GetEventsForCustomerV2ApiTest extends AbstractApiTest
{
    /** @var GetEventsForCustomerV2 */
    private $getEventsForCustomerV2;

    protected function setUp()
    {
        $this->getEventsForCustomerV2 = new GetEventsForCustomerV2($this->soapExecutor());
    }

    /**
     * @test
     */
    public function shouldGetEventsForCustomer()
    {
        $response = $this->getEventsForCustomerV2->__invoke(
            10,
            'PL',
            $this->authData()
        );

        $this->assertInstanceOf(
            'Webit\DPDClient\DPDInfoServices\CustomerEvents\CustomerEventsResponseV1',
            $response
        );
    }
}
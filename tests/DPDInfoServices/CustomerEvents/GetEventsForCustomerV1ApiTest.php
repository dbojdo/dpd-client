<?php

namespace Webit\DPDClient\DPDInfoServices\CustomerEvents;

use Webit\DPDClient\DPDInfoServices\AbstractApiTest;

/**
 * @group api
 */
class GetEventsForCustomerV1ApiTest extends AbstractApiTest
{
    /** @var GetEventsForCustomerV1 */
    private $getEventsForCustomerV1;

    protected function setUp()
    {
        $this->getEventsForCustomerV1 = new GetEventsForCustomerV1($this->soapExecutor());
    }

    /**
     * @test
     */
    public function shouldGetEventsForCustomer()
    {
        $response = $this->getEventsForCustomerV1->__invoke(
            100,
            $this->authData()
        );

        $this->assertInstanceOf(
            'Webit\DPDClient\DPDInfoServices\CustomerEvents\CustomerEventsResponseV1',
            $response
        );
    }
}

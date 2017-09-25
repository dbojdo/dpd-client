<?php

namespace Webit\DPDClient\DPDInfoServices\CustomerEvents;

use Webit\DPDClient\DPDInfoServices\AbstractApiTest;

/**
 * @group api
 */
class GetEventsForWaybillV1ApiTest extends AbstractApiTest
{
    /** @var GetEventsForWaybillV1 */
    private $getEventsForWaybill;

    protected function setUp()
    {
        $this->getEventsForWaybill = new GetEventsForWaybillV1($this->soapExecutor());
    }

    /**
     * @test
     */
    public function shouldGetEventsForWaybill()
    {
        $this->markTestSkipped('java.lang.NullPointerException');
        $response = $this->getEventsForWaybill->__invoke(
            '0000075077195U',
            EventsSelectTypeEnum::onlyLast(),
            'PL',
            $this->authData()
        );

        $this->assertInstanceOf(
            'Webit\DPDClient\DPDInfoServices\CustomerEvents\CustomerEventsResponseV3',
            $response
        );
    }
}

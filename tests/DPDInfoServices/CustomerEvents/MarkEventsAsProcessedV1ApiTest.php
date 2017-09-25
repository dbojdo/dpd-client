<?php

namespace Webit\DPDClient\DPDInfoServices\CustomerEvents;

use Webit\DPDClient\DPDInfoServices\AbstractApiTest;

/**
 * @group api
 */
class MarkEventsAsProcessedV1ApiTest extends AbstractApiTest
{
    /**
     * @var GetEventsForCustomerV4
     */
    private $getEventsForCustomer;

    /**
     * @var MarkEventsAsProcessedV1
     */
    private $markEventsAsProcessed;

    protected function setUp()
    {
        $this->getEventsForCustomer = new GetEventsForCustomerV4($this->soapExecutor());
        $this->markEventsAsProcessed = new MarkEventsAsProcessedV1($this->soapExecutor());
    }

    /**
     * @test
     */
    public function shouldMarkEventsAsProcesses()
    {
        $events = $this->getEventsForCustomer->__invoke(100, 'PL', $this->authData());
        if ($events->count() == 0) {
            $this->assertFalse($this->markEventsAsProcessed->__invoke($events->confirmId(), $this->authData()));
            return;
        }

        $this->assertTrue($this->markEventsAsProcessed->__invoke($events->confirmId(), $this->authData()));
    }
}

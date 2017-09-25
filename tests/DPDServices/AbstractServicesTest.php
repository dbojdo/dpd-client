<?php

namespace Webit\DPDClient\DPDServices;

use Webit\DPDClient\AbstractTest;

abstract class AbstractServicesTest extends AbstractTest
{
    /**
     * @return \Mockery\MockInterface|\Webit\DPDClient\DPDServices\Common\AuthDataV1
     */
    protected function mockAuthData()
    {
        return \Mockery::mock('Webit\DPDClient\DPDServices\Common\AuthDataV1');
    }
}
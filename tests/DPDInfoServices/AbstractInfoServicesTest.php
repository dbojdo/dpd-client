<?php

namespace Webit\DPDClient\DPDInfoServices;

use Webit\DPDClient\AbstractTest;

abstract class AbstractInfoServicesTest extends AbstractTest
{
    /**
     * @return \Mockery\MockInterface|\Webit\DPDClient\DPDInfoServices\Common\AuthDataV1
     */
    protected function mockAuthData()
    {
        return \Mockery::mock('Webit\DPDClient\DPDInfoServices\Common\AuthDataV1');
    }
}
<?php

namespace Webit\DPDClient\DPDServices\Client;

use JMS\Serializer\Serializer;
use Webit\DPDClient\DPDServices\AbstractServicesTest;

class HydratorFactoryTest extends AbstractServicesTest
{
    /**
     * @test
     */
    public function shouldCreateHydrator()
    {
        /** @var Serializer $serializer */
        $serializer = \Mockery::mock('JMS\Serializer\Serializer');

        $hydratorFactory = new HydratorFactory();
        $this->assertInstanceOf('Webit\SoapApi\Hydrator\Hydrator', $hydratorFactory->create($serializer));
    }
}

<?php

namespace Webit\DPDClient\DPDServices\Client;

use JMS\Serializer\Serializer;
use Webit\DPDClient\DPDServices\AbstractServicesTest;

class NormaliserFactoryTest extends AbstractServicesTest
{
    /**
     * @test
     */
    public function shouldBuildNormaliser()
    {
        /** @var Serializer $serializer */
        $serializer = \Mockery::mock('JMS\Serializer\Serializer');

        $normaliserFactory = new NormaliserFactory();
        $this->assertInstanceOf(
            'Webit\SoapApi\Input\InputNormaliser',
            $normaliserFactory->create($serializer)
        );
    }
}

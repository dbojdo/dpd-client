<?php

namespace Webit\DPDClient\DPDServices\Client;

use Webit\DPDClient\DPDServices\AbstractServicesTest;

class SerializerFactoryTest extends AbstractServicesTest
{
    /**
     * @test
     */
    public function shouldCreateSerializer()
    {
        $serializerFactory = new SerializerFactory();

        $this->assertInstanceOf(
            'JMS\Serializer\SerializerInterface',
            $serializerFactory->create()
        );
    }
}

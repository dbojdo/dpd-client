<?php

namespace Webit\DPDClient\Client;

use Webit\DPDClient\AbstractTest;

class SerializerFactoryTest extends AbstractTest
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

<?php
/**
 * Created by PhpStorm.
 * User: dbojdo
 * Date: 06/09/2017
 * Time: 12:34
 */

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

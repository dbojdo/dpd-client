<?php
/**
 * Created by PhpStorm.
 * User: dbojdo
 * Date: 06/09/2017
 * Time: 12:37
 */

namespace Webit\DPDClient\Client;

use JMS\Serializer\Serializer;
use Webit\DPDClient\AbstractTest;

class HydratorFactoryTest extends AbstractTest
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

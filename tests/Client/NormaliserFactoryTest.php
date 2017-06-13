<?php
/**
 * Created by PhpStorm.
 * User: dbojdo
 * Date: 06/09/2017
 * Time: 12:35
 */

namespace Webit\DPDClient\Client;

use JMS\Serializer\Serializer;
use Webit\DPDClient\AbstractTest;

class NormaliserFactoryTest extends AbstractTest
{
    /**
     * @test
     */
    public function shouldBuildNormaliser()
    {
        /** @var Serializer $serializer */
        $serializer = \Mockery::mock('JMS\Serializer\Serializer');

        $normaliserFactory = new NormaliserFactory();
        $this->assertInstanceOf('Webit\SoapApi\Input\InputNormaliser', $normaliserFactory->create($serializer));
    }
}

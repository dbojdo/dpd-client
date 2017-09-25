<?php


namespace Webit\DPDClient\DPDInfoServices;

use JMS\Serializer\Serializer;
use Webit\DPDClient\DPDInfoServices\Client\HydratorFactory;
use Webit\DPDClient\DPDInfoServices\Client\NormaliserFactory;
use Webit\DPDClient\DPDInfoServices\Client\SerializerFactory;
use Webit\SoapApi\Hydrator\Hydrator;
use Webit\SoapApi\Input\InputNormaliser;

abstract class AbstractIntegrationTest extends AbstractInfoServicesTest
{
    /**
     * @return Serializer
     */
    protected function serializer()
    {
        $serializerFactory = new SerializerFactory();
        return $serializerFactory->create();
    }

    /**
     * @param Serializer|null $serializer
     * @return InputNormaliser
     */
    protected function normaliser(Serializer $serializer = null)
    {
        $serializer = $serializer ?: $this->serializer();

        $normaliserFactory = new NormaliserFactory($this->ioDumper());
        return $normaliserFactory->create($serializer);
    }

    /**
     * @param Serializer|null $serializer
     * @return Hydrator
     */
    protected function hydrator(Serializer $serializer = null)
    {
        $serializer = $serializer ?: $this->serializer();

        $hydratorFactory = new HydratorFactory($this->ioDumper());
        return $hydratorFactory->create($serializer);
    }
}

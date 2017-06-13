<?php


namespace Webit\DPDClient\DPDInfoServices;

use JMS\Serializer\Serializer;
use Webit\DPDClient\DPDInfoServices\Client\HydratorFactory;
use Webit\DPDClient\DPDInfoServices\Client\NormaliserFactory;
use Webit\DPDClient\DPDInfoServices\Client\SerializerFactory;
use Webit\SoapApi\Hydrator\Hydrator;
use Webit\SoapApi\Input\InputNormaliser;
use Webit\SoapApi\Util\Dumper\VoidDumper;

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
     * @return NormaliserFactory
     */
    protected function normaliserFactory()
    {
        return new NormaliserFactory($this->ioDumper());
    }

    /**
     * @param Serializer|null $serializer
     * @return InputNormaliser
     */
    protected function normaliser(Serializer $serializer = null)
    {
        $serializer = $serializer ?: $this->serializer();

        return $this->normaliserFactory()->create($serializer);
    }

    /**
     * @return HydratorFactory
     */
    protected function hydratorFactory()
    {
        return new HydratorFactory($this->ioDumper());
    }

    /**
     * @param Serializer|null $serializer
     * @return Hydrator
     */
    protected function hydrator(Serializer $serializer = null)
    {
        $serializer = $serializer ?: $this->serializer();

        return $this->hydratorFactory()->create($serializer);
    }

    protected function ioDumper()
    {
        return new VoidDumper();
    }
}

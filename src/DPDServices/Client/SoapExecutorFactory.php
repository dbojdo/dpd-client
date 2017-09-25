<?php

namespace Webit\DPDClient\DPDServices\Client;

use Webit\SoapApi\Executor\SoapApiExecutorBuilder;

class SoapExecutorFactory
{
    /** @var SerializerFactory */
    private $serializerFactory;

    /** @var NormaliserFactory */
    private $normalizerFactory;

    /** @var HydratorFactory */
    private $hydratorFactory;

    /** @var SoapApiExecutorBuilder */
    private $soapApiExecutorBuilder;

    /**
     * @param SerializerFactory $serializerFactory
     * @param NormaliserFactory $normalizerFactory
     * @param HydratorFactory $hydratorFactory
     * @param SoapApiExecutorBuilder|null $soapApiExecutorBuilder
     */
    public function __construct(
        SerializerFactory $serializerFactory = null,
        NormaliserFactory $normalizerFactory = null,
        HydratorFactory $hydratorFactory = null,
        SoapApiExecutorBuilder $soapApiExecutorBuilder = null
    ) {
        $this->serializerFactory = $serializerFactory ?: new SerializerFactory();
        $this->normalizerFactory = $normalizerFactory ?: new NormaliserFactory();
        $this->hydratorFactory = $hydratorFactory ?: new HydratorFactory();
        $this->soapApiExecutorBuilder = $soapApiExecutorBuilder;
    }

    /**
     * @param string $wsdl
     * @return \Webit\SoapApi\Executor\SoapApiExecutor
     */
    public function create($wsdl)
    {
        $builder = $this->soapApiExecutorBuilder ?: new SoapApiExecutorBuilder();
        $builder->setWsdl($wsdl);

        $serializer = $this->serializerFactory->create();

        $normaliser = $this->normalizerFactory->create($serializer);
        $builder->setInputNormaliser($normaliser);

        $hydrator = $this->hydratorFactory->create($serializer);
        $builder->setHydrator($hydrator);

        return new ExceptionsWrappingExecutor($builder->build());
    }
}

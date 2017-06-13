<?php

namespace Webit\DPDClient\DPDInfoServices\Client;

use Webit\DPDClient\Common\Client\SoapExecutorFactory as BaseSoapExecutorFactory;
use Webit\SoapApi\Executor\SoapApiExecutorBuilder;

class SoapExecutorFactory extends BaseSoapExecutorFactory
{
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
        parent::__construct(
            $serializerFactory ?: new SerializerFactory(),
            $normalizerFactory ?: new NormaliserFactory(),
            $hydratorFactory ?: new HydratorFactory(),
            $soapApiExecutorBuilder
        );
    }

    /**
     * @inheritdoc
     */
    public function create($wsdl)
    {
        return new ExceptionsWrappingExecutor(
            parent::create($wsdl)
        );
    }
}

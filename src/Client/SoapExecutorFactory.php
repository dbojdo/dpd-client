<?php
/**
 * Created by PhpStorm.
 * User: dbojdo
 * Date: 06/09/2017
 * Time: 10:47
 */

namespace Webit\DPDClient\Client;

use Webit\SoapApi\Executor\SoapApiExecutorBuilder;

class SoapExecutorFactory
{
    /**
     * @var SerializerFactory
     */
    private $serializerFactory;

    /**
     * @var NormaliserFactory
     */
    private $normalizerFactory;

    /**
     * @var HydratorFactory
     */
    private $hydratorFactory;

    /**
     * @var SoapApiExecutorBuilder
     */
    private $soapApiExecutorBuilder;

    /**
     * SoapExecutorFactory constructor.
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
     * @param string $env
     * @return \Webit\SoapApi\Executor\SoapApiExecutor
     */
    public function create($env)
    {
        $builder = $this->soapApiExecutorBuilder ?: new SoapApiExecutorBuilder();
        $builder->setWsdl(ClientEnvironments::wsdl($env));

        $serializer = $this->serializerFactory->create();

        $normaliser = $this->normalizerFactory->create($serializer);
        $builder->setInputNormaliser($normaliser);

        $hydrator = $this->hydratorFactory->create($serializer);
        $builder->setHydrator($hydrator);

        return $builder->build();
    }
}

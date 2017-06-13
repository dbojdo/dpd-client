<?php

namespace Webit\DPDClient\DPDServices\Client;

use Webit\DPDClient\DPDServices\AbstractServicesTest;
use Webit\SoapApi\Executor\SoapApiExecutorBuilder;

class SoapExecutorFactoryTest extends AbstractServicesTest
{
    /** @var \Mockery\MockInterface|\Webit\DPDClient\DPDServices\Client\SerializerFactory */
    private $serializerFactory;

    /** @var \Mockery\MockInterface|\Webit\DPDClient\DPDServices\Client\NormaliserFactory */
    private $normaliserFactory;

    /** @var \Mockery\MockInterface|\Webit\DPDClient\DPDServices\Client\HydratorFactory */
    private $hydratorFactory;

    /** @var SoapApiExecutorBuilder */
    private $soapApiExecutorBuilder;

    /** @var SoapExecutorFactory */
    private $soapExecutorFactory;

    protected function setUp()
    {
        $this->serializerFactory = \Mockery::mock('Webit\DPDClient\DPDServices\Client\SerializerFactory');
        $this->normaliserFactory = \Mockery::mock('Webit\DPDClient\DPDServices\Client\NormaliserFactory');
        $this->hydratorFactory = \Mockery::mock('Webit\DPDClient\DPDServices\Client\HydratorFactory');
        $this->soapApiExecutorBuilder = \Mockery::mock('Webit\SoapApi\Executor\SoapApiExecutorBuilder');
        $this->soapExecutorFactory = new SoapExecutorFactory(
            $this->serializerFactory,
            $this->normaliserFactory,
            $this->hydratorFactory,
            $this->soapApiExecutorBuilder
        );
    }

    /**
     * @test
     */
    public function shouldCreateSoapExecutor()
    {
        $wsdl = __DIR__ . '/dpd.wsdl';

        $serializer = \Mockery::mock('\JMS\Serializer\Serializer');
        $this->serializerFactory->shouldReceive('create')->andReturn($serializer)->once();

        $normaliser = \Mockery::mock('Webit\SoapApi\Input\InputNormaliser');
        $this->normaliserFactory->shouldReceive('create')->with($serializer)->andReturn($normaliser)->once();

        $hydrator = \Mockery::mock('Webit\SoapApi\Hydrator\Hydrator');
        $this->hydratorFactory->shouldReceive('create')->with($serializer)->andReturn($hydrator)->once();

        $this->soapApiExecutorBuilder->shouldReceive('setWsdl')->with($wsdl)->once();
        $this->soapApiExecutorBuilder->shouldReceive('setInputNormaliser')->with($normaliser)->once();
        $this->soapApiExecutorBuilder->shouldReceive('setHydrator')->with($hydrator)->once();


        $executor = \Mockery::mock('Webit\SoapApi\Executor\SoapApiExecutor');
        $this->soapApiExecutorBuilder->shouldReceive('build')->andReturn($executor)->once();

        $this->assertInstanceOf(
            'Webit\DPDClient\DPDServices\Client\ExceptionsWrappingExecutor',
            $this->soapExecutorFactory->create($wsdl)
        );
    }
}

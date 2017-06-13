<?php

namespace Webit\DPDClient\DPDServices\Client;

use Webit\DPDClient\DPDServices\AbstractServicesTest;
use Webit\DPDClient\DPDServices\Common\AuthDataV1;

class ClientFactoryTest extends AbstractServicesTest
{
    /** @var SoapExecutorFactory|\Mockery\MockInterface */
    private $soapExecutorFactory;

    /** @var ClientFactory */
    protected $clientFactory;

    protected function setUp()
    {
        $this->soapExecutorFactory = \Mockery::mock('Webit\DPDClient\DPDServices\Client\SoapExecutorFactory');
        $this->clientFactory = new ClientFactory($this->soapExecutorFactory);
    }

    /**
     * @test
     */
    public function shouldBuildClient()
    {
        $authData = new AuthDataV1($this->randomString(), $this->randomString(), $this->randomPositiveInt());
        $env = ClientEnvironments::TEST;

        $soapExecutor = \Mockery::mock('Webit\SoapApi\Executor\SoapApiExecutor');
        $this->soapExecutorFactory->shouldReceive('create')->with($env)->andReturn($soapExecutor)->once();
        $this->assertInstanceOf('Webit\DPDClient\DPDServices\Client',  $this->clientFactory->create($authData, $env));
    }
}

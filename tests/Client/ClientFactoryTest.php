<?php

namespace Webit\DPDClient\Client;

use Webit\DPDClient\AbstractTest;
use Webit\DPDClient\Common\AuthDataV1;

class ClientFactoryTest extends AbstractTest
{
    /** @var SoapExecutorFactory|\Mockery\MockInterface */
    private $soapExecutorFactory;

    /** @var ClientFactory */
    protected $clientFactory;

    protected function setUp()
    {
        $this->soapExecutorFactory = \Mockery::mock('Webit\DPDClient\Client\SoapExecutorFactory');
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
        $this->assertInstanceOf('Webit\DPDClient\Client',  $this->clientFactory->create($authData, $env));
    }
}

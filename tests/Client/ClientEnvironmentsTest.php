<?php

namespace Webit\DPDClient\Client;

use Webit\DPDClient\AbstractTest;

class ClientEnvironmentsTest extends AbstractTest
{
    /**
     * @test
     */
    public function shouldListSupportedEnvironments()
    {
        $this->assertInternalType('array', ClientEnvironments::supportedEnvironments());
    }

    /**
     * @test
     */
    public function shouldCheckIfEnvironmentIsSupported()
    {
        $this->assertTrue(ClientEnvironments::isSupported(ClientEnvironments::TEST));
        $this->assertFalse(ClientEnvironments::isSupported($this->randomString()));
    }

    /**
     * @test
     */
    public function shouldGetWsdlForSupportedEnvironment()
    {
        $this->assertInternalType('string', ClientEnvironments::wsdl(ClientEnvironments::PROD));
    }

    /**
     * @test
     * @expectedException \Webit\DPDClient\Client\UnsupportedClientEnvironmentException
     */
    public function shouldThrowExceptionWhenAskForWsdlForUnsupportedEnvironment()
    {
        ClientEnvironments::wsdl($this->randomString());
    }
}

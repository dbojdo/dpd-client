<?php

namespace Webit\DPDClient\DPDServices\Client;

use Webit\DPDClient\DPDServices\AbstractServicesTest;

class ClientEnvironmentsTest extends AbstractServicesTest
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
     * @expectedException \Webit\DPDClient\DPDServices\Client\UnsupportedClientEnvironmentException
     */
    public function shouldThrowExceptionWhenAskForWsdlForUnsupportedEnvironment()
    {
        ClientEnvironments::wsdl($this->randomString());
    }
}

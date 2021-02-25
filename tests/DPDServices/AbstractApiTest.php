<?php

namespace Webit\DPDClient\DPDServices;

use Webit\DPDClient\DPDServices\Client\ClientEnvironments;
use Webit\DPDClient\DPDServices\Client\SoapExecutorFactory;
use Webit\DPDClient\DPDServices\Common\AuthDataV1;
use Webit\DPDClient\DPDServices\PackagesGeneration\OpenUMLF\OpenUMLFV1;
use Webit\DPDClient\DPDServices\PackagesGeneration\OpenUMLF\OpenUMLFV2;
use Webit\DPDClient\DPDServices\PackagesGeneration\OpenUMLF\Services;
use Webit\SoapApi\Util\Dumper\PhpFileDumper;
use Webit\SoapApi\Util\Dumper\StaticNameGenerator;
use Webit\SoapApi\Util\Dumper\VoidDumper;

abstract class AbstractApiTest extends AbstractIntegrationTest
{
    const DPD_MAX_INT = '2147483647';

    /**
     * @return \Webit\SoapApi\Executor\SoapApiExecutor
     */
    protected function soapExecutor()
    {
        $factory = new SoapExecutorFactory(
            null,
            $this->normaliserFactory(),
            $this->hydratorFactory()
        );

        return $factory->create(
            $this->getEnv('dpd.wsdl') ?: ClientEnvironments::wsdl(ClientEnvironments::TEST)
        );
    }

    /**
     * @return AuthDataV1
     * @throw \PHPUnit_Framework_SkippedTestError
     */
    protected function authData()
    {
        $authData = new AuthDataV1(
            $this->getEnv('dpd.login'),
            $this->getEnv('dpd.password'),
            $this->getEnv('dpd.fid')
        );

        if (!$this->isAuthDataSet($authData)) {
            $this->markTestSkipped(
                'The dpd.login or the dpd.password is not set. Change your phpunit.xml settings.'
            );
        }

        if ($authData->masterFid() == 0) {
            $this->markTestSkipped('The dpd.fid is not set. Change your phpunit.xml settings.');
        }

        return $authData;
    }

    /**
     * @param $key
     * @return null
     */
    private function getEnv($key)
    {
        return isset($_ENV[$key]) ? $_ENV[$key] : null;
    }

    /**
     * @param AuthDataV1 $authData
     * @return bool
     */
    private function isAuthDataSet(AuthDataV1 $authData)
    {
        return !in_array('changeme', array($authData->login(), $authData->password()))
            && $authData->login()
            && $authData->password();
    }

    /**
     * @param bool $multiplePackages
     * @param bool $multipleParcels
     * @param Services|null $services
     * @param int $senderFid
     * @return OpenUMLFV1
     */
    protected function generateOpenUmlf($multiplePackages, $multipleParcels, Services $services = null, $senderFid = null)
    {
        return parent::generateOpenUmlf($multiplePackages, $multipleParcels, $services, $this->authData()->masterFid());
    }

    /**
     * @param bool $multiplePackages
     * @param bool $multipleParcels
     * @param Services|null $services
     * @param string $customer
     * @param int $senderFid
     * @return OpenUMLFV2
     */
    protected function generateOpenUmlfV2($multiplePackages, $multipleParcels, Services $services = null, $customer = null, $senderFid = null)
    {
        return parent::generateOpenUmlfV2($multiplePackages, $multipleParcels, $services, $customer, $this->authData()->masterFid());
    }

    protected function ioDumper()
    {
        $dir = $this->ioDumperDir();
        if (!$dir) {
            return new VoidDumper();
        }
        return new PhpFileDumper(
            $dir,
            new StaticNameGenerator('SoapIoDump-'.self::$runId)
        );
    }
}

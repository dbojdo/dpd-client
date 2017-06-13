<?php
/**
 * Created by PhpStorm.
 * User: dbojdo
 * Date: 26/06/2017
 * Time: 15:27
 */

namespace Webit\DPDClient;

use Webit\DPDClient\Common\AuthDataV1;
use Webit\SoapApi\Executor\SoapApiExecutorBuilder;

abstract class AbstractApiTest extends AbstractIntegrationTest
{
    const DPD_MAX_INT = '2147483647';

    /**
     * @return \Webit\SoapApi\Executor\SoapApiExecutor
     */
    protected function soapExecutor()
    {
        $builder = new SoapApiExecutorBuilder();
        $builder->setWsdl(
            'https://dpdservicesdemo.dpd.com.pl/DPDPackageObjServicesService/DPDPackageObjServices?wsdl'
        );

        $serializer = $this->serializer();

        $normaliser = $this->normaliser($serializer);
        $builder->setInputNormaliser($normaliser);

        $hydrator = $this->hydrator($serializer);
        $builder->setHydrator($hydrator);

        return $builder->build();
    }

    /**
     * @return AuthDataV1
     * @throw \PHPUnit_Framework_SkippedTestError
     */
    protected function authData()
    {
        $authData = new AuthDataV1($_ENV['dpd.login'], $_ENV['dpd.password'], $_ENV['dpd.fid']);

        if (in_array('changeme', array($authData->login(), $authData->password()))) {
            $this->markTestSkipped(
                'The dpd.login or the dpd.password is not set. Change your phpunit.xml settings.'
            );
        }

        if ($authData->masterFid() == 0) {
            $this->markTestSkipped('The dpd.fid is not set. Change your phpunit.xml settings.');
        }

        return $authData;
    }
}

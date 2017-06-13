<?php
/**
 * Created by PhpStorm.
 * User: dbojdo
 * Date: 06/09/2017
 * Time: 11:24
 */

namespace Webit\DPDClient;

use Webit\DPDClient\Common\AuthDataV1;

use Webit\DPDClient\Common\OutputDocFormatDSPEnumV1;
use Webit\DPDClient\Common\OutputDocPageFormatDSPEnumV1;
use Webit\DPDClient\DPDParcelBusinessEvent\DPDParcelBusinessEventV1;
use Webit\DPDClient\DPDPickupCallParams\DpdPickupCallParamsV1;
use Webit\DPDClient\DPDPickupCallParams\DpdPickupCallParamsV2;
use Webit\DPDClient\DPDPickupCallParams\DpdPickupCallParamsV3;
use Webit\DPDClient\DPDServicesParams\DPDServicesParamsV1;
use Webit\DPDClient\PackagesGeneration\OpenUMLF\OpenUMLF;
use Webit\DPDClient\PackagesGeneration\PkgNumsGenerationPolicyEnumV1;
use Webit\DPDClient\PostalCode\PostalCodeV1;
use Webit\DPDClient\PostalCode\SenderPlaceV1;

class ClientTest extends AbstractTest
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var \Mockery\MockInterface[]|object[]
     */
    private $methods = array();

    /**
     * @var AuthDataV1
     */
    private $authData;

    protected function setUp()
    {
        $this->methods = array(
            'findPostalCodeV1' => \Mockery::mock('Webit\DPDClient\PostalCode\FindPostalCodeV1'),
            'getCourierOrderAvailability' => \Mockery::mock('Webit\DPDClient\PostalCode\GetCourierOrderAvailabilityV1'),
            'generatePackagesNumbersV1' => \Mockery::mock('Webit\DPDClient\PackagesGeneration\GeneratePackagesNumbersV1'),
            'generateSpedLabelsV1' => \Mockery::mock('Webit\DPDClient\DocumentGeneration\GenerateSpedLabelsV1'),
            'generateProtocolV1' => \Mockery::mock('Webit\DPDClient\DocumentGeneration\GenerateProtocolV1'),
            'packagesPickupCallV1' => \Mockery::mock('Webit\DPDClient\PackagesPickupCall\PackagesPickupCallV1'),
            'packagesPickupCallV2' => \Mockery::mock('Webit\DPDClient\PackagesPickupCall\PackagesPickupCallV2'),
            'packagesPickupCallV3' => \Mockery::mock('Webit\DPDClient\PackagesPickupCall\PackagesPickupCallV3'),
            'importDeliveryBusinessEvent' => \Mockery::mock('Webit\DPDClient\ImportDeliveryBusinessEvent\ImportDeliveryBusinessEvent')
        );

        $this->authData = new AuthDataV1('login', 'password', 123);

        $this->client = new Client(
            $this->methods['findPostalCodeV1'],
            $this->methods['getCourierOrderAvailability'],
            $this->methods['generatePackagesNumbersV1'],
            $this->methods['generateSpedLabelsV1'],
            $this->methods['generateProtocolV1'],
            $this->methods['packagesPickupCallV1'],
            $this->methods['packagesPickupCallV2'],
            $this->methods['packagesPickupCallV3'],
            $this->methods['importDeliveryBusinessEvent'],
            $this->authData
        );
    }

    /**
     * @test
     */
    public function shouldFindPostalCode()
    {
        /** @var PostalCodeV1 $postalCode */
        $postalCode = \Mockery::mock('Webit\DPDClient\PostalCode\PostalCodeV1');

        $response = \Mockery::mock('Webit\DPDClient\PostalCode\FindPostalCodeResponseV1');
        $this->methods['findPostalCodeV1']
            ->shouldReceive('__invoke')
            ->with($postalCode, $this->authData)
            ->andReturn($response);

        $this->assertSame($response, $this->client->findPostalCodeV1($postalCode));
    }

    /**
     * @test
     */
    public function shouldGetCourierOrderAvailability()
    {
        /** @var SenderPlaceV1 $senderPlace */
        $senderPlace = \Mockery::mock('Webit\DPDClient\PostalCode\SenderPlaceV1');

        $response = \Mockery::mock('Webit\DPDClient\PostalCode\GetCourierOrderAvailabilityResponseV1');
        $this->methods['getCourierOrderAvailability']
            ->shouldReceive('__invoke')
            ->with($senderPlace, $this->authData)
            ->andReturn($response);

        $this->assertSame($response, $this->client->getCourierOrderAvailability($senderPlace));
    }

    /**
     * @test
     */
    public function shouldGeneratePackagesNumbersV1()
    {
        /** @var OpenUMLF $openUMLF */
        $openUMLF = \Mockery::mock('Webit\DPDClient\PackagesGeneration\OpenUMLF\OpenUMLF');
        $policy = PkgNumsGenerationPolicyEnumV1::STOP_ON_FIRST_ERROR;

        $response = \Mockery::mock('Webit\DPDClient\PackagesGeneration\PackagesGenerationResponseV1');
        $this->methods['generatePackagesNumbersV1']
            ->shouldReceive('__invoke')
            ->with($openUMLF, $policy, $this->authData)
            ->andReturn($response);

        $this->assertSame($response, $this->client->generatePackagesNumbersV1($openUMLF, $policy));
    }

    /**
     * @test
     */
    public function shouldGenerateSpedLabelsV1()
    {
        /** @var DPDServicesParamsV1 $params */
        $params = \Mockery::mock('Webit\DPDClient\DPDServicesParams\DPDServicesParamsV1');
        $outputFormat = OutputDocFormatDSPEnumV1::PDF;
        $outputPageFormat = OutputDocPageFormatDSPEnumV1::LBL_PRINTER;

        $response = \Mockery::mock('Webit\DPDClient\DocumentGeneration\DocumentGenerationResponseV1');
        $this->methods['generateSpedLabelsV1']
            ->shouldReceive('__invoke')
            ->with($params, $outputFormat, $outputPageFormat, $this->authData)
            ->andReturn($response);

        $this->assertSame($response, $this->client->generateSpedLabelsV1($params, $outputFormat, $outputPageFormat));
    }

    /**
     * @test
     */
    public function shouldGenerateProtocolV1()
    {
        /** @var DPDServicesParamsV1 $params */
        $params = \Mockery::mock('Webit\DPDClient\DPDServicesParams\DPDServicesParamsV1');
        $outputFormat = OutputDocFormatDSPEnumV1::PDF;
        $outputPageFormat = OutputDocPageFormatDSPEnumV1::LBL_PRINTER;

        $response = \Mockery::mock('Webit\DPDClient\DocumentGeneration\DocumentGenerationResponseV1');
        $this->methods['generateProtocolV1']
            ->shouldReceive('__invoke')
            ->with($params, $outputFormat, $outputPageFormat, $this->authData)
            ->andReturn($response);

        $this->assertSame($response, $this->client->generateProtocolV1($params, $outputFormat, $outputPageFormat));
    }

    /**
     * @test
     */
    public function shouldPackagesPickupCallV1()
    {
        /** @var DpdPickupCallParamsV1 $params */
        $params = \Mockery::mock('Webit\DPDClient\DPDPickupCallParams\DpdPickupCallParamsV1');

        $response = \Mockery::mock('\Webit\DPDClient\PackagesPickupCall\PackagesPickupCallResponseV1');
        $this->methods['packagesPickupCallV1']
            ->shouldReceive('__invoke')
            ->with($params, $this->authData)
            ->andReturn($response);

        $this->assertSame($response, $this->client->packagesPickupCallV1($params));
    }

    /**
     * @test
     */
    public function shouldPackagesPickupCallV2()
    {
        /** @var DpdPickupCallParamsV2 $params */
        $params = \Mockery::mock('Webit\DPDClient\DPDPickupCallParams\DpdPickupCallParamsV2');

        $response = \Mockery::mock('\Webit\DPDClient\PackagesPickupCall\PackagesPickupCallResponseV2');
        $this->methods['packagesPickupCallV2']
            ->shouldReceive('__invoke')
            ->with($params, $this->authData)
            ->andReturn($response);

        $this->assertSame($response, $this->client->packagesPickupCallV2($params));
    }

    /**
     * @test
     */
    public function shouldPackagesPickupCallV3()
    {
        /** @var DpdPickupCallParamsV3 $params */
        $params = \Mockery::mock('Webit\DPDClient\DPDPickupCallParams\DpdPickupCallParamsV3');

        $response = \Mockery::mock('\Webit\DPDClient\PackagesPickupCall\PackagesPickupCallResponseV3');
        $this->methods['packagesPickupCallV3']
            ->shouldReceive('__invoke')
            ->with($params, $this->authData)
            ->andReturn($response);

        $this->assertSame($response, $this->client->packagesPickupCallV3($params));
    }

    /**
     * @test
     */
    public function shouldImportDeliveryBusinessEvent()
    {
        /** @var DPDParcelBusinessEventV1 $businessEvent */
        $businessEvent = \Mockery::mock('\Webit\DPDClient\DPDParcelBusinessEvent\DPDParcelBusinessEventV1');

        $response = \Mockery::mock('Webit\DPDClient\ImportDeliveryBusinessEvent\ImportDeliveryBusinessEventResponseV1');
        $this->methods['importDeliveryBusinessEvent']
            ->shouldReceive('__invoke')
            ->with($businessEvent, $this->authData)
            ->andReturn($response);

        $this->assertSame($response, $this->client->importDeliveryBusinessEvent($businessEvent));
    }
}

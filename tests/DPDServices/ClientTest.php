<?php

namespace Webit\DPDClient\DPDServices;

use Webit\DPDClient\DPDServices\Common\AuthDataV1;
use Webit\DPDClient\DPDServices\DocumentGeneration\OutputDocFormatDSPEnumV1;
use Webit\DPDClient\DPDServices\DocumentGeneration\OutputDocPageFormatDSPEnumV1;
use Webit\DPDClient\DPDServices\DocumentGeneration\OutputLabelTypeEnumV2;
use Webit\DPDClient\DPDServices\DPDParcelBusinessEvent\DPDParcelBusinessEventV1;
use Webit\DPDClient\DPDServices\DPDPickupCallParams\DpdPickupCallParamsV1;
use Webit\DPDClient\DPDServices\DPDPickupCallParams\DpdPickupCallParamsV2;
use Webit\DPDClient\DPDServices\DPDPickupCallParams\DpdPickupCallParamsV3;
use Webit\DPDClient\DPDServices\DPDServicesParams\DPDServicesParamsV1;
use Webit\DPDClient\DPDServices\PackagesGeneration\OpenUMLF\OpenUMLFV1;
use Webit\DPDClient\DPDServices\PackagesGeneration\OpenUMLF\OpenUMLFV2;
use Webit\DPDClient\DPDServices\PackagesGeneration\PkgNumsGenerationPolicyEnumV1;
use Webit\DPDClient\DPDServices\PostalCode\PostalCodeV1;
use Webit\DPDClient\DPDServices\PostalCode\SenderPlaceV1;

class ClientTest extends AbstractServicesTest
{
    /** @var Client */
    private $client;

    /** @var \Mockery\MockInterface[]|object[] */
    private $methods = array();

    /** @var AuthDataV1 */
    private $authData;

    protected function setUp()
    {
        $this->methods = array(
            'findPostalCodeV1' => \Mockery::mock('Webit\DPDClient\DPDServices\PostalCode\FindPostalCodeV1'),
            'getCourierOrderAvailability' => \Mockery::mock('Webit\DPDClient\DPDServices\PostalCode\GetCourierOrderAvailabilityV1'),
            'generatePackagesNumbersV1' => \Mockery::mock('Webit\DPDClient\DPDServices\PackagesGeneration\GeneratePackagesNumbersV1'),
            'generatePackagesNumbersV2' => \Mockery::mock('Webit\DPDClient\DPDServices\PackagesGeneration\GeneratePackagesNumbersV2'),
            'generatePackagesNumbersV3' => \Mockery::mock('Webit\DPDClient\DPDServices\PackagesGeneration\GeneratePackagesNumbersV3'),
            'generateSpedLabelsV1' => \Mockery::mock('Webit\DPDClient\DPDServices\DocumentGeneration\GenerateSpedLabelsV1'),
            'generateSpedLabelsV2' => \Mockery::mock('Webit\DPDClient\DPDServices\DocumentGeneration\GenerateSpedLabelsV2'),
            'generateProtocolV1' => \Mockery::mock('Webit\DPDClient\DPDServices\DocumentGeneration\GenerateProtocolV1'),
            'packagesPickupCallV1' => \Mockery::mock('Webit\DPDClient\DPDServices\PackagesPickupCall\PackagesPickupCallV1'),
            'packagesPickupCallV2' => \Mockery::mock('Webit\DPDClient\DPDServices\PackagesPickupCall\PackagesPickupCallV2'),
            'packagesPickupCallV3' => \Mockery::mock('Webit\DPDClient\DPDServices\PackagesPickupCall\PackagesPickupCallV3'),
            'importDeliveryBusinessEvent' => \Mockery::mock('Webit\DPDClient\DPDServices\ImportDeliveryBusinessEvent\ImportDeliveryBusinessEvent')
        );

        $this->authData = new AuthDataV1('login', 'password', 123);

        $this->client = new Client(
            $this->methods['findPostalCodeV1'],
            $this->methods['getCourierOrderAvailability'],
            $this->methods['generatePackagesNumbersV1'],
            $this->methods['generatePackagesNumbersV2'],
            $this->methods['generatePackagesNumbersV3'],
            $this->methods['generateSpedLabelsV1'],
            $this->methods['generateSpedLabelsV2'],
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
        $postalCode = \Mockery::mock('Webit\DPDClient\DPDServices\PostalCode\PostalCodeV1');

        $response = \Mockery::mock('Webit\DPDClient\DPDServices\PostalCode\FindPostalCodeResponseV1');
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
        $senderPlace = \Mockery::mock('Webit\DPDClient\DPDServices\PostalCode\SenderPlaceV1');

        $response = \Mockery::mock('Webit\DPDClient\DPDServices\PostalCode\GetCourierOrderAvailabilityResponseV1');
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
        /** @var OpenUMLFV1 $openUMLF */
        $openUMLF = \Mockery::mock('Webit\DPDClient\DPDServices\PackagesGeneration\OpenUMLF\OpenUMLFV1');
        $policy = PkgNumsGenerationPolicyEnumV1::stopOnFirstError();

        $response = \Mockery::mock('Webit\DPDClient\DPDServices\PackagesGeneration\PackagesGenerationResponseV1');
        $this->methods['generatePackagesNumbersV1']
            ->shouldReceive('__invoke')
            ->with($openUMLF, $policy, $this->authData)
            ->andReturn($response);

        $this->assertSame($response, $this->client->generatePackagesNumbersV1($openUMLF, $policy));
    }

    /**
     * @test
     */
    public function shouldGeneratePackagesNumbersV2()
    {
        /** @var OpenUMLFV1 $openUMLF */
        $openUMLF = \Mockery::mock('Webit\DPDClient\DPDServices\PackagesGeneration\OpenUMLF\OpenUMLFV1');
        $policy = PkgNumsGenerationPolicyEnumV1::stopOnFirstError();
        $langCode = 'PL';

        $response = \Mockery::mock('Webit\DPDClient\DPDServices\PackagesGeneration\PackagesGenerationResponseV2');
        $this->methods['generatePackagesNumbersV2']
            ->shouldReceive('__invoke')
            ->with($openUMLF, $policy, $langCode, $this->authData)
            ->andReturn($response);

        $this->assertSame($response, $this->client->generatePackagesNumbersV2($openUMLF, $policy, $langCode));
    }

    /**
     * @test
     */
    public function shouldGeneratePackagesNumbersV3()
    {
        /** @var OpenUMLFV2 $openUMLF */
        $openUMLF = \Mockery::mock('Webit\DPDClient\DPDServices\PackagesGeneration\OpenUMLF\OpenUMLFV2');
        $policy = PkgNumsGenerationPolicyEnumV1::stopOnFirstError();
        $langCode = 'PL';

        $response = \Mockery::mock('Webit\DPDClient\DPDServices\PackagesGeneration\PackagesGenerationResponseV3');
        $this->methods['generatePackagesNumbersV3']
            ->shouldReceive('__invoke')
            ->with($openUMLF, $policy, $langCode, $this->authData)
            ->andReturn($response);

        $this->assertSame($response, $this->client->generatePackagesNumbersV3($openUMLF, $policy, $langCode));
    }

    /**
     * @test
     */
    public function shouldGenerateSpedLabelsV1()
    {
        /** @var DPDServicesParamsV1 $params */
        $params = \Mockery::mock('Webit\DPDClient\DPDServices\DPDServicesParams\DPDServicesParamsV1');
        $outputFormat = OutputDocFormatDSPEnumV1::pdf();
        $outputPageFormat = OutputDocPageFormatDSPEnumV1::lblPrinter();

        $response = \Mockery::mock('Webit\DPDClient\DPDServices\DocumentGeneration\DocumentGenerationResponseV1');
        $this->methods['generateSpedLabelsV1']
            ->shouldReceive('__invoke')
            ->with($params, $outputFormat, $outputPageFormat, $this->authData)
            ->andReturn($response);

        $this->assertSame($response, $this->client->generateSpedLabelsV1($params, $outputFormat, $outputPageFormat));
    }

    /**
     * @test
     */
    public function shouldGenerateSpedLabelsV2()
    {
        /** @var DPDServicesParamsV1 $params */
        $params = \Mockery::mock('Webit\DPDClient\DPDServices\DPDServicesParams\DPDServicesParamsV1');
        $outputFormat = OutputDocFormatDSPEnumV1::pdf();
        $outputPageFormat = OutputDocPageFormatDSPEnumV1::lblPrinter();
        $outputLabelType = OutputLabelTypeEnumV2::bic3();

        $response = \Mockery::mock('Webit\DPDClient\DPDServices\DocumentGeneration\DocumentGenerationResponseV2');
        $this->methods['generateSpedLabelsV2']
            ->shouldReceive('__invoke')
            ->with($params, $outputFormat, $outputPageFormat, $outputLabelType, $this->authData)
            ->andReturn($response);

        $this->assertSame(
            $response,
            $this->client->generateSpedLabelsV2($params, $outputFormat, $outputPageFormat, $outputLabelType)
        );
    }

    /**
     * @test
     */
    public function shouldGenerateProtocolV1()
    {
        /** @var DPDServicesParamsV1 $params */
        $params = \Mockery::mock('Webit\DPDClient\DPDServices\DPDServicesParams\DPDServicesParamsV1');
        $outputFormat = OutputDocFormatDSPEnumV1::pdf();
        $outputPageFormat = OutputDocPageFormatDSPEnumV1::lblPrinter();

        $response = \Mockery::mock('Webit\DPDClient\DPDServices\DocumentGeneration\DocumentGenerationResponseV1');
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
        $params = \Mockery::mock('Webit\DPDClient\DPDServices\DPDPickupCallParams\DpdPickupCallParamsV1');

        $response = \Mockery::mock('\Webit\DPDClient\DPDServices\PackagesPickupCall\PackagesPickupCallResponseV1');
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
        $params = \Mockery::mock('Webit\DPDClient\DPDServices\DPDPickupCallParams\DpdPickupCallParamsV2');

        $response = \Mockery::mock('\Webit\DPDClient\DPDServices\PackagesPickupCall\PackagesPickupCallResponseV2');
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
        $params = \Mockery::mock('Webit\DPDClient\DPDServices\DPDPickupCallParams\DpdPickupCallParamsV3');

        $response = \Mockery::mock('\Webit\DPDClient\DPDServices\PackagesPickupCall\PackagesPickupCallResponseV3');
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
        $businessEvent = \Mockery::mock('\Webit\DPDClient\DPDServices\DPDParcelBusinessEvent\DPDParcelBusinessEventV1');

        $response = \Mockery::mock('Webit\DPDClient\DPDServices\ImportDeliveryBusinessEvent\ImportDeliveryBusinessEventResponseV1');
        $this->methods['importDeliveryBusinessEvent']
            ->shouldReceive('__invoke')
            ->with($businessEvent, $this->authData)
            ->andReturn($response);

        $this->assertSame($response, $this->client->importDeliveryBusinessEvent($businessEvent));
    }
}

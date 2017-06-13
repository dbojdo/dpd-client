<?php

namespace Webit\DPDClient\DocumentGeneration;

use Webit\DPDClient\AbstractApiTest;
use Webit\DPDClient\DPDServicesParams\DPDServicesParamsV1;
use Webit\DPDClient\DPDServicesParams\PackageDSPV1;
use Webit\DPDClient\DPDServicesParams\PickupAddressDSPV1;
use Webit\DPDClient\DPDServicesParams\PolicyDSPEnumV1;
use Webit\DPDClient\DPDServicesParams\SessionDSPV1;
use Webit\DPDClient\PackagesGeneration\GeneratePackagesNumbersV1;
use Webit\DPDClient\PackagesGeneration\GeneratePackagesNumbersV3;
use Webit\DPDClient\PackagesGeneration\OpenUMLF\Services;
use Webit\DPDClient\PackagesGeneration\PkgNumsGenerationPolicyEnumV1;

class GenerateSpedLabelsV2ApiTest extends AbstractApiTest
{
    /** @var GeneratePackagesNumbersV3 */
    private $generatePackagesNumbers;

    /** @var GenerateSpedLabelsV2 */
    private $generateSpedLabels;

    protected function setUp()
    {
        $this->generatePackagesNumbers = new GeneratePackagesNumbersV3($this->soapExecutor());
        $this->generateSpedLabels = new GenerateSpedLabelsV2($this->soapExecutor());
    }

    /**
     * @test
     */
    public function shouldGenerateLabels()
    {
        $openUml = $this->generateOpenUmlfV2(
            true,
            false,
            new Services(
                null,
                null,
                false,
                false,
                false,
                new Services\Cod(125.33, 'PLN')
            )
        );

        $numbers = $this->generatePackagesNumbers->__invoke(
            $openUml,
            PkgNumsGenerationPolicyEnumV1::allOrNothing(),
            'PL',
            $this->authData()
        );

        $responseAll = $this->generateSpedLabels->__invoke(
            new DPDServicesParamsV1(
                PolicyDSPEnumV1::stopOnFirstError(),
                SessionDSPV1::fromSession($numbers->sessionId()),
                PickupAddressDSPV1::fromFid($this->authData()->masterFid())
            ),
            OutputDocFormatDSPEnumV1::pdf(),
            OutputDocPageFormatDSPEnumV1::a4(),
            null,
            $this->authData()
        );

        file_put_contents(__DIR__.'/all.pdf', $responseAll->documentData());

        $this->assertInstanceOf('Webit\DPDClient\DocumentGeneration\DocumentGenerationResponseV2', $responseSingle);
    }

    /**
     * @test
     */
    public function shouldGenerateLabelForSinglePackage()
    {
        $openUml = $this->generateOpenUmlfV2(
            true,
            false,
            new Services(
                null,
                null,
                false,
                false,
                false,
                new Services\Cod(125.33, 'PLN')
            )
        );

        $numbers = $this->generatePackagesNumbers->__invoke(
            $openUml,
            PkgNumsGenerationPolicyEnumV1::allOrNothing(),
            'PL',
            $this->authData()
        );

        $packages = array();
        foreach ($numbers->packages() as $package) {
            $packages[] = PackageDSPV1::fromPackageId($package->packageId());
            break;
        }

        $responseSingle = $this->generateSpedLabels->__invoke(
            new DPDServicesParamsV1(
                PolicyDSPEnumV1::stopOnFirstError(),
                SessionDSPV1::fromPackages($packages),
                PickupAddressDSPV1::fromFid($this->authData()->masterFid())
            ),
            OutputDocFormatDSPEnumV1::pdf(),
            OutputDocPageFormatDSPEnumV1::a4(),
            null,
            $this->authData()
        );
        file_put_contents(__DIR__.'/single.pdf', $responseSingle->documentData());

        $this->assertInstanceOf('Webit\DPDClient\DocumentGeneration\DocumentGenerationResponseV2', $response);
    }
}

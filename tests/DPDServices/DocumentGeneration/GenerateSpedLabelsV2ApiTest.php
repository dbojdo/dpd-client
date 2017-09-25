<?php

namespace Webit\DPDClient\DPDServices\DocumentGeneration;

use Webit\DPDClient\DPDServices\AbstractApiTest;
use Webit\DPDClient\DPDServices\DPDServicesParams\DPDServicesParamsV1;
use Webit\DPDClient\DPDServices\DPDServicesParams\PackageDSPV1;
use Webit\DPDClient\DPDServices\DPDServicesParams\PickupAddressDSPV1;
use Webit\DPDClient\DPDServices\DPDServicesParams\PolicyDSPEnumV1;
use Webit\DPDClient\DPDServices\DPDServicesParams\SessionDSPV1;
use Webit\DPDClient\DPDServices\PackagesGeneration\GeneratePackagesNumbersV3;
use Webit\DPDClient\DPDServices\PackagesGeneration\OpenUMLF\Services;
use Webit\DPDClient\DPDServices\PackagesGeneration\PkgNumsGenerationPolicyEnumV1;

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

        $response = $this->generateSpedLabels->__invoke(
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

        $this->assertInstanceOf('Webit\DPDClient\DPDServices\DocumentGeneration\DocumentGenerationResponseV2', $response);
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

        $response = $this->generateSpedLabels->__invoke(
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

        $this->assertInstanceOf('Webit\DPDClient\DPDServices\DocumentGeneration\DocumentGenerationResponseV2', $response);
    }
}

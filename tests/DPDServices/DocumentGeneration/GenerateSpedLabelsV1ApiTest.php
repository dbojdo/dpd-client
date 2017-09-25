<?php

namespace Webit\DPDClient\DPDServices\DocumentGeneration;

use Webit\DPDClient\DPDServices\AbstractApiTest;
use Webit\DPDClient\DPDServices\DPDServicesParams\DPDServicesParamsV1;
use Webit\DPDClient\DPDServices\DPDServicesParams\PackageDSPV1;
use Webit\DPDClient\DPDServices\DPDServicesParams\PickupAddressDSPV1;
use Webit\DPDClient\DPDServices\DPDServicesParams\PolicyDSPEnumV1;
use Webit\DPDClient\DPDServices\DPDServicesParams\SessionDSPV1;
use Webit\DPDClient\DPDServices\PackagesGeneration\GeneratePackagesNumbersV1;
use Webit\DPDClient\DPDServices\PackagesGeneration\PkgNumsGenerationPolicyEnumV1;

class GenerateSpedLabelsV1ApiTest extends AbstractApiTest
{
    /** @var GeneratePackagesNumbersV1 */
    private $generatePackagesNumbers;

    /** @var GenerateSpedLabelsV1 */
    private $generateSpedLabels;

    protected function setUp()
    {
        $this->generatePackagesNumbers = new GeneratePackagesNumbersV1($this->soapExecutor());
        $this->generateSpedLabels = new GenerateSpedLabelsV1($this->soapExecutor());
    }

    /**
     * @test
     */
    public function shouldGenerateLabels()
    {
        $openUml = $this->generateOpenUmlf(false, false);
        $numbers = $this->generatePackagesNumbers->__invoke(
            $openUml,
            PkgNumsGenerationPolicyEnumV1::allOrNothing(),
            $this->authData()
        );

        $packages = array();
        foreach ($numbers->packages() as $package) {
            $packages[] = PackageDSPV1::fromPackageId($package->packageId());
        }

        $response = $this->generateSpedLabels->__invoke(
            new DPDServicesParamsV1(
                PolicyDSPEnumV1::stopOnFirstError(),
                SessionDSPV1::fromSession($numbers->sessionId()),
                PickupAddressDSPV1::fromFid($this->authData()->masterFid()),
                null
            ),
            OutputDocFormatDSPEnumV1::pdf(),
            OutputDocPageFormatDSPEnumV1::a4(),
            $this->authData()
        );

        $this->assertInstanceOf('Webit\DPDClient\DPDServices\DocumentGeneration\DocumentGenerationResponseV1', $response);
    }
}

<?php
/**
 * File GenerateSpedLabelsV1ApiTest.php
 * Created at: 2017-09-05 22:46
 *
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */

namespace Webit\DPDClient\DocumentGeneration;

use Webit\DPDClient\AbstractApiTest;
use Webit\DPDClient\Common\OutputDocFormatDSPEnumV1;
use Webit\DPDClient\Common\OutputDocPageFormatDSPEnumV1;
use Webit\DPDClient\DPDServicesParams\DPDServicesParamsV1;
use Webit\DPDClient\DPDServicesParams\PackageDSPV1;
use Webit\DPDClient\DPDServicesParams\PickupAddressDSPV1;
use Webit\DPDClient\DPDServicesParams\PolicyDSPEnumV1;
use Webit\DPDClient\DPDServicesParams\SessionDSPV1;
use Webit\DPDClient\DPDServicesParams\SessionTypeDSPEnumV1;
use Webit\DPDClient\PackagesGeneration\GeneratePackagesNumbersV1;
use Webit\DPDClient\PackagesGeneration\PkgNumsGenerationPolicyEnumV1;

class GenerateSpedLabelsV1ApiTest extends AbstractApiTest
{
    /**
     * @var GeneratePackagesNumbersV1
     */
    private $generatePackagesNumbers;

    /**
     * @var GenerateSpedLabelsV1
     */
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
        $numbers = $this->generatePackagesNumbers->__invoke($openUml, PkgNumsGenerationPolicyEnumV1::ALL_OR_NOTHING, $this->authData());

        $packages = array();
        foreach ($numbers->packages() as $package) {
            $packages[] = PackageDSPV1::fromPackageId($package->packageId());
        }

        $response = $this->generateSpedLabels->__invoke(
            new DPDServicesParamsV1(
                PolicyDSPEnumV1::STOP_ON_FIRST_ERROR,
                new SessionDSPV1(
                    $numbers->sessionId(),
                    $packages,
                    SessionTypeDSPEnumV1::DOMESTIC
                ),
                new PickupAddressDSPV1(
                    $this->authData()->masterFid(),
                    $this->faker()->name,
                    $this->faker()->company,
                    $this->faker()->streetAddress,
                    'Kraków',
                    'PL',
                    '30313',
                    $this->faker()->phoneNumber,
                    $this->faker()->email
                ),
                null
            ),
            OutputDocFormatDSPEnumV1::PDF,
            OutputDocPageFormatDSPEnumV1::A4,
            $this->authData()
        );

        $this->assertInstanceOf('Webit\DPDClient\DocumentGeneration\DocumentGenerationResponseV1', $response);
    }
}

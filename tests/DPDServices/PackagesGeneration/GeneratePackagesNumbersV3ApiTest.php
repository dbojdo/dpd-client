<?php

namespace Webit\DPDClient\DPDServices\PackagesGeneration;

use Webit\DPDClient\DPDServices\AbstractApiTest;
use Webit\DPDClient\DPDServices\PackagesGeneration\OpenUMLF\OpenUMLFV2;
use Webit\DPDClient\DPDServices\PackagesGeneration\OpenUMLF\PackageV2;
use Webit\DPDClient\DPDServices\PackagesGeneration\OpenUMLF\Services;

/**
 * @group api
 */
class GeneratePackagesNumbersV3ApiTest extends AbstractApiTest
{
    /** @var GeneratePackagesNumbersV3 */
    private $generatePackagesNumbers;

    protected function setUp()
    {
        $this->generatePackagesNumbers = new GeneratePackagesNumbersV3($this->soapExecutor());
    }

    /**
     * @group api
     * @test
     * @param OpenUMLFV2 $openUmlf
     * @param PackagesGenerationResponseV3 $expectedResult
     * @dataProvider packages
     */
    public function shouldGeneratePackages(
        OpenUMLFV2 $openUmlf,
        PackagesGenerationResponseV3 $expectedResult
    ) {
        $autData = $this->authData();

        $result = $this->generatePackagesNumbers->__invoke(
            $openUmlf,
            PkgNumsGenerationPolicyEnumV1::allOrNothing(),
            'PL',
            $autData
        );

        $this->assertInstanceOf(
            'Webit\DPDClient\DPDServices\PackagesGeneration\PackagesGenerationResponseV3',
            $result
        );

        $this->assertEquals(
            $this->simplify($expectedResult),
            $this->simplify($result)
        );
    }

    public function packages()
    {
        return array(
            'a single package' => array(
                $openUmlf = $this->generateOpenUmlfV2(
                    false,
                    true,
                    new Services(
                        null,
                        null,
                        false,
                        false,
                        false,
                        Services\Cod::create(1500, 'PLN')
                    ),
                    'Cust'
                ),
                new PackagesGenerationResponseV3(
                    'OK',
                    $this->faker()->numberBetween(0, 100000),
                    null,
                    null,
                    $this->packagesResponse($openUmlf->packages())
                )
            ),
            'multiple packages' => array(
                $openUmlf = $this->generateOpenUmlfV2(true, false, null, 'Cust'),
                new PackagesGenerationResponseV3(
                    'OK',
                    $this->faker()->numberBetween(0, 100000),
                    null,
                    null,
                    $this->packagesResponse($openUmlf->packages())
                )
            ),
            'a invalid post code format' => array(
                $openUmlf = new OpenUMLFV2(
                    array(
                        $package = $this->generatePackageV2(
                            false,
                            new Services(),
                            $this->generateSender($this->authData()->masterFid(), 'Kraków', '30-313', 'PL'),
                            $this->generateReceiver(),
                            null
                        )
                    )
                ),
                new PackagesGenerationResponseV3(
                    'INCORRECT_DATA',
                    null,
                    null,
                    null,
                    array(
                        new PackagePGRV2(
                            'INCORRECT_DATA',
                            null,
                            $package->reference(),
                            array(
                                new ValidationInfoPGRV2(
                                    1506,
                                    'INCORRECT_SENDER_POSTAL_CODE',
                                    'SenderPostalCode',
                                    $this->randomString()
                                )
                            ),
                            array(
                                new ParcelPGRV2(
                                    'OK',
                                    null,
                                    null,
                                    null,
                                    array()
                                )
                            )
                        )
                    )
                )
            )
        );
    }

    /**
     * @param PackageV2[] $packages
     * @return PackagePGRV1[]
     */
    private function packagesResponse(array $packages)
    {
        $packageResponses = array();
        foreach($packages as $package) {
            $parcelResponses = array();

            foreach ($package as $parcel) {
                $parcelResponses[] = new ParcelPGRV2(
                    'OK',
                    $this->faker()->numberBetween(),
                    null,
                    $this->faker()->numberBetween(),
                    array()
                );
            }

            $packageResponses[] = new PackagePGRV2(
                'OK',
                $this->faker()->numberBetween(),
                $package->reference(),
                array(),
                $parcelResponses
            );
        }

        return $packageResponses;
    }

    private function simplify(PackagesGenerationResponseV3 $expectedResult)
    {
        return array(
            'status' => $expectedResult->status(),
            'sessionId' => (bool)$expectedResult->sessionId(),
            'beginTime' => (bool)$expectedResult->beginTime(),
            'endTime' => (bool)$expectedResult->endTime(),
            'packages' => $this->simplifyPackages($expectedResult->packages())
        );
    }

    /**
     * @param PackagePGRV2[] $packages
     * @return array
     */
    private function simplifyPackages(array $packages)
    {
        $simplified = array();
        foreach ($packages as $package) {
            $simplified[] = array(
                'status' => $package->status(),
                'reference' => $package->reference(),
                'packageId' => (bool)$package->packageId(),
                'validation_details' => $this->simplifyValidationDetails($package->validationDetails()),
                'parcels' => $this->simplifyParcels($package->parcels())
            );
        }

        return $simplified;
    }

    /**
     * @param ParcelPGRV2[] $parcels
     * @return array
     */
    private function simplifyParcels(array $parcels)
    {
        $simplified = array();
        foreach ($parcels as $parcel) {
            $simplified[] = array(
                'status' => $parcel->status(),
                'reference' => $parcel->reference(),
                'parcelId' => (bool)$parcel->parcelId(),
                'waybill' => (bool)$parcel->waybill()
            );
        }

        return $simplified;
    }

    /**
     * @param ValidationInfoPGRV2[] $validationDetails
     * @return array
     */
    private function simplifyValidationDetails(array $validationDetails)
    {
        $simplified = array();
        foreach ($validationDetails as $validationDetail) {
            $simplified[] = array(
                'id' => $validationDetail->errorId(),
                'code' => $validationDetail->errorCode(),
                'fields' => $validationDetail->fieldNames(),
                'info' => (bool)$validationDetail->info()
            );
        }

        return $simplified;
    }
}

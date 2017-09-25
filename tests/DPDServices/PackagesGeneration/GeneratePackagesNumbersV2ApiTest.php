<?php

namespace Webit\DPDClient\DPDServices\PackagesGeneration;

use Webit\DPDClient\DPDServices\AbstractApiTest;
use Webit\DPDClient\DPDServices\PackagesGeneration\OpenUMLF\OpenUMLFV1;
use Webit\DPDClient\DPDServices\PackagesGeneration\OpenUMLF\PackageV2;
use Webit\DPDClient\DPDServices\PackagesGeneration\OpenUMLF\Services;

class GeneratePackagesNumbersV2ApiTest extends AbstractApiTest
{
    /** @var GeneratePackagesNumbersV2 */
    private $generatePackagesNumbers;

    protected function setUp()
    {
        $this->generatePackagesNumbers = new GeneratePackagesNumbersV2($this->soapExecutor());
    }

    /**
     * @group api
     * @test
     * @param OpenUMLFV1 $openUmlf
     * @param PackagesGenerationResponseV2 $expectedResult
     * @dataProvider packages
     */
    public function shouldGeneratePackages(
        OpenUMLFV1 $openUmlf,
        PackagesGenerationResponseV2 $expectedResult
    ) {
        $autData = $this->authData();

        $result = $this->generatePackagesNumbers->__invoke(
            $openUmlf,
            PkgNumsGenerationPolicyEnumV1::allOrNothing(),
            'PL',
            $autData
        );

        $this->assertInstanceOf(
            'Webit\DPDClient\DPDServices\PackagesGeneration\PackagesGenerationResponseV2',
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
                $openUmlf = $this->generateOpenUmlf(false, true),
                new PackagesGenerationResponseV2(
                    'OK',
                    $this->faker()->numberBetween(0, 100000),
                    null,
                    null,
                    $this->packagesResponse($openUmlf->packages())
                )
            ),
            'a multiple packages' => array(
                $openUmlf = $this->generateOpenUmlf(true, false),
                new PackagesGenerationResponseV2(
                    'OK',
                    $this->faker()->numberBetween(0, 100000),
                    null,
                    null,
                    $this->packagesResponse($openUmlf->packages())
                )
            ),
            'a declared value service' => array(
                $openUmlf = $this->generateOpenUmlf(
                    false,
                    false,
                    new Services(
                        Services\DeclaredValue::create(1500.33, 'PLN'),
                        Services\Guarantee::saturday(),
                        true,
                        false,
                        true,
                        Services\Cod::create(124.22, 'PLN'),
                        true,
                        Services\SelfCol::priv(),
                        true,
                        false,
                        false,
                        false
                    )
                ),
                new PackagesGenerationResponseV2(
                    'OK',
                    $this->faker()->numberBetween(0, 100000),
                    null,
                    null,
                    $this->packagesResponse($openUmlf->packages())
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

    private function simplify(PackagesGenerationResponseV2 $expectedResult)
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
                'validation_details' => $package->validationDetails(),
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
}

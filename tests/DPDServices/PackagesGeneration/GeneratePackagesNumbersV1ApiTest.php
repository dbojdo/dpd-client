<?php

namespace Webit\DPDClient\DPDServices\PackagesGeneration;

use Webit\DPDClient\DPDServices\AbstractApiTest;
use Webit\DPDClient\DPDServices\PackagesGeneration\OpenUMLF\Services\Cod;
use Webit\DPDClient\DPDServices\PackagesGeneration\OpenUMLF\Services\DeclaredValue;
use Webit\DPDClient\DPDServices\PackagesGeneration\OpenUMLF\Services\Guarantee;
use Webit\DPDClient\DPDServices\PackagesGeneration\OpenUMLF\OpenUMLFV1;
use Webit\DPDClient\DPDServices\PackagesGeneration\OpenUMLF\PackageV1;
use Webit\DPDClient\DPDServices\PackagesGeneration\OpenUMLF\Services\SelfCol;
use Webit\DPDClient\DPDServices\PackagesGeneration\OpenUMLF\Services;

/**
 * @group api
 */
class GeneratePackagesNumbersV1ApiTest extends AbstractApiTest
{
    /** @var GeneratePackagesNumbersV1 */
    private $generatePackagesNumbers;

    protected function setUp()
    {
        $this->generatePackagesNumbers = new GeneratePackagesNumbersV1($this->soapExecutor());
    }

    /**
     * @group api
     * @test
     * @param OpenUMLFV1 $openUmlf
     * @param PackagesGenerationResponseV1 $expectedResult
     * @dataProvider packages
     */
    public function shouldCallPickup(
        OpenUMLFV1 $openUmlf,
        PackagesGenerationResponseV1 $expectedResult
    ) {
        $autData = $this->authData();

        $result = $this->generatePackagesNumbers->__invoke(
            $openUmlf,
            PkgNumsGenerationPolicyEnumV1::allOrNothing(),
            $autData
        );

        $this->assertInstanceOf(
            'Webit\DPDClient\DPDServices\PackagesGeneration\PackagesGenerationResponseV1',
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
                new PackagesGenerationResponseV1(
                    $this->faker()->numberBetween(0, 100000),
                    'OK',
                    $this->packagesResponse($openUmlf->packages())
                )
            ),
            'a multiple packages' => array(
                $openUmlf = $this->generateOpenUmlf(true, false),
                new PackagesGenerationResponseV1(
                    $this->faker()->numberBetween(0, 100000),
                    'OK',
                    $this->packagesResponse($openUmlf->packages())
                )
            ),
            'a declared value service' => array(
                $openUmlf = $this->generateOpenUmlf(
                    false,
                    false,
                    new Services(
                        DeclaredValue::create(1500.33, 'PLN'),
                        Guarantee::saturday(),
                        true,
                        false,
                        true,
                        Cod::create(1500.22, 'PLN'),
                        true,
                        SelfCol::priv(),
                        true,
                        false,
                        false,
                        false
                    )
                ),
                new PackagesGenerationResponseV1(
                    $this->faker()->numberBetween(0, 100000),
                    'OK',
                    $this->packagesResponse($openUmlf->packages())
                )
            )
        );
    }

    /**
     * @param PackageV1[] $packages
     * @return PackagePGRV1[]
     */
    private function packagesResponse(array $packages)
    {
        $packageResponses = array();
        foreach($packages as $package) {
            $parcelResponses = array();
            foreach ($package as $parcel) {
                $parcelResponses[] = new ParcelPGRV1(
                    $this->faker()->numberBetween(),
                    null,
                    md5($this->faker()->lastName),
                    'OK'
                );
            }

            $packageResponses[] = new PackagePGRV1(
                $this->faker()->numberBetween(),
                $package->reference(),
                'OK',
                array(),
                $parcelResponses
            );
        }

        return $packageResponses;
    }

    private function simplify(PackagesGenerationResponseV1 $expectedResult)
    {
        return array(
            'status' => $expectedResult->status(),
            'packages' => $this->simplifyPackages($expectedResult->packages())
        );
    }

    /**
     * @param PackagePGRV1[] $packages
     * @return array
     */
    private function simplifyPackages(array $packages)
    {
        $simplified = array();
        foreach ($packages as $package) {
            $simplified[] = array(
                'status' => $package->status(),
                'reference' => $package->reference(),
                'invalid_fields' => $package->invalidFields(),
                'parcels' => $this->simplifyParcels($package->parcels())
            );
        }

        return $simplified;
    }

    /**
     * @param ParcelPGRV1[] $parcels
     * @return array
     */
    private function simplifyParcels(array $parcels)
    {
        $simplified = array();
        foreach ($parcels as $parcel) {
            $simplified[] = array(
                'status' => $parcel->status(),
                'reference' => $parcel->reference(),
            );
        }

        return $simplified;
    }
}

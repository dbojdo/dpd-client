<?php

namespace Webit\DPDClient\PackagesGeneration;

use Webit\DPDClient\AbstractIntegrationTest;

class PackagesGenerationResponseV3HydrationTest extends AbstractIntegrationTest
{
    /**
     * @param array $response
     * @param PackagesGenerationResponseV3 $expectedResponse
     * @test
     * @dataProvider responses
     */
    public function shouldHydrateResponse(array $response, PackagesGenerationResponseV3 $expectedResponse)
    {
        $hyrator = $this->hydrator();
        $this->assertEquals(
            $expectedResponse,
            $hyrator->hydrateResult($response, 'generatePackagesNumbersV3')
        );
    }

    public function responses()
    {
        return array(
            array(
                array (
                    'Status' => $responseStatus = 'OK',
                    'SessionId' => $sessionId = $this->randomPositiveInt(),
                    'Packages' => array (
                        'Package' => array (
                            'Status' => $packageStatus = 'OK',
                            'PackageId' => $packageId = $this->randomPositiveInt(),
                            'Reference' => $packageRef = $this->randomString(),
                            'Parcels' => array (
                                'Parcel' => array (
                                    array (
                                        'Status' => $p1Status = 'OK',
                                        'ParcelId' => $p1Id = $this->randomPositiveInt(),
                                        'Waybill' => $p1Waybill = $this->randomString(),
                                    ),
                                    array (
                                        'Status' => $p2Status = 'OK',
                                        'ParcelId' => $p2Id = $this->randomPositiveInt(),
                                        'Waybill' => $p2Waybill = $this->randomString(),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                new PackagesGenerationResponseV3(
                    $responseStatus,
                    $sessionId,
                    null,
                    null,
                    array(
                        new PackagePGRV2(
                            $packageStatus,
                            $packageId,
                            $packageRef,
                            array(),
                            array(
                                new ParcelPGRV2(
                                    $p1Status,
                                    $p1Id,
                                    null,
                                    $p1Waybill,
                                    array()
                                ),
                                new ParcelPGRV2(
                                    $p2Status,
                                    $p2Id,
                                    null,
                                    $p2Waybill,
                                    array()
                                )
                            )
                        )
                    )
                )
            )
        );
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: dbojdo
 * Date: 06/09/2017
 * Time: 14:31
 */

namespace Webit\DPDClient\DocumentGeneration;

use Webit\DPDClient\AbstractIntegrationTest;

class DocumentGenerationResponseV1HydrationTest extends AbstractIntegrationTest
{
    /**
     * @test
     * @param $soapResponse
     * @param DocumentGenerationResponseV1 $expectedResponse
     * @dataProvider responses
     */
    public function shouldHydrateResponse($soapResponse, DocumentGenerationResponseV1 $expectedResponse)
    {
        $hydrator = $this->hydrator();

        $this->assertEquals(
            $expectedResponse,
            $hydrator->hydrateResult($soapResponse, 'generateSpedLabelsV1')
        );
    }

    public function responses()
    {
        return array(
            'multiple packages and parcels' => array(
                array(
                    'session' => array(
                        'sessionId' => $sessionId = $this->randomPositiveInt(),
                        'statusInfo' => array(
                            'status' => $status = 'OK',
                            'description' => $statusDesc = $this->randomString()
                        ),
                        'packages' => array(
                            array(
                                'packageId' => $package1Id = $this->randomPositiveInt(),
                                'reference' => $package1Reference = $this->randomString(),
                                'statusInfo' => array(
                                    'status' => $package1Status = 'OK',
                                    'description' => $package1StatusDesc = $this->randomString()
                                ),
                                'parcels' => array(
                                    array(
                                        'parcelId' => $parcel11Id = $this->randomPositiveInt(),
                                        'reference' => $parcel11Reference = $this->randomString(),
                                        'waybill' => $parcel11Waybill = $this->randomString(),
                                        'statusInfo' => array(
                                            'status' => $parcel11Status = 'OK',
                                            'description' => $parcel11StatusDesc = $this->randomString()
                                        )
                                    ),
                                    array(
                                        'parcelId' => $parcel12Id = $this->randomPositiveInt(),
                                        'reference' => $parcel12Reference = $this->randomString(),
                                        'waybill' => $parcel12Waybill = $this->randomString(),
                                        'statusInfo' => array(
                                            'status' => $parcel12Status = 'OK',
                                            'description' => $parcel12StatusDesc = $this->randomString()
                                        )
                                    )
                                )
                            ),
                            array(
                                'packageId' => $package2Id = $this->randomPositiveInt(),
                                'reference' => $package2Reference = $this->randomString(),
                                'statusInfo' => array(
                                    'status' => $package2Status = 'OK',
                                    'description' => $package2StatusDesc = $this->randomString()
                                ),
                                'parcels' => array(
                                    array(
                                        'parcelId' => $parcel21Id = $this->randomPositiveInt(),
                                        'reference' => $parcel21Reference = $this->randomString(),
                                        'waybill' => $parcel21Waybill = $this->randomString(),
                                        'statusInfo' => array(
                                            'status' => $parcel21Status = 'OK',
                                            'description' => $parcel21StatusDesc = $this->randomString()
                                        )
                                    )
                                )
                            )
                        )
                    ),
                    'documentData' => $documentData = $this->randomString(),
                    'documentId' => $documentId = $this->randomString(),
                ),
                new DocumentGenerationResponseV1(
                    new SessionDGRV1(
                        $sessionId,
                        new StatusInfoDGRV1(
                            $status,
                            $statusDesc
                        ),
                        array(
                            new PackageDGRV1(
                                $package1Id,
                                $package1Reference,
                                new StatusInfoDGRV1(
                                    $package1Status,
                                    $package1StatusDesc
                                ),
                                array(
                                    new ParcelDGRV1(
                                        $parcel11Id,
                                        $parcel11Reference,
                                        $parcel11Waybill,
                                        new StatusInfoDGRV1(
                                            $parcel11Status,
                                            $parcel11StatusDesc
                                        )
                                    ),
                                    new ParcelDGRV1(
                                        $parcel12Id,
                                        $parcel12Reference,
                                        $parcel12Waybill,
                                        new StatusInfoDGRV1(
                                            $parcel12Status,
                                            $parcel12StatusDesc
                                        )
                                    )
                                )
                            ),
                            new PackageDGRV1(
                                $package2Id,
                                $package2Reference,
                                new StatusInfoDGRV1(
                                    $package2Status,
                                    $package2StatusDesc
                                ),
                                array(
                                    new ParcelDGRV1(
                                        $parcel21Id,
                                        $parcel21Reference,
                                        $parcel21Waybill,
                                        new StatusInfoDGRV1(
                                            $parcel21Status,
                                            $parcel21StatusDesc
                                        )
                                    )
                                )
                            )
                        )
                    ),
                    $documentData,
                    $documentId
                )
            ),
            'single packages and parcel' => array(
                array(
                    'session' => array(
                        'sessionId' => $sessionId = $this->randomPositiveInt(),
                        'statusInfo' => array(
                            'status' => $status = 'OK',
                            'description' => $statusDesc = $this->randomString()
                        ),
                        'packages' => array(
                            'packageId' => $package1Id = $this->randomPositiveInt(),
                            'reference' => $package1Reference = $this->randomString(),
                            'statusInfo' => array(
                                'status' => $package1Status = 'OK',
                                'description' => $package1StatusDesc = $this->randomString()
                            ),
                            'parcels' => array(
                                'parcelId' => $parcel11Id = $this->randomPositiveInt(),
                                'reference' => $parcel11Reference = $this->randomString(),
                                'waybill' => $parcel11Waybill = $this->randomString(),
                                'statusInfo' => array(
                                    'status' => $parcel11Status = 'OK',
                                    'description' => $parcel11StatusDesc = $this->randomString()
                                )
                            )
                        )
                    ),
                    'documentData' => $documentData = $this->randomString(),
                    'documentId' => $documentId = $this->randomString(),
                ),
                new DocumentGenerationResponseV1(
                    new SessionDGRV1(
                        $sessionId,
                        new StatusInfoDGRV1(
                            $status,
                            $statusDesc
                        ),
                        array(
                            new PackageDGRV1(
                                $package1Id,
                                $package1Reference,
                                new StatusInfoDGRV1(
                                    $package1Status,
                                    $package1StatusDesc
                                ),
                                array(
                                    new ParcelDGRV1(
                                        $parcel11Id,
                                        $parcel11Reference,
                                        $parcel11Waybill,
                                        new StatusInfoDGRV1(
                                            $parcel11Status,
                                            $parcel11StatusDesc
                                        )
                                    )
                                )
                            )
                        )
                    ),
                    $documentData,
                    $documentId
                )
            ),
            'no packages' => array(
                array(
                    'session' => array(
                        'sessionId' => $sessionId = $this->randomPositiveInt(),
                        'statusInfo' => array(
                            'status' => $status = 'OK',
                            'description' => $statusDesc = $this->randomString()
                        )
                    ),
                    'documentData' => $documentData = $this->randomString(),
                    'documentId' => $documentId = $this->randomString(),
                ),
                new DocumentGenerationResponseV1(
                    new SessionDGRV1(
                        $sessionId,
                        new StatusInfoDGRV1(
                            $status,
                            $statusDesc
                        ),
                        array()
                    ),
                    $documentData,
                    $documentId
                )
            )
        );
    }
}

<?php

namespace Webit\DPDClient\DPDInfoServices\CustomerEvents;

use Webit\DPDClient\DPDInfoServices\AbstractIntegrationTest;
use Webit\DPDClient\DPDInfoServices\Client\SoapFunctions;
use Webit\SoapApi\Util\Dumper\VoidDumper;

class GetEventsForCustomerV4HydrationTest extends AbstractIntegrationTest
{
    /**
     * @test
     * @dataProvider responses
     */
    public function shouldHydrateResponse($soapResult, CustomerEventsResponseV3 $response)
    {
        $this->assertEquals(
            $response,
            $this->hydrator()->hydrateResult($soapResult, SoapFunctions::GET_EVENTS_FOR_CUSTOMER_V4)
        );
    }

    public function responses()
    {
        return array(
            'empty events list' => array(
                array(
                    'return' => array(
                        'confirmId' => $confirmId = $this->randomString()
                    )
                ),
                new CustomerEventsResponseV3(
                    $confirmId,
                    array()
                )
            ),
            'single event' => array(
                array(
                    'return' => array(
                        'confirmId' => $confirmId = $this->randomString(),
                        'eventsList' => array(
                            'businessCode' => $businessCode = (string)$this->randomPositiveInt(),
                            'country' => $country = 'PL',
                            'depot' => $depot = $this->randomString(),
                            'eventTime' => $eventTime = '2017-09-25T17:34:08.778',
                            'id' => $id = $this->randomPositiveInt(),
                            'objectId' => $objectId = $this->randomPositiveInt(),
                            'operationType' => $operationType = 'INSERT',
                            'packageReference' => $ref = $this->randomString(),
                            'parcelReference' => $parcelRef = $this->randomString(),
                            'waybill' => $waybill = $this->randomString(),
                        )
                    )
                ),
                new CustomerEventsResponseV3(
                    $confirmId,
                    array(
                        new CustomerEventV3(
                            $id,
                            $businessCode,
                            $waybill,
                            null,
                            $eventTime,
                            $depot,
                            $country,
                            $ref,
                            $parcelRef,
                            $objectId
                        )
                    )
                )
            ),
            'multiple events' => array(
                array(
                    'return' => array(
                        'confirmId' => $confirmId = $this->randomString(),
                        'eventsList' =>
                            array(
                                array(
                                    'businessCode' => $businessCode = (string)$this->randomPositiveInt(),
                                    'country' => $country = 'PL',
                                    'depot' => $depot = $this->randomString(),
                                    'eventTime' => $eventTime = '2017-09-25T17:34:08.778',
                                    'id' => $id = $this->randomPositiveInt(),
                                    'objectId' => $objectId = $this->randomPositiveInt(),
                                    'operationType' => $operationType = 'INSERT',
                                    'packageReference' => $ref = $this->randomString(),
                                    'parcelReference' => $parcelRef = $this->randomString(),
                                    'waybill' => $waybill = $this->randomString(),
                                ),
                                array(
                                    'businessCode' => $businessCode2 = (string)$this->randomPositiveInt(),
                                    'country' => $country2 = 'PL',
                                    'depot' => $depot2 = $this->randomString(),
                                    'eventTime' => $eventTime2 = '2017-09-25T17:34:08.778',
                                    'id' => $id2 = $this->randomPositiveInt(),
                                    'objectId' => $objectId2 = $this->randomPositiveInt(),
                                    'operationType' => $operationType2 = 'INSERT',
                                    'packageReference' => $ref2 = $this->randomString(),
                                    'parcelReference' => $parcelRef2 = $this->randomString(),
                                    'waybill' => $waybill2 = $this->randomString(),
                                )
                            )
                    )
                ),
                new CustomerEventsResponseV3(
                    $confirmId,
                    array(
                        new CustomerEventV3(
                            $id,
                            $businessCode,
                            $waybill,
                            null,
                            $eventTime,
                            $depot,
                            $country,
                            $ref,
                            $parcelRef,
                            $objectId
                        ),
                        new CustomerEventV3(
                            $id2,
                            $businessCode2,
                            $waybill2,
                            null,
                            $eventTime2,
                            $depot2,
                            $country2,
                            $ref2,
                            $parcelRef2,
                            $objectId2
                        )
                    )
                )
            )
        );
    }

    /**
     * @inheritdoc
     */
    protected function ioDumper()
    {
        return new VoidDumper();
    }
}
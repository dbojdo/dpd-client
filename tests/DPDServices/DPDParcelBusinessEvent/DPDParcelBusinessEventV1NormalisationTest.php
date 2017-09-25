<?php

namespace Webit\DPDClient\DPDServices\DPDParcelBusinessEvent;

use Webit\DPDClient\DPDServices\AbstractIntegrationTest;

/**
 * @group api
 */
class DPDParcelBusinessEventV1NormalisationTest extends AbstractIntegrationTest
{
    /**
     * @param DPDParcelBusinessEventV1 $businessEventV1
     * @param array $normalisedEvent
     * @test
     * @dataProvider events
     */
    public function shouldNormalisesEvent(DPDParcelBusinessEventV1 $businessEventV1, array $normalisedEvent)
    {
        $this->assertEquals(
            $normalisedEvent,
            $this->normaliser()->normaliseInput($this->randomString(), $businessEventV1)
        );
    }

    public function events()
    {
        return array(
            array(
                new DPDParcelBusinessEventV1(
                    $countryCode = $this->faker()->countryCode,
                    $postCode = $this->faker()->postcode,
                    $eventCode = $this->randomString(),
                    $waybill = $this->randomString(),
                    $date = date_create(
                        sprintf('now + %d seconds', $this->randomPositiveInt(10000))
                    ),
                    array(
                        new DPDParcelBusinessEventDataV1(
                            $ed1code = $this->randomString(),
                            $ed1value = $this->randomString()
                        ),
                        new DPDParcelBusinessEventDataV1(
                            $ed2code = $this->randomString(),
                            $ed2value = $this->randomString()
                        )
                    )
                ),
                array(
                    'countryCode' => $countryCode,
                    'postalCode' => $postCode,
                    'eventCode' => $eventCode,
                    'waybill' => $waybill,
                    'eventTime' => $date->format('Y-m-d\TH:i:s'),
                    'eventDataList' => array(
                        array(
                            'code' => $ed1code,
                            'value' => $ed1value
                        ),
                        array(
                            'code' => $ed2code,
                            'value' => $ed2value
                        )
                    )

                )
            )
        );
    }
}

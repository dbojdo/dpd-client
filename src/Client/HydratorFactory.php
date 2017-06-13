<?php

namespace Webit\DPDClient\Client;

use JMS\Serializer\Serializer;
use Webit\DPDClient\Common\Hydrator\ResponseExtractingHydrator;
use Webit\SoapApi\Hydrator\ArrayHydrator;
use Webit\SoapApi\Hydrator\ChainHydrator;
use Webit\SoapApi\Hydrator\HydratorSerializerBased;
use Webit\SoapApi\Hydrator\Serializer\ResultTypeMap;
use Webit\SoapApi\Util\StdClassToArray;

class HydratorFactory
{
    /**
     * @param Serializer $serializer
     * @return ChainHydrator
     */
    public function create(Serializer $serializer)
    {
        return new ChainHydrator(
            array(
                new ResponseExtractingHydrator(),
                new ArrayHydrator(new StdClassToArray()),
                new HydratorSerializerBased(
                    $serializer,
                    new ResultTypeMap(
                        array(
                            SoapFunctions::FIND_POSTAL_CODE_V1 => 'Webit\DPDClient\PostalCode\FindPostalCodeResponseV1',
                            SoapFunctions::GET_COURIER_ORDER_AVAILABILITY_V1 => 'Webit\DPDClient\PostalCode\GetCourierOrderAvailabilityResponseV1',
                            SoapFunctions::PACKAGES_PICKUP_CALL_V1 => 'Webit\DPDClient\PackagesPickupCall\PackagesPickupCallResponseV1',
                            SoapFunctions::PACKAGES_PICKUP_CALL_V2 => 'Webit\DPDClient\PackagesPickupCall\PackagesPickupCallResponseV2',
                            SoapFunctions::PACKAGES_PICKUP_CALL_V3 => 'Webit\DPDClient\PackagesPickupCall\PackagesPickupCallResponseV3',
                            SoapFunctions::GENERATE_PACKAGES_NUMBERS_V1 => 'Webit\DPDClient\PackagesGeneration\PackagesGenerationResponseV1',
                            SoapFunctions::GENERATE_PACKAGES_NUMBERS_V2 => 'Webit\DPDClient\PackagesGeneration\PackagesGenerationResponseV2',
                            SoapFunctions::GENERATE_PACKAGES_NUMBERS_V3 => 'Webit\DPDClient\PackagesGeneration\PackagesGenerationResponseV3',
                            SoapFunctions::GENERATE_SPED_LABELS_V1 => 'Webit\DPDClient\DocumentGeneration\DocumentGenerationResponseV1',
                            SoapFunctions::GENERATE_SPED_LABELS_V2 => 'Webit\DPDClient\DocumentGeneration\DocumentGenerationResponseV2',
                            SoapFunctions::GENERATE_PROTOCOL_V1 => 'Webit\DPDClient\DocumentGeneration\DocumentGenerationResponseV1',
                            SoapFunctions::IMPORT_DELIVERY_BUSINESS_EVENT_V1 => 'Webit\DPDClient\ImportDeliveryBusinessEvent\ImportDeliveryBusinessEventResponseV1'
                        )
                    )
                )
            )
        );
    }
}
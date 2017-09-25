<?php

namespace Webit\DPDClient\DPDServices\Client;

final class SoapFunctions
{
    const FIND_POSTAL_CODE_V1 = 'findPostalCodeV1';
    const GET_COURIER_ORDER_AVAILABILITY_V1 = 'getCourierOrderAvailabilityV1';
    const PACKAGES_PICKUP_CALL_V1 = 'packagesPickupCallV1';
    const PACKAGES_PICKUP_CALL_V2 = 'packagesPickupCallV2';
    const PACKAGES_PICKUP_CALL_V3 = 'packagesPickupCallV3';
    const GENERATE_PACKAGES_NUMBERS_V1 = 'generatePackagesNumbersV1';
    const GENERATE_PACKAGES_NUMBERS_V2 = 'generatePackagesNumbersV2';
    const GENERATE_PACKAGES_NUMBERS_V3 = 'generatePackagesNumbersV3';
    const GENERATE_SPED_LABELS_V1 = 'generateSpedLabelsV1';
    const GENERATE_SPED_LABELS_V2 = 'generateSpedLabelsV2';
    const GENERATE_PROTOCOL_V1 = 'generateProtocolV1';
    const IMPORT_DELIVERY_BUSINESS_EVENT_V1 = 'importDeliveryBusinessEventV1';

    /**
     * @return string[]
     */
    public static function all()
    {
        return array(
            self::FIND_POSTAL_CODE_V1,
            self::GET_COURIER_ORDER_AVAILABILITY_V1,
            self::PACKAGES_PICKUP_CALL_V1,
            self::PACKAGES_PICKUP_CALL_V2,
            self::PACKAGES_PICKUP_CALL_V3,
            self::GENERATE_PACKAGES_NUMBERS_V1,
            self::GENERATE_PACKAGES_NUMBERS_V2,
            self::GENERATE_PACKAGES_NUMBERS_V3,
            self::GENERATE_SPED_LABELS_V1,
            self::GENERATE_SPED_LABELS_V2,
            self::GENERATE_PROTOCOL_V1,
            self::IMPORT_DELIVERY_BUSINESS_EVENT_V1
        );
    }
}
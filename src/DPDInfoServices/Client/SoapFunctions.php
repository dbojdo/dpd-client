<?php

namespace Webit\DPDClient\DPDInfoServices\Client;

final class SoapFunctions
{
    const GET_EVENTS_FOR_CUSTOMER_V1 = 'getEventsForCustomerV1';
    const GET_EVENTS_FOR_CUSTOMER_V2 = 'getEventsForCustomerV2';
    const GET_EVENTS_FOR_CUSTOMER_V3 = 'getEventsForCustomerV3';
    const GET_EVENTS_FOR_CUSTOMER_V4 = 'getEventsForCustomerV4';
    const GET_EVENTS_FOR_WAYBILL_V1 = 'getEventsForWaybillV1';
    const MARK_EVENTS_AS_PROCESSED_V1 = 'markEventsAsProcessedV1';

    /**
     * @return string[]
     */
    public static function all()
    {
        return array(
            self::GET_EVENTS_FOR_CUSTOMER_V1,
            self::GET_EVENTS_FOR_CUSTOMER_V2,
            self::GET_EVENTS_FOR_CUSTOMER_V3,
            self::GET_EVENTS_FOR_CUSTOMER_V4,
            self::GET_EVENTS_FOR_WAYBILL_V1,
            self::MARK_EVENTS_AS_PROCESSED_V1,
        );
    }
}

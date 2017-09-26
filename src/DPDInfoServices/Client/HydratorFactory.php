<?php

namespace Webit\DPDClient\DPDInfoServices\Client;

use Webit\DPDClient\Common\Client\HydratorFactory as BaseHydratorFactory;
use Webit\SoapApi\Hydrator\Serializer\ResultTypeMap;

class HydratorFactory extends BaseHydratorFactory
{
    /**
     * @inheritdoc
     */
    protected function resultTypeMap()
    {
        return new ResultTypeMap(
            array(
                SoapFunctions::GET_EVENTS_FOR_CUSTOMER_V1 => 'Webit\DPDClient\DPDInfoServices\CustomerEvents\CustomerEventsResponseV1',
                SoapFunctions::GET_EVENTS_FOR_CUSTOMER_V2 => 'Webit\DPDClient\DPDInfoServices\CustomerEvents\CustomerEventsResponseV1',
                SoapFunctions::GET_EVENTS_FOR_CUSTOMER_V3 => 'Webit\DPDClient\DPDInfoServices\CustomerEvents\CustomerEventsResponseV2',
                SoapFunctions::GET_EVENTS_FOR_CUSTOMER_V4 => 'Webit\DPDClient\DPDInfoServices\CustomerEvents\CustomerEventsResponseV3',
                SoapFunctions::GET_EVENTS_FOR_WAYBILL_V1 => 'Webit\DPDClient\DPDInfoServices\CustomerEvents\CustomerEventsResponseV3'
            )
        );
    }
}
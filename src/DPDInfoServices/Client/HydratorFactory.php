<?php

namespace Webit\DPDClient\DPDInfoServices\Client;

use JMS\Serializer\Serializer;
use Webit\DPDClient\Util\Hydrator\ResponseExtractingHydrator;
use Webit\SoapApi\Hydrator\ArrayHydrator;
use Webit\SoapApi\Hydrator\ChainHydrator;
use Webit\SoapApi\Hydrator\Hydrator;
use Webit\SoapApi\Hydrator\HydratorSerializerBased;
use Webit\SoapApi\Hydrator\ResultDumpingHydrator;
use Webit\SoapApi\Hydrator\Serializer\ResultTypeMap;
use Webit\SoapApi\Util\StdClassToArray;

class HydratorFactory
{
    /**
     * @param Serializer $serializer
     * @return Hydrator
     */
    public function create(Serializer $serializer)
    {
        return
            new ChainHydrator(
                array(
                    new ArrayHydrator(new StdClassToArray()),
                    $this->responseExtractingHydrator(),
                    new HydratorSerializerBased(
                        $serializer,
                        new ResultTypeMap(
                            array(
                                SoapFunctions::GET_EVENTS_FOR_CUSTOMER_V1 => 'Webit\DPDClient\DPDInfoServices\CustomerEvents\CustomerEventsResponseV1',
                                SoapFunctions::GET_EVENTS_FOR_CUSTOMER_V2 => 'Webit\DPDClient\DPDInfoServices\CustomerEvents\CustomerEventsResponseV1',
                                SoapFunctions::GET_EVENTS_FOR_CUSTOMER_V3 => 'Webit\DPDClient\DPDInfoServices\CustomerEvents\CustomerEventsResponseV2',
                                SoapFunctions::GET_EVENTS_FOR_CUSTOMER_V4 => 'Webit\DPDClient\DPDInfoServices\CustomerEvents\CustomerEventsResponseV3',
                                SoapFunctions::GET_EVENTS_FOR_WAYBILL_V1 => 'Webit\DPDClient\DPDInfoServices\CustomerEvents\CustomerEventsResponseV3'
                            )
                        )
                    )
                )
            );
    }

    /**
     * @return Hydrator
     */
    private function responseExtractingHydrator()
    {
        $hydrator = new ResponseExtractingHydrator();
        if (false) {
            return $hydrator;
        }

        return new ResultDumpingHydrator(
            $hydrator,
            __DIR__.'/dump'
        );
    }
}
<?php

namespace Webit\DPDClient\DPDInfoServices\Client;

use JMS\Serializer\Serializer;
use Webit\SoapApi\Hydrator\ArrayHydrator;
use Webit\SoapApi\Hydrator\ChainHydrator;
use Webit\SoapApi\Hydrator\Hydrator;
use Webit\SoapApi\Hydrator\HydratorSerializerBased;
use Webit\SoapApi\Hydrator\KeyExtractingHydrator;
use Webit\SoapApi\Hydrator\ResultDumpingHydrator;
use Webit\SoapApi\Hydrator\Serializer\ResultTypeMap;
use Webit\SoapApi\Util\Dumper\Dumper;
use Webit\SoapApi\Util\Dumper\VoidDumper;
use Webit\SoapApi\Util\StdClassToArray;

class HydratorFactory
{
    /**
     * @var Dumper
     */
    private $dumper;

    /**
     * HydratorFactory constructor.
     * @param Dumper $dumper
     */
    public function __construct(Dumper $dumper = null)
    {
        $this->dumper = $dumper ?: new VoidDumper();
    }

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
                    new ResultDumpingHydrator($this->dumper),
                    new KeyExtractingHydrator('return'),
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
}
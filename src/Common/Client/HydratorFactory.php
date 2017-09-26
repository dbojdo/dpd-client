<?php

namespace Webit\DPDClient\Common\Client;

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

abstract class HydratorFactory
{
    /** @var Dumper */
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
                        $this->resultTypeMap()
                    )
                )
            );
    }

    /**
     * Template method to be overridden
     * @return ResultTypeMap
     */
    protected function resultTypeMap()
    {
        return new ResultTypeMap(array());
    }
}
<?php

namespace Webit\DPDClient\DPDServices\Client;

use JMS\Serializer\Serializer;
use Webit\SoapApi\Input\ArrayWrappingNormaliser;
use Webit\SoapApi\Input\FrontInputNormaliser;
use Webit\SoapApi\Input\InputDumpingNormaliser;
use Webit\SoapApi\Input\InputNormaliser;
use Webit\SoapApi\Input\InputNormaliserSerializerBased;
use Webit\SoapApi\Input\Serializer\StaticSerializationContextFactory;
use Webit\SoapApi\Util\Dumper\Dumper;

class NormaliserFactory
{
    /**
     * @var Dumper
     */
    private $dumper;

    /**
     * NormaliserFactory constructor.
     * @param Dumper $dumper
     */
    public function __construct(Dumper $dumper)
    {
        $this->dumper = $dumper;
    }

    /**
     * @param Serializer $serializer
     * @return InputNormaliser
     */
    public function create(Serializer $serializer)
    {
        $serializerBasedNormaliser = new InputNormaliserSerializerBased(
            $serializer,
            new StaticSerializationContextFactory()
        );

        $soapFunctionNormaliser =
            new InputDumpingNormaliser(
                new ArrayWrappingNormaliser(
                    new InputNormaliserSerializerBased(
                        $serializer,
                        new StaticSerializationContextFactory()
                    )
                ),
                $this->dumper
            );

        return new FrontInputNormaliser(
            array_combine(
                $functions = SoapFunctions::all(),
                array_fill(0, count($functions), $soapFunctionNormaliser)
            ),
            $serializerBasedNormaliser
        );
    }
}

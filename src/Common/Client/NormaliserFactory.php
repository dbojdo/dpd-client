<?php

namespace Webit\DPDClient\Common\Client;

use JMS\Serializer\Serializer;
use Webit\SoapApi\Input\ArrayWrappingNormaliser;
use Webit\SoapApi\Input\FrontInputNormaliser;
use Webit\SoapApi\Input\InputDumpingNormaliser;
use Webit\SoapApi\Input\InputNormaliserSerializerBased;
use Webit\SoapApi\Input\Serializer\StaticSerializationContextFactory;
use Webit\SoapApi\Util\Dumper\Dumper;
use Webit\SoapApi\Util\Dumper\VoidDumper;

abstract class NormaliserFactory
{
    /** @var Dumper */
    private $dumper;

    /**
     * NormaliserFactory constructor.
     * @param Dumper $dumper
     */
    public function __construct(Dumper $dumper = null)
    {
        $this->dumper = $dumper ?: new VoidDumper();
    }

    /**
     * @inheritdoc
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
                $functions = $this->soapFunctions(),
                array_fill(0, count($functions), $soapFunctionNormaliser)
            ),
            $serializerBasedNormaliser
        );
    }

    /**
     * Template method to be overridden
     * @return array
     */
    protected function soapFunctions()
    {
        return array();
    }
}

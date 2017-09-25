<?php

namespace Webit\DPDClient\DPDServices\Client;

use JMS\Serializer\Serializer;
use Webit\SoapApi\Input\ArrayWrappingNormaliser;
use Webit\SoapApi\Input\FrontInputNormaliser;
use Webit\SoapApi\Input\InputNormaliser;
use Webit\SoapApi\Input\InputNormaliserSerializerBased;
use Webit\SoapApi\Input\Serializer\StaticSerializationContextFactory;

class NormaliserFactory
{
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
            new ArrayWrappingNormaliser(
                new InputNormaliserSerializerBased(
                    $serializer,
                    new StaticSerializationContextFactory()
                )
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

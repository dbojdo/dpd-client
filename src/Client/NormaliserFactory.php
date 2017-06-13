<?php
/**
 * Created by PhpStorm.
 * User: dbojdo
 * Date: 06/09/2017
 * Time: 10:46
 */

namespace Webit\DPDClient\Client;

use JMS\Serializer\SerializerInterface;
use Webit\SoapApi\Input\InputNormaliserSerializerBased;
use Webit\SoapApi\Input\Serializer\StaticSerializationContextFactory;

class NormaliserFactory
{
    /**
     * @param SerializerInterface $serializer
     * @return InputNormaliserSerializerBased
     */
    public function create(SerializerInterface $serializer)
    {
        return new InputNormaliserSerializerBased(
            $serializer,
            new StaticSerializationContextFactory()
        );
    }
}

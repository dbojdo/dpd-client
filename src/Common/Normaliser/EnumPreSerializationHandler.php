<?php

namespace Webit\DPDClient\Common\Normaliser;

use JMS\Serializer\JsonSerializationVisitor;
use JMS\Serializer\SerializationContext;

class EnumPreSerializationHandler
{
    /**
     * @param JsonSerializationVisitor $visitor
     * @param $data
     * @param $type
     * @param SerializationContext $context
     * @return string
     */
    public function serialize(JsonSerializationVisitor $visitor, $data, $type, SerializationContext $context)
    {
        return (string)$data;
    }

    /**
     * @return array
     */
    public static function createCallable()
    {
        return array(new self(), 'serialize');
    }
}

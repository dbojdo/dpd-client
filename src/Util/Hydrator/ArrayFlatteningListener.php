<?php

namespace Webit\DPDClient\Util\Hydrator;

use JMS\Serializer\EventDispatcher\PreDeserializeEvent;

class ArrayFlatteningListener
{
    /**
     * @var string
     */
    private $key;

    /**
     * ArrayFlatteningListener constructor.
     * @param string $key
     */
    public function __construct($key)
    {
        $this->key = $key;
    }

    /**
     * @param PreDeserializeEvent $event
     */
    public function flattenArray(PreDeserializeEvent $event)
    {
        $data = $event->getData();

        if (!(isset($data[$this->key]) && is_array($data[$this->key]))) {
            return;
        }

        $data[$this->key] = array_shift($data[$this->key]);

        $event->setData($data);
    }

    /**
     * @param string $key
     * @return callable
     */
    public static function createCallable($key)
    {
        return array(
            new self($key),
            'flattenArray'
        );
    }
}
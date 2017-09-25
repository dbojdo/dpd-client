<?php

namespace Webit\DPDClient\Util\Hydrator;

use JMS\Serializer\EventDispatcher\PreDeserializeEvent;

class ArrayEnsuringListener
{
    /** @var string */
    private $key;

    /** @var bool */
    private $notNull;

    /**
     * @param string $key
     * @param bool $notNull
     */
    public function __construct($key, $notNull = true)
    {
        $this->key = $key;
        $this->notNull = $notNull;
    }

    /**
     * @param PreDeserializeEvent $event
     */
    public function ensureArray(PreDeserializeEvent $event)
    {
        $data = $event->getData();
        if ($this->notNull && !isset($data[$this->key])) {
            $data[$this->key] = array();
        }

        if (array_key_exists($this->key, $data) && $data[$this->key]) {
            if (!isset($data[$this->key][0])) {
                $data[$this->key] = array($data[$this->key]);
            }
        }

        $event->setData($data);
    }

    /**
     * @param string $key
     * @param bool $notNull
     * @return callable
     */
    public static function createCallable($key, $notNull = true)
    {
        return array(
            new self($key, $notNull),
            'ensureArray'
        );
    }
}
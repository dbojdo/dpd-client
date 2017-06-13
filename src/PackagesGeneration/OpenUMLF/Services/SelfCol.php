<?php

namespace Webit\DPDClient\PackagesGeneration\OpenUMLF\Services;

use JMS\Serializer\Annotation as JMS;

class SelfCol
{
    const PRIV = 'PRIV';
    const COMP = 'COMP';

    /**
     * @var string
     * @JMS\SerializedName("receiver")
     * @JMS\Type("string")
     */
    private $receiver;

    /**
     * @param string $receiver
     */
    private function __construct($receiver)
    {
        $this->receiver = $receiver;
    }

    /**
     * @return SelfCol
     */
    public static function priv()
    {
        return new self(self::PRIV);
    }

    /**
     * @return SelfCol
     */
    public static function comp()
    {
        return new self(self::COMP);
    }
}
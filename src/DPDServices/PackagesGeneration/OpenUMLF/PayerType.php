<?php

namespace Webit\DPDClient\DPDServices\PackagesGeneration\OpenUMLF;

final class PayerType
{
    /** @var array */
    private static $types = array(
        'SENDER' => 'SENDER',
        'RECEIVER' => 'RECEIVER'
    );

    /** @var string */
    private $type;

    /**
     * PayerType constructor.
     * @param string $type
     */
    private function __construct($type)
    {
        $this->type = $type;
    }

    /**
     * @return PayerType
     */
    public static function sender()
    {
        return new self(self::$types['SENDER']);
    }

    /**
     * @return PayerType
     */
    public static function receiver()
    {
        return new self(self::$types['RECEIVER']);
    }

    /**
     * @inheritdoc
     */
    public function __toString()
    {
        return $this->type;
    }
}

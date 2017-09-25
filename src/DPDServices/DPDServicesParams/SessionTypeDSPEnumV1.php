<?php

namespace Webit\DPDClient\DPDServices\DPDServicesParams;

final class SessionTypeDSPEnumV1
{
    /** @var string[] */
    private static $types = array(
        'DOMESTIC' => 'DOMESTIC',
        'INTERNATIONAL' => 'INTERNATIONAL'
    );

    /** @var string */
    private $type;

    /**
     * PickupCallOrderTypeDPPEnumV1 constructor.
     * @param string $type
     */
    private function __construct($type)
    {
        $this->type = $type;
    }

    /**
     * @return SessionTypeDSPEnumV1
     */
    public static function domestic()
    {
        return new self(self::$types['DOMESTIC']);
    }

    /**
     * @return SessionTypeDSPEnumV1
     */
    public static function international()
    {
        return new self(self::$types['INTERNATIONAL']);
    }

    /**
     * @inheritdoc
     */
    public function __toString()
    {
        return $this->type;
    }
}

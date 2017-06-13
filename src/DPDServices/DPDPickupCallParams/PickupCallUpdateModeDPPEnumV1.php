<?php

namespace Webit\DPDClient\DPDServices\DPDPickupCallParams;

final class PickupCallUpdateModeDPPEnumV1
{
    /** @var string[] */
    private static $modes = array(
        'DONT_CREATE_NEW_IF_CLOSED' => 'DONT_CREATE_NEW_IF_CLOSED',
        'CREATE_NEW_IF_CLOSED' => 'CREATE_NEW_IF_CLOSED'
    );

    /** @var string */
    private $mode;

    /**
     * PickupCallUpdateModeDPPEnumV1 constructor.
     * @param string $mode
     */
    private function __construct($mode)
    {
        $this->mode = $mode;
    }

    /**
     * @return PickupCallUpdateModeDPPEnumV1
     */
    public static function dontCreateNewIfClosed()
    {
        return new self(self::$modes['DONT_CREATE_NEW_IF_CLOSED']);
    }

    /**
     * @return PickupCallUpdateModeDPPEnumV1
     */
    public static function createNewIfClosed()
    {
        return new self(self::$modes['CREATE_NEW_IF_CLOSED']);
    }

    /**
     * @inheritdoc
     */
    public function __toString()
    {
        return $this->mode;
    }
}

<?php

namespace Webit\DPDClient\DPDPickupCallParams;

final class PickupCallOperationTypeDPPEnumV1
{
    /** @var string[] */
    private static $types = array(
        'INSERT' => 'INSERT',
        'UPDATE' => 'UPDATE',
        'CANCEL' => 'CANCEL'
    );

    /** @var string */
    private $type;

    /**
     * PickupCallOperationTypeDPPEnumV1 constructor.
     * @param string $type
     */
    private function __construct($type)
    {
        $this->type = $type;
    }

    /**
     * @return PickupCallOperationTypeDPPEnumV1
     */
    public static function insert()
    {
        return new self(self::$types['INSERT']);
    }

    /**
     * @return PickupCallOperationTypeDPPEnumV1
     */
    public static function update()
    {
        return new self(self::$types['UPDATE']);
    }

    /**
     * @return PickupCallOperationTypeDPPEnumV1
     */
    public static function cancel()
    {
        return new self(self::$types['CANCEL']);
    }

    /**
     * @inheritdoc
     */
    public function __toString()
    {
        return $this->type;
    }
}

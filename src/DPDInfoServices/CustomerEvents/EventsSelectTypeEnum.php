<?php

namespace Webit\DPDClient\DPDInfoServices\CustomerEvents;

final class EventsSelectTypeEnum
{
    /**
     * @var string[]
     */
    private static $types = array(
        'ALL' => 'ALL',
        'ONLY_LAST' => 'ONLY_LAST'
    );

    /**
     * @var string
     */
    private $type;

    /**
     * EventsSelectTypeEnum constructor.
     * @param string $type
     */
    private function __construct($type)
    {
        $this->type = $type;
    }

    /**
     * @return EventsSelectTypeEnum
     */
    public static function all()
    {
        return new self(self::$types['ALL']);
    }

    /**
     * @return EventsSelectTypeEnum
     */
    public static function onlyLast()
    {
        return new self(self::$types['ONLY_LAST']);
    }

    /**
     * @inheritdoc
     */
    public function __toString()
    {
        return (string)$this->type;
    }
}
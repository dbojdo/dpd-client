<?php

namespace Webit\DPDClient\PackagesGeneration\OpenUMLF\Services;

use JMS\Serializer\Annotation as JMS;

class Guarantee
{
    const TIME_0930 = 'TIME0930';
    const TIME_1200 = 'TIME1200';
    const INTER = 'INTER';
    const TIMEFIXED = 'TIMEFIXED';
    const B2C = 'B2C';
    const SATURDAY = 'SATURDAY';

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("type")
     */
    private $type;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("attr1")
     */
    private $attr1;

    /**
     * @param string $type
     * @param string $attr1
     */
    private function __construct($type, $attr1 = null)
    {
        $this->type = $type;
        $this->attr1 = $attr1;
    }

    /**
     * @return string
     */
    public function type()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function attr1()
    {
        return $this->attr1;
    }

    /**
     * @return Guarantee
     */
    public static function saturday()
    {
        return new self(self::SATURDAY);
    }

    /**
     * @return Guarantee
     */
    public static function time0930()
    {
        return new self(self::TIME_0930);
    }

    /**
     * @return Guarantee
     */
    public static function time1200()
    {
        return new self(self::TIME_1200);
    }

    /**
     * @return Guarantee
     */
    public static function inter()
    {
        return new self(self::INTER);
    }

    /**
     * @param string $time
     * @return Guarantee
     */
    public static function timeFixed($time)
    {
        return new self(self::TIMEFIXED, $time);
    }

    /**
     * @param string $timeRange
     * @return Guarantee
     */
    public static function b2c($timeRange)
    {
        return new self(self::B2C, $timeRange);
    }
}
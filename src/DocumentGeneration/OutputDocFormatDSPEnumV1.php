<?php

namespace Webit\DPDClient\DocumentGeneration;

final class OutputDocFormatDSPEnumV1
{
    /** @var string[] */
    private static $formats = array(
        'PDF' => 'PDF',
        'ZPL' => 'ZPL',
        'EPL' => 'EPL'
    );

    /** @var string */
    private $format;

    /**
     * OutputDocFormatDSPEnumV1 constructor.
     * @param string $format
     */
    private function __construct($format)
    {
        $this->format = $format;
    }

    /**
     * @return OutputDocFormatDSPEnumV1
     */
    public static function pdf()
    {
        return new self(self::$formats['PDF']);
    }

    /**
     * @return OutputDocFormatDSPEnumV1
     */
    public static function zpl()
    {
        return new self(self::$formats['ZPL']);
    }

    /**
     * @return OutputDocFormatDSPEnumV1
     */
    public static function epl()
    {
        return new self(self::$formats['EPL']);
    }

    /**
     * @inheritdoc
     */
    public function __toString()
    {
        return $this->format;
    }
}

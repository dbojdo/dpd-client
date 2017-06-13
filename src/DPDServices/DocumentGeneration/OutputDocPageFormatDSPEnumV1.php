<?php

namespace Webit\DPDClient\DPDServices\DocumentGeneration;

final class OutputDocPageFormatDSPEnumV1
{
    /** @var string[] */
    private static $formats = array(
        'A4' => 'A4',
        'LBL_PRINTER' => 'LBL_PRINTER'
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
     * @return OutputDocPageFormatDSPEnumV1
     */
    public static function a4()
    {
        return new self(self::$formats['A4']);
    }

    /**
     * @return OutputDocPageFormatDSPEnumV1
     */
    public static function lblPrinter()
    {
        return new self(self::$formats['LBL_PRINTER']);
    }

    /**
     * @inheritdoc
     */
    public function __toString()
    {
        return $this->format;
    }
}

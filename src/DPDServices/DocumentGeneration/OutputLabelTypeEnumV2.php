<?php

namespace Webit\DPDClient\DPDServices\DocumentGeneration;

final class OutputLabelTypeEnumV2
{
    /** @var string[] */
    private static $types = array(
        'BIC3' => 'BIC3',
        'BIC3_EXTENDED1' => 'BIC3_EXTENDED1'
    );

    /**
     * @var string
     */
    private $type;

    /**
     * OutputLabelTypeEnumV2 constructor.
     * @param string $type
     */
    private function __construct($type)
    {
        $this->type = $type;
    }

    /**
     * @return OutputLabelTypeEnumV2
     */
    public static function bic3()
    {
        return new self(self::$types['BIC3']);
    }

    /**
     * @return OutputLabelTypeEnumV2
     */
    public static function bic3Extended1()
    {
        return new self(self::$types['BIC3_EXTENDED1']);
    }

    /**
     * @inheritdoc
     */
    public function __toString()
    {
        return $this->type;
    }
}
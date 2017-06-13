<?php

namespace Webit\DPDClient\DPDServices\DPDParcelBusinessEvent;

use JMS\Serializer\Annotation as JMS;

class DPDParcelBusinessEventDataV1
{
    /**
     * @var string
     * @JMS\SerializedName("code")
     * @JMS\Type("string")
     */
    private $code;

    /**
     * @var string
     * @JMS\SerializedName("value")
     * @JMS\Type("string")
     */
    private $value;

    /**
     * @param string $code
     * @param string $value
     */
    public function __construct($code, $value)
    {
        $this->code = $code;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function code()
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function value()
    {
        return $this->value;
    }
}
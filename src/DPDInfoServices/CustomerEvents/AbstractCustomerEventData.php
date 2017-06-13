<?php

namespace Webit\DPDClient\DPDInfoServices\CustomerEvents;

use JMS\Serializer\Annotation as JMS;

abstract class AbstractCustomerEventData
{
    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("code")
     */
    private $code;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("value")
     */
    private $value;

    /**
     * AbstractCustomerEventData constructor.
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

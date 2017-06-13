<?php

namespace Webit\DPDClient\DPDInfoServices\CustomerEvents;

use JMS\Serializer\Annotation as JMS;

class CustomerEventDataV3 extends AbstractCustomerEventData
{
    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("description")
     */
    private $description;

    /**
     * CustomerEventDataV3 constructor.
     * @param string $code
     * @param string $value
     * @param null $description
     */
    public function __construct($code, $value, $description = null)
    {
        parent::__construct($code, $value);
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function description()
    {
        return $this->description;
    }
}

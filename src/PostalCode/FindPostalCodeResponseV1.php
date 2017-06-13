<?php

namespace Webit\DPDClient\PostalCode;

use JMS\Serializer\Annotation as JMS;

class FindPostalCodeResponseV1
{
    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("status")
     */
    private $status;

    /**
     * @param string $status
     */
    public function __construct($status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function status()
    {
        return $this->status;
    }
}
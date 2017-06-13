<?php

namespace Webit\DPDClient\PostalCode;

use JMS\Serializer\Annotation as JMS;

abstract class AbstractPostalCodeV1
{
    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("countryCode")
     */
    private $countryCode;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("zipCode")
     */
    private $zipCode;

    /**
     * @param string $countryCode
     * @param string $zipCode
     */
    public function __construct($countryCode, $zipCode)
    {
        $this->countryCode = $countryCode;
        $this->zipCode = $zipCode;
    }

    /**
     * @return string
     */
    public function countryCode()
    {
        return $this->countryCode;
    }

    /**
     * @return string
     */
    public function zipCode()
    {
        return $this->zipCode;
    }
}
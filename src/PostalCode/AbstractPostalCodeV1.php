<?php
/**
 * Created by PhpStorm.
 * User: dbojdo
 * Date: 26/06/2017
 * Time: 15:53
 */

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
     * PostalCodeV1 constructor.
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
<?php
/**
 * Created by PhpStorm.
 * User: dbojdo
 * Date: 14/06/2017
 * Time: 10:06
 */

namespace Webit\DPDClient\DPDPickupCallParams;

use JMS\Serializer\Annotation as JMS;

class PickupSenderDPPV1
{
    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("senderName")
     */
    private $senderName;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("senderFullName")
     */
    private $senderFullName;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("senderAddress")
     */
    private $senderAddress;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("senderCity")
     */
    private $senderCity;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("senderPostalCode")
     */
    private $senderPostalCode;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("senderPhone")
     */
    private $senderPhone;

    /**
     * PickupSenderDPPV1 constructor.
     * @param string $senderName
     * @param string $senderFullName
     * @param string $senderAddress
     * @param string $senderCity
     * @param string $senderPostalCode
     * @param string $senderPhone
     */
    public function __construct(
        $senderName,
        $senderFullName,
        $senderAddress,
        $senderCity,
        $senderPostalCode,
        $senderPhone
    ) {
        $this->senderName = $senderName;
        $this->senderFullName = $senderFullName;
        $this->senderAddress = $senderAddress;
        $this->senderCity = $senderCity;
        $this->senderPostalCode = $senderPostalCode;
        $this->senderPhone = $senderPhone;
    }

    /**
     * @return string
     */
    public function senderName()
    {
        return $this->senderName;
    }

    /**
     * @return string
     */
    public function senderFullName()
    {
        return $this->senderFullName;
    }

    /**
     * @return string
     */
    public function senderAddress()
    {
        return $this->senderAddress;
    }

    /**
     * @return string
     */
    public function senderCity()
    {
        return $this->senderCity;
    }

    /**
     * @return string
     */
    public function senderPostalCode()
    {
        return $this->senderPostalCode;
    }

    /**
     * @return string
     */
    public function senderPhone()
    {
        return $this->senderPhone;
    }
}
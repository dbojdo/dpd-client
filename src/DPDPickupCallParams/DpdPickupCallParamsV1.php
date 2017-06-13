<?php

namespace Webit\DPDClient\DPDPickupCallParams;

use Webit\DPDClient\DPDServicesParams\PickupAddressDSPV1;
use JMS\Serializer\Annotation as JMS;

class DpdPickupCallParamsV1
{
    /**
     * @var PolicyDPPEnumV1
     * @JMS\Type("Webit\DPDClient\DPDPickupCallParams\PolicyDPPEnumV1")
     * @JMS\SerializedName("policy")
     */
    private $policy;

    /**
     * @var PickupAddressDSPV1
     * @JMS\Type("Webit\DPDClient\DPDServicesParams\PickupAddressDSPV1")
     * @JMS\SerializedName("pickupAddress")
     */
    private $pickupAddress;

    /**
     * @var ContactInfoDPPV1
     * @JMS\Type("Webit\DPDClient\DPDPickupCallParams\ContactInfoDPPV1")
     * @JMS\SerializedName("contactInfo")
     */
    private $contactInfo;

    /**
     * @var ProtocolDPPV1[]
     * @JMS\Type("array<Webit\DPDClient\DPDPickupCallParams\ProtocolDPPV1>")
     * @JMS\SerializedName("protocols")
     */
    private $protocols;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @JMS\SerializedName("pickupDate")
     */
    private $pickupDate;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("pickupTimeFrom")
     */
    private $pickupTimeFrom;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("pickupTimeTo")
     */
    private $pickupTomeTo;

    /**
     * @param PolicyDPPEnumV1 $policy
     * @param PickupAddressDSPV1 $pickupAddress
     * @param ContactInfoDPPV1 $contactInfo
     * @param ProtocolDPPV1[] $protocols
     * @param \DateTime $pickupDate
     * @param string $pickupTimeFrom
     * @param string $pickupTomeTo
     */
    public function __construct(
        PolicyDPPEnumV1 $policy,
        PickupAddressDSPV1 $pickupAddress,
        ContactInfoDPPV1 $contactInfo = null,
        array $protocols,
        \DateTime $pickupDate,
        $pickupTimeFrom = null,
        $pickupTomeTo = null
    ) {
        $this->policy = $policy;
        $this->pickupAddress = $pickupAddress;
        $this->contactInfo = $contactInfo ?: new ContactInfoDPPV1();
        $this->protocols = $protocols;
        $this->pickupDate = $pickupDate;
        $this->pickupTimeFrom = $pickupTimeFrom ?: '';
        $this->pickupTomeTo = $pickupTomeTo ?: '';
    }

    /**
     * @return string
     */
    public function policy()
    {
        return $this->policy;
    }

    /**
     * @return PickupAddressDSPV1
     */
    public function pickupAddress()
    {
        return $this->pickupAddress;
    }

    /**
     * @return ContactInfoDPPV1
     */
    public function contactInfo()
    {
        return $this->contactInfo;
    }

    /**
     * @return ProtocolDPPV1[]
     */
    public function protocols()
    {
        return $this->protocols;
    }

    /**
     * @return \DateTime
     */
    public function pickupDate()
    {
        return $this->pickupDate;
    }

    /**
     * @return string
     */
    public function pickupTimeFrom()
    {
        return $this->pickupTimeFrom;
    }

    /**
     * @return string
     */
    public function pickupTomeTo()
    {
        return $this->pickupTomeTo;
    }
}
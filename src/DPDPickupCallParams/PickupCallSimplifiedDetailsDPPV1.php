<?php

namespace Webit\DPDClient\DPDPickupCallParams;

use JMS\Serializer\Annotation as JMS;

class PickupCallSimplifiedDetailsDPPV1
{
    /**
     * @var PickupPayerDPPV1
     * @JMS\Type("Webit\DPDClient\DPDPickupCallParams\PickupPayerDPPV1")
     * @JMS\SerializedName("pickupPayer")
     */
    private $pickupPayer;

    /**
     * @var PickupCustomerDPPV1
     * @JMS\Type("Webit\DPDClient\DPDPickupCallParams\PickupCustomerDPPV1")
     * @JMS\SerializedName("pickupCustomer")
     */
    private $pickupCustomer;

    /**
     * @var PickupSenderDPPV1
     * @JMS\Type("Webit\DPDClient\DPDPickupCallParams\PickupSenderDPPV1")
     * @JMS\SerializedName("pickupSender")
     */
    private $pickupSender;

    /**
     * @var PickupPackagesParamsDPPV1
     * @JMS\Type("Webit\DPDClient\DPDPickupCallParams\PickupPackagesParamsDPPV1")
     * @JMS\SerializedName("packagesParams")
     */
    private $packagesParams;

    /**
     * @param PickupPayerDPPV1 $pickupPayer
     * @param PickupCustomerDPPV1 $pickupCustomer
     * @param PickupSenderDPPV1 $pickupSender
     * @param PickupPackagesParamsDPPV1 $packagesParams
     */
    public function __construct(
        PickupPayerDPPV1 $pickupPayer,
        PickupCustomerDPPV1 $pickupCustomer = null,
        PickupSenderDPPV1 $pickupSender,
        PickupPackagesParamsDPPV1 $packagesParams
    ) {
        $this->pickupPayer = $pickupPayer;
        $this->pickupCustomer = $pickupCustomer;
        $this->pickupSender = $pickupSender;
        $this->packagesParams = $packagesParams;
    }

    /**
     * @return PickupPayerDPPV1
     */
    public function pickupPayer()
    {
        return $this->pickupPayer;
    }

    /**
     * @return PickupCustomerDPPV1
     */
    public function pickupCustomer()
    {
        return $this->pickupCustomer;
    }

    /**
     * @return PickupSenderDPPV1
     */
    public function pickupSender()
    {
        return $this->pickupSender;
    }

    /**
     * @return PickupPackagesParamsDPPV1
     */
    public function packagesParams()
    {
        return $this->packagesParams;
    }
}
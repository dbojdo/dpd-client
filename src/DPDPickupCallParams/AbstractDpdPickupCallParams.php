<?php

namespace Webit\DPDClient\DPDPickupCallParams;

use JMS\Serializer\Annotation as JMS;

abstract class AbstractDpdPickupCallParams
{
    /**
     * @var PickupCallOperationTypeDPPEnumV1
     * @JMS\Type("string")
     * @JMS\SerializedName("operationType")
     */
    private $operationType;

    /**
     * @var PickupCallUpdateModeDPPEnumV1
     * @JMS\Type("string")
     * @JMS\SerializedName("updateMode")
     */
    private $updateMode;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("orderNumber")
     */
    private $orderNumber;

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
    private $pickupTimeTo;

    /**
     * @var PickupCallOrderTypeDPPEnumV1
     * @JMS\Type("string")
     * @JMS\SerializedName("orderType")
     */
    private $orderType;

    /**
     * @var bool
     * @JMS\Type("boolean")
     * @JMS\SerializedName("waybillsReady")
     */
    private $waybillsReady;

    /**
     * @var PickupCallSimplifiedDetailsDPPV1
     * @JMS\Type("Webit\DPDClient\DPDPickupCallParams\PickupCallSimplifiedDetailsDPPV1")
     * @JMS\SerializedName("pickupCallSimplifiedDetails")
     */
    private $pickupCallSimplifiedDetails;

    /**
     * @param PickupCallOperationTypeDPPEnumV1 $operationType
     * @param PickupCallUpdateModeDPPEnumV1 $updateMode
     * @param string $orderNumber
     * @param \DateTime $pickupDate
     * @param string $pickupTimeFrom
     * @param string $pickupTimeTo
     * @param PickupCallOrderTypeDPPEnumV1 $orderType
     * @param bool $waybillsReady
     * @param PickupCallSimplifiedDetailsDPPV1 $pickupCallSimplifiedDetails
     */
    public function __construct(
        PickupCallOperationTypeDPPEnumV1 $operationType,
        PickupCallUpdateModeDPPEnumV1 $updateMode = null,
        $orderNumber,
        \DateTime $pickupDate,
        $pickupTimeFrom,
        $pickupTimeTo,
        PickupCallOrderTypeDPPEnumV1 $orderType,
        $waybillsReady,
        PickupCallSimplifiedDetailsDPPV1 $pickupCallSimplifiedDetails
    ) {
        $this->operationType = $operationType;
        $this->updateMode = $updateMode;
        $this->orderNumber = $orderNumber;
        $this->pickupDate = $pickupDate;
        $this->pickupTimeFrom = $pickupTimeFrom;
        $this->pickupTimeTo = $pickupTimeTo;
        $this->orderType = $orderType;
        $this->waybillsReady = $waybillsReady;
        $this->pickupCallSimplifiedDetails = $pickupCallSimplifiedDetails;
    }

    /**
     * @return PickupCallOperationTypeDPPEnumV1
     */
    public function operationType()
    {
        return $this->operationType;
    }

    /**
     * @return PickupCallUpdateModeDPPEnumV1
     */
    public function updateMode()
    {
        return $this->updateMode;
    }

    /**
     * @return string
     */
    public function orderNumber()
    {
        return $this->orderNumber;
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
    public function pickupTimeTo()
    {
        return $this->pickupTimeTo;
    }

    /**
     * @return PickupCallOrderTypeDPPEnumV1
     */
    public function orderType()
    {
        return $this->orderType;
    }

    /**
     * @return bool
     */
    public function waybillsReady()
    {
        return $this->waybillsReady;
    }

    /**
     * @return PickupCallSimplifiedDetailsDPPV1
     */
    public function pickupCallSimplifiedDetails()
    {
        return $this->pickupCallSimplifiedDetails;
    }
}
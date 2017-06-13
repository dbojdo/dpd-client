<?php
/**
 * Created by PhpStorm.
 * User: dbojdo
 * Date: 21/08/2017
 * Time: 10:34
 */

namespace Webit\DPDClient\DPDPickupCallParams;

use JMS\Serializer\Annotation as JMS;

abstract class AbstractDpdPickupCallParams
{
    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("operationType")
     */
    private $operationType;

    /**
     * @var string
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
     * @var string
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
     * DpdPickupCallParamsV2 constructor.
     * @param string $operationType
     * @param string $updateMode
     * @param string $orderNumber
     * @param \DateTime $pickupDate
     * @param string $pickupTimeFrom
     * @param string $pickupTimeTo
     * @param string $orderType
     * @param bool $waybillsReady
     * @param PickupCallSimplifiedDetailsDPPV1 $pickupCallSimplifiedDetails
     */
    public function __construct(
        $operationType,
        $updateMode,
        $orderNumber,
        \DateTime $pickupDate,
        $pickupTimeFrom,
        $pickupTimeTo,
        $orderType,
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
     * @return string
     */
    public function operationType()
    {
        return $this->operationType;
    }

    /**
     * @return string
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
     * @return string
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
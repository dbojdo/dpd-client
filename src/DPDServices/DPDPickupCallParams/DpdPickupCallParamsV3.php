<?php

namespace Webit\DPDClient\DPDServices\DPDPickupCallParams;

use JMS\Serializer\Annotation as JMS;

class DpdPickupCallParamsV3 extends AbstractDpdPickupCallParams
{
    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("checkSum")
     */
    private $checkSum;

    /**
     * @param PickupCallOperationTypeDPPEnumV1 $operationType
     * @param PickupCallUpdateModeDPPEnumV1 $updateMode
     * @param string $orderNumber
     * @param int $checkSum
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
        $checkSum,
        \DateTime $pickupDate,
        $pickupTimeFrom,
        $pickupTimeTo,
        PickupCallOrderTypeDPPEnumV1 $orderType,
        $waybillsReady,
        PickupCallSimplifiedDetailsDPPV1 $pickupCallSimplifiedDetails
    ) {
        parent::__construct(
            $operationType,
            $updateMode,
            $orderNumber,
            $pickupDate,
            $pickupTimeFrom,
            $pickupTimeTo,
            $orderType,
            $waybillsReady,
            $pickupCallSimplifiedDetails
        );
        $this->checkSum = $checkSum;
    }

    /**
     * @return int
     */
    public function checkSum()
    {
        return $this->checkSum;
    }

    /**
     * @param \DateTime $pickupDate
     * @param string $pickupTimeFrom
     * @param string $pickupTimeTo
     * @param PickupCallOrderTypeDPPEnumV1 $orderType
     * @param bool $waybillsReady
     * @param PickupCallSimplifiedDetailsDPPV1 $pickupCallSimplifiedDetails
     * @return DpdPickupCallParamsV3
     */
    public static function insert(
        \DateTime $pickupDate,
        $pickupTimeFrom,
        $pickupTimeTo,
        PickupCallOrderTypeDPPEnumV1 $orderType,
        $waybillsReady,
        PickupCallSimplifiedDetailsDPPV1 $pickupCallSimplifiedDetails
    ) {

        return new self(
            PickupCallOperationTypeDPPEnumV1::insert(),
            null,
            null,
            null,
            $pickupDate,
            $pickupTimeFrom,
            $pickupTimeTo,
            $orderType,
            $waybillsReady,
            $pickupCallSimplifiedDetails
        );
    }

    /**
     * @param PickupCallUpdateModeDPPEnumV1 $updateMode
     * @param string $orderNumber
     * @param int $checkSum
     * @param \DateTime $pickupDate
     * @param string $pickupTimeFrom
     * @param string $pickupTimeTo
     * @param PickupCallOrderTypeDPPEnumV1 $orderType
     * @param bool $waybillsReady
     * @param PickupCallSimplifiedDetailsDPPV1 $pickupCallSimplifiedDetails
     * @return DpdPickupCallParamsV3
     */
    public static function update(
        PickupCallUpdateModeDPPEnumV1 $updateMode,
        $orderNumber,
        $checkSum,
        \DateTime $pickupDate,
        $pickupTimeFrom,
        $pickupTimeTo,
        PickupCallOrderTypeDPPEnumV1 $orderType,
        $waybillsReady,
        PickupCallSimplifiedDetailsDPPV1 $pickupCallSimplifiedDetails
    ) {
        return new self(
            PickupCallOperationTypeDPPEnumV1::update(),
            $updateMode,
            $orderNumber,
            $checkSum,
            $pickupDate,
            $pickupTimeFrom,
            $pickupTimeTo,
            $orderType,
            $waybillsReady,
            $pickupCallSimplifiedDetails
        );
    }

    /**
     * @param string $orderNumber
     * @param int $checkSum
     * @param \DateTime $pickupDate
     * @param string $pickupTimeFrom
     * @param string $pickupTimeTo
     * @param PickupCallOrderTypeDPPEnumV1 $orderType
     * @param bool $waybillsReady
     * @param PickupCallSimplifiedDetailsDPPV1 $pickupCallSimplifiedDetails
     * @return DpdPickupCallParamsV3
     */
    public static function cancel(
        $orderNumber,
        $checkSum,
        \DateTime $pickupDate,
        $pickupTimeFrom,
        $pickupTimeTo,
        PickupCallOrderTypeDPPEnumV1 $orderType,
        $waybillsReady,
        PickupCallSimplifiedDetailsDPPV1 $pickupCallSimplifiedDetails
    ) {
        return new self(
            PickupCallOperationTypeDPPEnumV1::cancel(),
            null,
            $orderNumber,
            $checkSum,
            $pickupDate,
            $pickupTimeFrom,
            $pickupTimeTo,
            $orderType,
            $waybillsReady,
            $pickupCallSimplifiedDetails
        );
    }
}
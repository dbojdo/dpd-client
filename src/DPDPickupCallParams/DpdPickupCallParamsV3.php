<?php
/**
 * Created by PhpStorm.
 * User: dbojdo
 * Date: 14/06/2017
 * Time: 09:57
 */

namespace Webit\DPDClient\DPDPickupCallParams;

use JMS\Serializer\Annotation as JMS;

class DpdPickupCallParamsV3 extends AbstractDpdPickupCallParams
{

    /**
     * @var int
     * @JMS\Type("int")
     * @JMS\SerializedName("checkSum")
     */
    private $checkSum;

    /**
     * DpdPickupCallParamsV3 constructor.
     * @param string $operationType
     * @param string $updateMode
     * @param string $orderNumber
     * @param int $checkSum
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
        $checkSum,
        \DateTime $pickupDate,
        $pickupTimeFrom,
        $pickupTimeTo,
        $orderType,
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
     * @param string $orderType
     * @param bool $waybillsReady
     * @param PickupCallSimplifiedDetailsDPPV1 $pickupCallSimplifiedDetails
     * @return DpdPickupCallParamsV3
     */
    public static function insert(
        \DateTime $pickupDate,
        $pickupTimeFrom,
        $pickupTimeTo,
        $orderType,
        $waybillsReady,
        PickupCallSimplifiedDetailsDPPV1 $pickupCallSimplifiedDetails
    ) {
        return new self(
            PickupCallOperationTypeDPPEnumV1::INSERT,
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
     * @param string $updateMode
     * @param string $orderNumber
     * @param int $checkSum
     * @param \DateTime $pickupDate
     * @param string $pickupTimeFrom
     * @param string $pickupTimeTo
     * @param string $orderType
     * @param bool $waybillsReady
     * @param PickupCallSimplifiedDetailsDPPV1 $pickupCallSimplifiedDetails
     * @return DpdPickupCallParamsV3
     */
    public static function update(
        $updateMode,
        $orderNumber,
        $checkSum,
        \DateTime $pickupDate,
        $pickupTimeFrom,
        $pickupTimeTo,
        $orderType,
        $waybillsReady,
        PickupCallSimplifiedDetailsDPPV1 $pickupCallSimplifiedDetails
    ) {
        return new self(
            PickupCallOperationTypeDPPEnumV1::UPDATE,
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
     * @param string $orderType
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
        $orderType,
        $waybillsReady,
        PickupCallSimplifiedDetailsDPPV1 $pickupCallSimplifiedDetails
    ) {
        return new self(
            PickupCallOperationTypeDPPEnumV1::CANCEL,
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
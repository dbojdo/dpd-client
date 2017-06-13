<?php
/**
 * Created by PhpStorm.
 * User: dbojdo
 * Date: 21/08/2017
 * Time: 10:38
 */

namespace Webit\DPDClient\PackagesPickupCall;

use JMS\Serializer\Annotation as JMS;

abstract class AbstractPickupCallResponse
{
    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("orderNumber")
     */
    private $orderNumber;

    /**
     * @var StatusInfoPCRV2
     * @JMS\Type("Webit\DPDClient\PackagesPickupCall\StatusInfoPCRV2")
     * @JMS\SerializedName("statusInfo")
     */
    private $statusInfo;

    /**
     * PackagesPickupCallResponseV2 constructor.
     * @param string $orderNumber
     * @param StatusInfoPCRV2 $statusInfo
     */
    public function __construct($orderNumber, StatusInfoPCRV2 $statusInfo)
    {
        $this->orderNumber = $orderNumber;
        $this->statusInfo = $statusInfo;
    }

    /**
     * @return string
     */
    public function orderNumber()
    {
        return $this->orderNumber;
    }

    /**
     * @return StatusInfoPCRV2
     */
    public function statusInfo()
    {
        return $this->statusInfo;
    }
}
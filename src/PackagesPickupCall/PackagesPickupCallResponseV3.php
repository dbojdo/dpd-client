<?php
/**
 * Created by PhpStorm.
 * User: dbojdo
 * Date: 14/06/2017
 * Time: 10:42
 */

namespace Webit\DPDClient\PackagesPickupCall;

use JMS\Serializer\Annotation as JMS;

class PackagesPickupCallResponseV3 extends AbstractPickupCallResponse
{
    /**
     * @var int
     * @JMS\Type("int")
     * @JMS\SerializedName("checkSum")
     */
    private $checkSum;

    /**
     * PackagesPickupCallResponseV3 constructor.
     * @param string $orderNumber
     * @param StatusInfoPCRV2 $statusInfo
     * @param int $checkSum
     */
    public function __construct($orderNumber, StatusInfoPCRV2 $statusInfo, $checkSum)
    {
        parent::__construct($orderNumber, $statusInfo);
        $this->checkSum = $checkSum;
    }

    /**
     * @return int
     */
    public function checkSum()
    {
        return $this->checkSum;
    }
}

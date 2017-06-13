<?php
/**
 * Created by PhpStorm.
 * User: dbojdo
 * Date: 14/06/2017
 * Time: 10:02
 */

namespace Webit\DPDClient\DPDPickupCallParams;

use JMS\Serializer\Annotation as JMS;

class PickupPayerDPPV1
{
    /**
     * @var int
     * @JMS\Type("int")
     * @JMS\SerializedName("payerNumber")
     */
    private $payerNumber;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("payerName")
     */
    private $payerName;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("payerCostCentre")
     */
    private $payerCostCenter;

    /**
     * PickupPayerDPPV1 constructor.
     * @param int $payerNumber
     * @param string $payerName
     * @param string $payerCostCenter
     */
    public function __construct($payerNumber, $payerName, $payerCostCenter)
    {
        $this->payerNumber = $payerNumber;
        $this->payerName = $payerName;
        $this->payerCostCenter = $payerCostCenter;
    }

    /**
     * @return int
     */
    public function payerNumber()
    {
        return $this->payerNumber;
    }

    /**
     * @return string
     */
    public function payerName()
    {
        return $this->payerName;
    }

    /**
     * @return string
     */
    public function payerCostCenter()
    {
        return $this->payerCostCenter;
    }
}
<?php

namespace Webit\DPDClient\DPDPickupCallParams;

use JMS\Serializer\Annotation as JMS;

class PickupPayerDPPV1
{
    /**
     * @var int
     * @JMS\Type("integer")
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
     * @param int $payerNumber
     * @param string $payerName
     * @param string $payerCostCenter
     */
    public function __construct($payerNumber, $payerName, $payerCostCenter = null)
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
<?php

namespace Webit\DPDClient\DPDServices\DocumentGeneration;

use JMS\Serializer\Annotation as JMS;

class ParcelDGRV1
{
    /**
     * @var int
     * @JMS\SerializedName("parcelId")
     * @JMS\Type("integer")
     */
    private $parcelId;

    /**
     * @var string
     * @JMS\SerializedName("reference")
     * @JMS\Type("string")
     */
    private $reference;

    /**
     * @var string
     * @JMS\SerializedName("waybill")
     * @JMS\Type("string")
     */
    private $waybill;

    /**
     * @var StatusInfoDGRV1
     * @JMS\SerializedName("statusInfo")
     * @JMS\Type("Webit\DPDClient\DPDServices\DocumentGeneration\StatusInfoDGRV1")
     */
    private $statusInfo;

    /**
     * @param int $parcelId
     * @param string $reference
     * @param string $waybill
     * @param StatusInfoDGRV1 $statusInfo
     */
    public function __construct($parcelId, $reference, $waybill, StatusInfoDGRV1 $statusInfo)
    {
        $this->parcelId = $parcelId;
        $this->reference = $reference;
        $this->waybill = $waybill;
        $this->statusInfo = $statusInfo;
    }

    /**
     * @return int
     */
    public function parcelId()
    {
        return $this->parcelId;
    }

    /**
     * @return string
     */
    public function reference()
    {
        return $this->reference;
    }

    /**
     * @return string
     */
    public function waybill()
    {
        return $this->waybill;
    }

    /**
     * @return StatusInfoDGRV1
     */
    public function statusInfo()
    {
        return $this->statusInfo;
    }
}
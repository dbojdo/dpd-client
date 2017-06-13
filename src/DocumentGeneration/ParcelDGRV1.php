<?php
/**
 * Created by PhpStorm.
 * User: dbojdo
 * Date: 13/06/2017
 * Time: 17:01
 */

namespace Webit\DPDClient\DocumentGeneration;

use JMS\Serializer\Annotation as JMS;

class ParcelDGRV1
{
    /**
     * @var int
     * @JMS\SerializedName("parcelId")
     * @JMS\Type("int")
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
     * @JMS\Type("Webit\DPDClient\DocumentGeneration\StatusInfoDGRV1")
     */
    private $statusInfo;

    /**
     * ParcelDGRV1 constructor.
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
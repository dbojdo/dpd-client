<?php

namespace Webit\DPDClient\PackagesGeneration;

use JMS\Serializer\Annotation as JMS;

class ParcelPGRV2
{
    /**
     * @var string
     * @JMS\SerializedName("Status")
     * @JMS\Type("string")
     */
    private $status;

    /**
     * @var int
     * @JMS\SerializedName("ParcelId")
     * @JMS\Type("integer")
     */
    private $parcelId;

    /**
     * @var string
     * @JMS\SerializedName("Reference")
     * @JMS\Type("string")
     */
    private $reference;

    /**
     * @var string
     * @JMS\SerializedName("Waybill")
     * @JMS\Type("string")
     */
    private $waybill;

    /**
     * @var ValidationInfoPGRV2[]
     * @JMS\SerializedName("ValidationDetails")
     * @JMS\Type("array<Webit\DPDClient\PackagesGeneration\ValidationInfoPGRV2>")
     */
    private $validationDetails;

    /**
     * ParcelPGRV2 constructor.
     * @param string $status
     * @param int $parcelId
     * @param string $reference
     * @param string $waybill
     * @param ValidationInfoPGRV2[] $validationDetails
     */
    public function __construct($status, $parcelId, $reference, $waybill, array $validationDetails)
    {
        $this->status = $status;
        $this->parcelId = $parcelId;
        $this->reference = $reference;
        $this->waybill = $waybill;
        $this->validationDetails = $validationDetails;
    }

    /**
     * @return string
     */
    public function status()
    {
        return $this->status;
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
     * @return ValidationInfoPGRV2[]
     */
    public function validationDetails()
    {
        return $this->validationDetails;
    }
}
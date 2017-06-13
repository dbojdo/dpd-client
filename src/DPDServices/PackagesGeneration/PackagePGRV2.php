<?php

namespace Webit\DPDClient\DPDServices\PackagesGeneration;

use JMS\Serializer\Annotation as JMS;

class PackagePGRV2 implements \IteratorAggregate
{
    /**
     * @var string
     * @JMS\SerializedName("Status")
     * @JMS\Type("string")
     */
    private $status;

    /**
     * @var int
     * @JMS\SerializedName("PackageId")
     * @JMS\Type("integer")
     */
    private $packageId;

    /**
     * @var string
     * @JMS\SerializedName("Reference")
     * @JMS\Type("string")
     */
    private $reference;

    /**
     * @var ValidationInfoPGRV2[]
     * @JMS\SerializedName("ValidationDetails")
     * @JMS\Type("array<Webit\DPDClient\DPDServices\PackagesGeneration\ValidationInfoPGRV2>")
     */
    private $validationDetails;

    /**
     * @var ParcelPGRV2[]
     * @JMS\SerializedName("Parcels")
     * @JMS\Type("array<Webit\DPDClient\DPDServices\PackagesGeneration\ParcelPGRV2>")
     */
    private $parcels;

    /**
     * PackagePGRV2 constructor.
     * @param string $status
     * @param int $packageId
     * @param string $reference
     * @param ValidationInfoPGRV2[] $validationDetails
     * @param ParcelPGRV2[] $parcels
     */
    public function __construct($status, $packageId, $reference, array $validationDetails, array $parcels)
    {
        $this->status = $status;
        $this->packageId = $packageId;
        $this->reference = $reference;
        $this->validationDetails = $validationDetails;
        $this->parcels = $parcels;
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
    public function packageId()
    {
        return $this->packageId;
    }

    /**
     * @return string
     */
    public function reference()
    {
        return $this->reference;
    }

    /**
     * @return ValidationInfoPGRV2[]
     */
    public function validationDetails()
    {
        return $this->validationDetails;
    }

    /**
     * @return ParcelPGRV2[]
     */
    public function parcels()
    {
        return $this->parcels;
    }

    /**
     * @inheritdoc
     */
    public function getIterator()
    {
        return new \ArrayIterator((array)$this->parcels);
    }
}
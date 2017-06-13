<?php

namespace Webit\DPDClient\PackagesGeneration;

use JMS\Serializer\Annotation as JMS;

class PackagePGRV1
{
    /**
     * @var int
     * @JMS\SerializedName("packageId")
     * @JMS\Type("integer")
     */
    private $packageId;

    /**
     * @var string
     * @JMS\SerializedName("reference")
     * @JMS\Type("string")
     */
    private $reference;

    /**
     * @var string
     * @JMS\SerializedName("status")
     * @JMS\Type("string")
     */
    private $status;

    /**
     * @var InvalidFieldPGRV1[]
     * @JMS\SerializedName("invalidFields")
     * @JMS\Type("array<Webit\DPDClient\PackagesGeneration\InvalidFieldPGRV1>")
     */
    private $invalidFields;

    /**
     * @var ParcelPGRV1[]
     * @JMS\SerializedName("parcels")
     * @JMS\Type("array<Webit\DPDClient\PackagesGeneration\ParcelPGRV1>")
     */
    private $parcels;

    /**
     * @param int $packageId
     * @param string $reference
     * @param string $status
     * @param InvalidFieldPGRV1[] $invalidFields
     * @param ParcelPGRV1[] $parcels
     */
    public function __construct($packageId, $reference, $status, array $invalidFields, array $parcels)
    {
        $this->packageId = $packageId;
        $this->reference = $reference;
        $this->status = $status;
        $this->invalidFields = $invalidFields;
        $this->parcels = $parcels;
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
     * @return string
     */
    public function status()
    {
        return $this->status;
    }

    /**
     * @return InvalidFieldPGRV1[]
     */
    public function invalidFields()
    {
        return $this->invalidFields;
    }

    /**
     * @return ParcelPGRV1[]
     */
    public function parcels()
    {
        return $this->parcels;
    }
}
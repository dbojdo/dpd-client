<?php

namespace Webit\DPDClient\DPDServices\DPDServicesParams;

use JMS\Serializer\Annotation as JMS;

class PackageDSPV1
{
    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("packageId")
     */
    private $packageId;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("searchKey")
     */
    private $searchKey;

    /**
     * @var ParcelDSPV1[]
     * @JMS\Type("array<Webit\DPDClient\DPDServices\DPDServicesParams\ParcelDSPV1>")
     * @JMS\SerializedName("parcels")
     */
    private $parcels;

    /**
     * @param int $packageId
     * @param string $searchKey
     * @param ParcelDSPV1[] $parcels
     */
    public function __construct($packageId = null, $searchKey = null, array $parcels = array())
    {
        $this->packageId = $packageId;
        $this->searchKey = $searchKey;
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
    public function searchKey()
    {
        return $this->searchKey;
    }

    /**
     * @return ParcelDSPV1[]|null
     */
    public function parcels()
    {
        return $this->parcels;
    }

    /**
     * @param int $packageId
     * @return PackageDSPV1
     */
    public static function fromPackageId($packageId)
    {
        return new self($packageId, null, array());
    }

    /**
     * @param string $searchKey
     * @return PackageDSPV1
     */
    public static function fromSearchKey($searchKey)
    {
        return new self(null, $searchKey, array());
    }

    /**
     * @param ParcelDSPV1[] $parcels
     * @return PackageDSPV1
     */
    public static function fromParcels(array $parcels)
    {
        return new self(null, null, $parcels);
    }
}
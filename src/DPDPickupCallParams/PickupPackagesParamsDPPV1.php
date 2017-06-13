<?php

namespace Webit\DPDClient\DPDPickupCallParams;

use JMS\Serializer\Annotation as JMS;

class PickupPackagesParamsDPPV1
{
    /**
     * @var bool
     * @JMS\Type("boolean")
     * @JMS\SerializedName("dox")
     */
    private $dox;

    /**
     * @var bool
     * @JMS\Type("boolean")
     * @JMS\SerializedName("standardParcel")
     */
    private $standardParcel;

    /**
     * @var bool
     * @JMS\Type("boolean")
     * @JMS\SerializedName("pallet")
     */
    private $pallet;

    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("parcelsCount")
     */
    private $parcelsCount;

    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("palletsCount")
     */
    private $palletsCount;

    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("doxCount")
     */
    private $doxCount;

    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("parcelsWeight")
     */
    private $parcelsWeight;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("parcelMaxWeight")
     */
    private $parcelMaxWeight;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("parcelMaxHeight")
     */
    private $parcelMaxHeight;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("parcelMaxWidth")
     */
    private $parcelMaxWidth;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("parcelMaxDepth")
     */
    private $parcelMaxDepth;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("palletsWeight")
     */
    private $palletsWeight;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("palletMaxWeight")
     */
    private $palletMaxWeight;

    /**
     * @var float
     * @JMS\Type("double")
     * @JMS\SerializedName("palletMaxHeight")
     */
    private $palletMaxHeight;

    /**
     * @param bool $dox
     * @param bool $standardParcel
     * @param bool $pallet
     * @param int $parcelsCount
     * @param int $palletsCount
     * @param int $doxCount
     * @param int $parcelsWeight
     * @param float $parcelMaxWeight
     * @param float $parcelMaxHeight
     * @param float $parcelMaxWidth
     * @param float $parcelMaxDepth
     * @param float $palletsWeight
     * @param float $palletMaxWeight
     * @param float $palletMaxHeight
     */
    public function __construct(
        $dox,
        $standardParcel,
        $pallet,
        $parcelsCount,
        $palletsCount,
        $doxCount,
        $parcelsWeight = null,
        $parcelMaxWeight = null,
        $parcelMaxHeight = null,
        $parcelMaxWidth = null,
        $parcelMaxDepth = null,
        $palletsWeight = null,
        $palletMaxWeight = null,
        $palletMaxHeight = null
    ) {
        $this->dox = $dox;
        $this->standardParcel = $standardParcel;
        $this->pallet = $pallet;
        $this->parcelsCount = $parcelsCount;
        $this->palletsCount = $palletsCount;
        $this->doxCount = $doxCount;
        $this->parcelsWeight = $parcelsWeight;
        $this->parcelMaxWeight = $parcelMaxWeight;
        $this->parcelMaxHeight = $parcelMaxHeight;
        $this->parcelMaxWidth = $parcelMaxWidth;
        $this->parcelMaxDepth = $parcelMaxDepth;
        $this->palletsWeight = $palletsWeight;
        $this->palletMaxWeight = $palletMaxWeight;
        $this->palletMaxHeight = $palletMaxHeight;
    }

    /**
     * @return bool
     */
    public function dox()
    {
        return $this->dox;
    }

    /**
     * @return bool
     */
    public function standardParcel()
    {
        return $this->standardParcel;
    }

    /**
     * @return bool
     */
    public function pallet()
    {
        return $this->pallet;
    }

    /**
     * @return int
     */
    public function parcelsCount()
    {
        return $this->parcelsCount;
    }

    /**
     * @return int
     */
    public function palletsCount()
    {
        return $this->palletsCount;
    }

    /**
     * @return int
     */
    public function doxCount()
    {
        return $this->doxCount;
    }

    /**
     * @return int
     */
    public function parcelsWeight()
    {
        return $this->parcelsWeight;
    }

    /**
     * @return float
     */
    public function parcelMaxWeight()
    {
        return $this->parcelMaxWeight;
    }

    /**
     * @return float
     */
    public function parcelMaxHeight()
    {
        return $this->parcelMaxHeight;
    }

    /**
     * @return float
     */
    public function parcelMaxWidth()
    {
        return $this->parcelMaxWidth;
    }

    /**
     * @return float
     */
    public function parcelMaxDepth()
    {
        return $this->parcelMaxDepth;
    }

    /**
     * @return float
     */
    public function palletsWeight()
    {
        return $this->palletsWeight;
    }

    /**
     * @return float
     */
    public function palletMaxWeight()
    {
        return $this->palletMaxWeight;
    }

    /**
     * @return float
     */
    public function palletMaxHeight()
    {
        return $this->palletMaxHeight;
    }
}

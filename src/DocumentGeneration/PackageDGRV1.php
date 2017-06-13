<?php
/**
 * Created by PhpStorm.
 * User: dbojdo
 * Date: 13/06/2017
 * Time: 17:00
 */

namespace Webit\DPDClient\DocumentGeneration;

use JMS\Serializer\Annotation as JMS;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;

class PackageDGRV1
{
    /**
     * @var int
     * @JMS\SerializedName("packageId")
     * @JMS\Type("int")
     */
    private $packageId;

    /**
     * @var string
     * @JMS\SerializedName("reference")
     * @JMS\Type("string")
     */
    private $reference;

    /**
     * @var StatusInfoDGRV1
     * @JMS\SerializedName("statusInfo")
     * @JMS\Type("Webit\DPDClient\DocumentGeneration\StatusInfoDGRV1")
     */
    private $statusInfo;

    /**
     * @var ParcelDGRV1[]
     * @JMS\SerializedName("parcels")
     * @JMS\Type("array<Webit\DPDClient\DocumentGeneration\ParcelDGRV1>")
     */
    private $parcels;

    /**
     * PackageDGRV1 constructor.
     * @param int $packageId
     * @param string $reference
     * @param StatusInfoDGRV1 $statusInfo
     * @param ParcelDGRV1[] $parcels
     */
    public function __construct($packageId, $reference, StatusInfoDGRV1 $statusInfo, array $parcels)
    {
        $this->packageId = $packageId;
        $this->reference = $reference;
        $this->statusInfo = $statusInfo;
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
     * @return StatusInfoDGRV1
     */
    public function statusInfo()
    {
        return $this->statusInfo;
    }

    /**
     * @return ParcelDGRV1[]
     */
    public function parcels()
    {
        return $this->parcels;
    }
}

<?php

namespace Webit\DPDClient\DocumentGeneration;

use JMS\Serializer\Annotation as JMS;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;

class SessionDGRV1
{
    /**
     * @var int
     * @JMS\SerializedName("sessionId")
     * @JMS\Type("integer")
     */
    private $sessionId;

    /**
     * @var StatusInfoDGRV1
     * @JMS\SerializedName("statusInfo")
     * @JMS\Type("Webit\DPDClient\DocumentGeneration\StatusInfoDGRV1")
     */
    private $statusInfo;

    /**
     * @var PackageDGRV1[]
     * @JMS\SerializedName("packages")
     * @JMS\Type("array<Webit\DPDClient\DocumentGeneration\PackageDGRV1>")
     */
    private $packages;

    /**
     * @param int $sessionId
     * @param StatusInfoDGRV1 $statusInfo
     * @param PackageDGRV1[] $packages
     */
    public function __construct($sessionId, StatusInfoDGRV1 $statusInfo, array $packages)
    {
        $this->sessionId = $sessionId;
        $this->statusInfo = $statusInfo;
        $this->packages = $packages;
    }

    /**
     * @return int
     */
    public function sessionId()
    {
        return $this->sessionId;
    }

    /**
     * @return StatusInfoDGRV1
     */
    public function statusInfo()
    {
        return $this->statusInfo;
    }

    /**
     * @return PackageDGRV1[]
     */
    public function packages()
    {
        return $this->packages;
    }
}

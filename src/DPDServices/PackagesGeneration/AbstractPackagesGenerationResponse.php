<?php

namespace Webit\DPDClient\DPDServices\PackagesGeneration;

use JMS\Serializer\Annotation as JMS;

abstract class AbstractPackagesGenerationResponse implements \IteratorAggregate
{
    /**
     * @var string
     * @JMS\SerializedName("Status")
     * @JMS\Type("string")
     */
    private $status;

    /**
     * @var int
     * @JMS\SerializedName("SessionId")
     * @JMS\Type("integer")
     */
    private $sessionId;

    /**
     * @var string
     * @JMS\SerializedName("BeginTime")
     * @JMS\Type("string")
     */
    private $beginTime;

    /**
     * @var string
     * @JMS\SerializedName("EndTime")
     * @JMS\Type("string")
     */
    private $endTime;

    /**
     * @var PackagePGRV2[]
     * @JMS\SerializedName("Packages")
     * @JMS\Type("array<Webit\DPDClient\DPDServices\PackagesGeneration\PackagePGRV2>")
     */
    private $packages;

    /**
     * PackagesGenerationResponseV2 constructor.
     * @param string $status
     * @param int $sessionId
     * @param string $beginTime
     * @param string $endTime
     * @param PackagePGRV2[] $packages
     */
    public function __construct($status, $sessionId, $beginTime, $endTime, array $packages)
    {
        $this->status = $status;
        $this->sessionId = $sessionId;
        $this->beginTime = $beginTime;
        $this->endTime = $endTime;
        $this->packages = $packages;
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
    public function sessionId()
    {
        return $this->sessionId;
    }

    /**
     * @return string
     */
    public function beginTime()
    {
        return $this->beginTime;
    }

    /**
     * @return string
     */
    public function endTime()
    {
        return $this->endTime;
    }

    /**
     * @return PackagePGRV2[]
     */
    public function packages()
    {
        return $this->packages;
    }

    /**
     * @inheritdoc
     */
    public function getIterator()
    {
        return new \ArrayIterator((array)$this->packages);
    }
}
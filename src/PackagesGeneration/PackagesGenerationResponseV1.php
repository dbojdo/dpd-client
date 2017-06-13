<?php

namespace Webit\DPDClient\PackagesGeneration;

use JMS\Serializer\Annotation as JMS;

class PackagesGenerationResponseV1 implements \IteratorAggregate
{
    /**
     * @var int
     * @JMS\SerializedName("sessionId")
     * @JMS\Type("integer")
     */
    private $sessionId;

    /**
     * @var \DateTime
     * @JMS\SerializedName("beginTime")
     * @JMS\Type("DateTime<'Y-m-d H:i:s'>")
     */
    private $beginTime;

    /**
     * @var \DateTime
     * @JMS\SerializedName("endTime")
     * @JMS\Type("DateTime<'Y-m-d H:i:s'>")
     */
    private $endTime;

    /**
     * @var string
     * @JMS\SerializedName("status")
     * @JMS\Type("string")
     */
    private $status;

    /**
     * @var PackagePGRV1[]
     * @JMS\SerializedName("packages")
     * @JMS\Type("array<Webit\DPDClient\PackagesGeneration\PackagePGRV1>")
     */
    private $packages;

    /**
     * @param int $sessionId
     * @param \DateTime $beginTime
     * @param \DateTime $endTime
     * @param string $status
     * @param PackagePGRV1[] $packages
     */
    public function __construct($sessionId, $status, array $packages = array(), \DateTime $beginTime = null, \DateTime $endTime = null)
    {
        $this->sessionId = $sessionId;
        $this->beginTime = $beginTime;
        $this->endTime = $endTime;
        $this->status = $status;
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
     * @return \DateTime
     */
    public function beginTime()
    {
        return $this->beginTime;
    }

    /**
     * @return \DateTime
     */
    public function endTime()
    {
        return $this->endTime;
    }

    /**
     * @return string
     */
    public function status()
    {
        return $this->status;
    }

    /**
     * @return PackagePGRV1[]
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
        return new \ArrayIterator($this->packages);
    }
}
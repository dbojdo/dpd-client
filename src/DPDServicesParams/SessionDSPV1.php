<?php
/**
 * File SessionDSPV1.php
 * Created at: 2017-06-12 21:25
 *
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */

namespace Webit\DPDClient\DPDServicesParams;

use JMS\Serializer\Annotation as JMS;

class SessionDSPV1
{
    /**
     * @var int
     * @JMS\Type("int")
     * @JMS\SerializedName("sessionId")
     */
    private $sessionId;

    /**
     * @var PackageDSPV1[]
     * @JMS\Type("array<Webit\DPDClient\DPDServicesParams\PackageDSPV1>")
     * @JMS\SerializedName("packages")
     */
    private $packages;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("sessionType")
     */
    private $sessionType;

    /**
     * SessionDSPV1 constructor.
     * @param int $sessionId
     * @param PackageDSPV1[] $packages
     * @param string $sessionType
     */
    public function __construct($sessionId, array $packages, $sessionType)
    {
        $this->sessionId = $sessionId;
        $this->packages = $packages;
        $this->sessionType = $sessionType;
    }

    /**
     * @return int
     */
    public function sessionId()
    {
        return $this->sessionId;
    }

    /**
     * @return PackageDSPV1[]
     */
    public function packages()
    {
        return $this->packages;
    }

    /**
     * @return string
     */
    public function sessionType()
    {
        return $this->sessionType;
    }
}
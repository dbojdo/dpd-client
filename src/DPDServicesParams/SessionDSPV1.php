<?php

namespace Webit\DPDClient\DPDServicesParams;

use JMS\Serializer\Annotation as JMS;

class SessionDSPV1
{
    /**
     * @var int
     * @JMS\Type("integer")
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
     * @param int $sessionId
     * @param PackageDSPV1[] $packages
     * @param SessionTypeDSPEnumV1 $sessionType
     */
    private function __construct($sessionId = null, array $packages = array(), SessionTypeDSPEnumV1 $sessionType)
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
     * @return SessionTypeDSPEnumV1
     */
    public function sessionType()
    {
        return $this->sessionType;
    }

    /**
     * @param int $sessionId
     * @param SessionTypeDSPEnumV1 $sessionType
     * @return SessionDSPV1
     */
    public static function fromSession($sessionId, SessionTypeDSPEnumV1 $sessionType = null)
    {
        return new self($sessionId, array(), $sessionType ?: SessionTypeDSPEnumV1::domestic());
    }

    /**
     * @param PackageDSPV1[] $packages
     * @param SessionTypeDSPEnumV1 $sessionType
     * @return SessionDSPV1
     */
    public static function fromPackages(array $packages, SessionTypeDSPEnumV1 $sessionType = null)
    {
        return new self(null, $packages, $sessionType ?: SessionTypeDSPEnumV1::domestic());
    }
}

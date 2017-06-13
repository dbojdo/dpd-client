<?php

namespace Webit\DPDClient\PackagesPickupCall;

use JMS\Serializer\Annotation as JMS;

class ProtocolPCRV1
{
    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("documentId")
     */
    private $documentId;

    /**
     * @var StatusInfoPCRV1
     * @JMS\Type("Webit\DPDClient\PackagesPickupCall\StatusInfoPCRV1")
     * @JMS\SerializedName("statusInfo")
     */
    private $statusInfo;

    /**
     * @param string $documentId
     * @param StatusInfoPCRV1 $statusInfo
     */
    public function __construct($documentId, StatusInfoPCRV1 $statusInfo)
    {
        $this->documentId = $documentId;
        $this->statusInfo = $statusInfo;
    }

    /**
     * @return string
     */
    public function documentId()
    {
        return $this->documentId;
    }

    /**
     * @return StatusInfoPCRV1
     */
    public function statusInfo()
    {
        return $this->statusInfo;
    }
}
<?php

namespace Webit\DPDClient\DPDPickupCallParams;

use JMS\Serializer\Annotation as JMS;

class ProtocolDPPV1
{
    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("documentId")
     */
    private $documentId;

    /**
     * @param string $documentId
     */
    public function __construct($documentId)
    {
        $this->documentId = $documentId;
    }

    /**
     * @return string
     */
    public function documentId()
    {
        return $this->documentId;
    }
}
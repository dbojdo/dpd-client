<?php
/**
 * Created by PhpStorm.
 * User: dbojdo
 * Date: 13/06/2017
 * Time: 17:13
 */

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
     * ProtocolDPPV1 constructor.
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
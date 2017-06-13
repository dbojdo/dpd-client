<?php
/**
 * Created by PhpStorm.
 * User: dbojdo
 * Date: 13/06/2017
 * Time: 16:59
 */

namespace Webit\DPDClient\DocumentGeneration;

use JMS\Serializer\Annotation as JMS;

class DocumentGenerationResponseV1
{
    /**
     * @var SessionDGRV1
     * @JMS\SerializedName("session")
     * @JMS\Type("Webit\DPDClient\DocumentGeneration\SessionDGRV1")
     */
    private $session;

    /**
     * @var string
     * @JMS\SerializedName("documentData")
     * @JMS\Type("string")
     */
    private $documentData;

    /**
     * @var string
     * @JMS\SerializedName("documentId")
     * @JMS\Type("string")
     */
    private $documentId;

    /**
     * DocumentGenerationResponseV1 constructor.
     * @param SessionDGRV1 $session
     * @param string $documentData
     * @param string $documentId
     */
    public function __construct(SessionDGRV1 $session, $documentData, $documentId)
    {
        $this->session = $session;
        $this->documentData = $documentData;
        $this->documentId = $documentId;
    }

    /**
     * @return SessionDGRV1
     */
    public function session()
    {
        return $this->session;
    }

    /**
     * @return string
     */
    public function documentData()
    {
        return $this->documentData;
    }

    /**
     * @return string
     */
    public function documentId()
    {
        return $this->documentId;
    }
}

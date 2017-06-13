<?php

namespace Webit\DPDClient\DPDServicesParams;

use JMS\Serializer\Annotation as JMS;

class DPDServicesParamsV1
{
    /**
     * @var PolicyDSPEnumV1
     * @JMS\Type("string")
     * @JMS\SerializedName("policy")
     */
    private $policy;

    /**
     * @var SessionDSPV1
     * @JMS\Type("Webit\DPDClient\DPDServicesParams\SessionDSPV1")
     * @JMS\SerializedName("session")
     */
    private $session;

    /**
     * @var PickupAddressDSPV1
     * @JMS\Type("Webit\DPDClient\DPDServicesParams\PickupAddressDSPV1")
     * @JMS\SerializedName("pickupAddress")
     */
    private $pickupAddress;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("documentId")
     */
    private $documentId;

    /**
     * @param PolicyDSPEnumV1 $policy
     * @param SessionDSPV1 $session
     * @param PickupAddressDSPV1 $pickupAddress
     * @param string $documentId
     */
    public function __construct(
        PolicyDSPEnumV1 $policy,
        SessionDSPV1 $session,
        PickupAddressDSPV1 $pickupAddress = null,
        $documentId = null
    ) {
        $this->policy = $policy;
        $this->session = $session;
        $this->pickupAddress = $pickupAddress;
        $this->documentId = $documentId;
    }

    /**
     * @return PolicyDSPEnumV1
     */
    public function policy()
    {
        return $this->policy;
    }

    /**
     * @return SessionDSPV1
     */
    public function session()
    {
        return $this->session;
    }

    /**
     * @return PickupAddressDSPV1
     */
    public function pickupAddress()
    {
        return $this->pickupAddress;
    }

    /**
     * @return string
     */
    public function documentId()
    {
        return $this->documentId;
    }
}

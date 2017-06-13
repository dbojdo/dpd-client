<?php

namespace Webit\DPDClient\PackagesPickupCall;

use JMS\Serializer\Annotation as JMS;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;

class PackagesPickupCallResponseV1
{
    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("orderNumber")
     */
    private $orderNumber;

    /**
     * @var ProtocolPCRV1[]
     * @JMS\Type("array<Webit\DPDClient\PackagesPickupCall\ProtocolPCRV1>")
     * @JMS\SerializedName("prototocols")
     */
    private $protocols;

    /**
     * @param string $orderNumber
     * @param ProtocolPCRV1[] $protocols
     */
    public function __construct($orderNumber, array $protocols)
    {
        $this->orderNumber = $orderNumber;
        $this->protocols = $protocols;
    }

    /**
     * @return string
     */
    public function orderNumber()
    {
        return $this->orderNumber;
    }

    /**
     * @return ProtocolPCRV1[]
     */
    public function protocols()
    {
        return $this->protocols;
    }
}

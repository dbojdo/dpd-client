<?php

namespace Webit\DPDClient\PackagesGeneration\OpenUMLF;

use JMS\Serializer\Annotation as JMS;

class PackageV2 extends AbstractPackage
{
    /**
     * @var string
     * @JMS\SerializedName("customer")
     * @JMS\Type("string")
     */
    private $customer;

    /**
     * @param Receiver $receiver
     * @param Sender $sender
     * @param PayerType $payerType
     * @param Parcel[] $parcels
     * @param Services $services
     * @param string $reference
     * @param null $customer
     * @param int $thirdPartyFID
     * @param string $ref1
     * @param string $ref2
     * @param string $ref3
     */
    public function __construct(
        Receiver $receiver,
        Sender $sender,
        PayerType $payerType = null,
        array $parcels = array(),
        Services $services = null,
        $reference = null,
        $customer = null,
        $thirdPartyFID = null,
        $ref1 = null,
        $ref2 = null,
        $ref3 = null
    ) {
        parent::__construct(
            $receiver,
            $sender,
            $payerType,
            $parcels,
            $services,
            $reference,
            $thirdPartyFID,
            $ref1,
            $ref2,
            $ref3
        );

        $this->customer = $customer;
    }

    /**
     * @return string
     */
    public function customer()
    {
        return $this->customer;
    }
}

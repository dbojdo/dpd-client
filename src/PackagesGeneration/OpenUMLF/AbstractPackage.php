<?php

namespace Webit\DPDClient\PackagesGeneration\OpenUMLF;

use JMS\Serializer\Annotation as JMS;

abstract class AbstractPackage implements \IteratorAggregate
{
    /**
     * @var string
     * @JMS\SerializedName("reference")
     * @JMS\Type("string")
     */
    private $reference;

    /**
     * @var Receiver
     * @JMS\SerializedName("receiver")
     * @JMS\Type("Webit\DPDClient\PackagesGeneration\OpenUMLF\Receiver")
     */
    private $receiver;

    /**
     * @var Sender
     * @JMS\SerializedName("sender")
     * @JMS\Type("Webit\DPDClient\PackagesGeneration\OpenUMLF\Sender")
     */
    private $sender;

    /**
     * @var string
     * @JMS\SerializedName("payerType")
     * @JMS\Type("string")
     */
    private $payerType;

    /**
     * @var int
     * @JMS\SerializedName("thirdPartyFID")
     * @JMS\Type("integer")
     */
    private $thirdPartyFID;

    /**
     * @var string
     * @JMS\SerializedName("ref1")
     * @JMS\Type("string")
     */
    private $ref1;

    /**
     * @var string
     * @JMS\SerializedName("ref2")
     * @JMS\Type("string")
     */
    private $ref2;

    /**
     * @var string
     * @JMS\SerializedName("ref3")
     * @JMS\Type("string")
     */
    private $ref3;

    /**
     * @var Services
     * @JMS\SerializedName("services")
     * @JMS\Type("Webit\DPDClient\PackagesGeneration\OpenUMLF\Services")
     */
    private $services;

    /**
     * @var Parcel[]
     * @JMS\SerializedName("parcels")
     * @JMS\Type("array<Webit\DPDClient\PackagesGeneration\OpenUMLF\Parcel>")
     */
    private $parcels;

    /**
     * @param Receiver $receiver
     * @param Sender $sender
     * @param PayerType $payerType
     * @param Parcel[] $parcels
     * @param Services $services
     * @param string $reference
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
        $thirdPartyFID = null,
        $ref1 = null,
        $ref2 = null,
        $ref3 = null
    ) {
        $this->reference = $reference;
        $this->receiver = $receiver;
        $this->sender = $sender;
        $this->payerType = $payerType ?: PayerType::sender();
        $this->thirdPartyFID = $thirdPartyFID;
        $this->ref1 = $ref1;
        $this->ref2 = $ref2;
        $this->ref3 = $ref3;
        $this->services = $services ?: new Services();
        $this->parcels = $parcels;
    }

    /**
     * @return string
     */
    public function reference()
    {
        return $this->reference;
    }

    /**
     * @return Receiver
     */
    public function receiver()
    {
        return $this->receiver;
    }

    /**
     * @return Sender
     */
    public function sender()
    {
        return $this->sender;
    }

    /**
     * @return PayerType
     */
    public function payerType()
    {
        switch ($this->payerType) {
            case 'SENDER':
                return PayerType::sender();

        }
        return $this->payerType;
    }

    /**
     * @return int
     */
    public function thirdPartyFID()
    {
        return $this->thirdPartyFID;
    }

    /**
     * @return string
     */
    public function ref1()
    {
        return $this->ref1;
    }

    /**
     * @return string
     */
    public function ref2()
    {
        return $this->ref2;
    }

    /**
     * @return string
     */
    public function ref3()
    {
        return $this->ref3;
    }

    /**
     * @return Services
     */
    public function services()
    {
        return $this->services;
    }

    /**
     * @return Parcel[]
     */
    public function parcels()
    {
        return $this->parcels;
    }

    /**
     * @inheritdoc
     */
    public function getIterator()
    {
        return new \ArrayIterator((array)$this->parcels);
    }
}
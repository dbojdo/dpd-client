<?php
/**
 * Created by PhpStorm.
 * User: dbojdo
 * Date: 05/09/2017
 * Time: 13:17
 */

namespace Webit\DPDClient\PackagesGeneration\OpenUMLF;

use JMS\Serializer\Annotation as JMS;

class Package implements \IteratorAggregate
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
     * @JMS\Type("int")
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
     * Package constructor.
     * @param Receiver $receiver
     * @param Sender $sender
     * @param Parcel[] $parcels
     * @param Services $services
     * @param string $reference
     * @param int $thirdPartyFID
     * @param string $ref1
     * @param string $ref2
     * @param string $ref3
     * @param string $customerData1
     * @param string $customerData2
     * @param string $customerData3
     */
    public function __construct(
        Receiver $receiver,
        Sender $sender,
        $payerType,
        array $parcels = array(),
        Services $services = null,
        $reference = null,
        $thirdPartyFID = null,
        $ref1 = null,
        $ref2 = null,
        $ref3 = null,
        $customerData1 = null,
        $customerData2 = null,
        $customerData3 = null
    ) {
//        Reference, Sender, PayerType, ThirdPartyFID, Ref1, Ref2, Ref3, Services, Parcels
        $this->reference = $reference;
        $this->receiver = $receiver;
        $this->sender = $sender;
        $this->payerType = $payerType;
        $this->thirdPartyFID = $thirdPartyFID;
        $this->ref1 = $ref1;
        $this->ref2 = $ref2;
        $this->ref3 = $ref3;
        $this->services = $services ?: new Services();
        $this->parcels = $parcels;
        $this->customerData1 = $customerData1;
        $this->customerData2 = $customerData2;
        $this->customerData3 = $customerData3;

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
     * @return string
     */
    public function customerData1()
    {
        return $this->customerData1;
    }

    /**
     * @return string
     */
    public function customerData2()
    {
        return $this->customerData2;
    }

    /**
     * @return string
     */
    public function customerData3()
    {
        return $this->customerData3;
    }

    /**
     * @inheritdoc
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->parcels);
    }
}

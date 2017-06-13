<?php

namespace Webit\DPDClient\DPDInfoServices\CustomerEvents;

use JMS\Serializer\Annotation as JMS;

class CustomerEventV1 extends AbstractCustomerEvent
{
    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("eventData1")
     */
    private $eventData1;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("eventData2")
     */
    private $eventData2;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("eventData3")
     */
    private $eventData3;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("operationType")
     */
    private $operationType;

    /**
     * CustomerEventV1 constructor.
     * @param int $id
     * @param string $businessCode
     * @param string $waybill
     * @param string $description
     * @param string $eventTime
     * @param string $depot
     * @param string $country
     * @param string $packageReference
     * @param string $parcelReference
     * @param int $objectId
     * @param string $eventData1
     * @param string $eventData2
     * @param string $eventData3
     * @param string $operationType
     */
    public function __construct(
        $id,
        $businessCode,
        $waybill,
        $description,
        $eventTime,
        $depot,
        $country,
        $packageReference,
        $parcelReference,
        $objectId,
        $eventData1,
        $eventData2,
        $eventData3,
        $operationType
    ) {
        parent::__construct(
            $id,
            $businessCode,
            $waybill,
            $description,
            $eventTime,
            $depot,
            $country,
            $packageReference,
            $parcelReference,
            $objectId
        );

        $this->eventData1 = $eventData1;
        $this->eventData2 = $eventData2;
        $this->eventData3 = $eventData3;
        $this->operationType = $operationType;
    }

    /**
     * @return string
     */
    public function eventData1()
    {
        return $this->eventData1;
    }

    /**
     * @return string
     */
    public function eventData2()
    {
        return $this->eventData2;
    }

    /**
     * @return string
     */
    public function eventData3()
    {
        return $this->eventData3;
    }

    /**
     * @return string
     */
    public function operationType()
    {
        return $this->operationType;
    }
}
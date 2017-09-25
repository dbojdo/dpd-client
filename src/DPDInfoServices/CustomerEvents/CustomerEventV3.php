<?php

namespace Webit\DPDClient\DPDInfoServices\CustomerEvents;

use JMS\Serializer\Annotation as JMS;

class CustomerEventV3 extends AbstractCustomerEvent implements \IteratorAggregate
{
    /**
     * @var CustomerEventDataV3[]
     * @JMS\Type("array<Webit\DPDClient\DPDInfoServices\CustomerEvents\CustomerEventDataV3>")
     * @JMS\SerializedName("eventDataList")
     */
    private $eventDataList;

    /**
     * CustomerEventV2 constructor.
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
     * @param CustomerEventDataV3[] $eventDataList
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
        array $eventDataList = array()
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
        $this->eventDataList = $eventDataList;
    }

    /**
     * @return CustomerEventDataV3[]
     */
    public function eventDataList()
    {
        return $this->eventDataList ?: array();
    }

    /**
     * @inheritdoc
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->eventDataList());
    }
}

<?php

namespace Webit\DPDClient\DPDInfoServices\CustomerEvents;

use JMS\Serializer\Annotation as JMS;

class CustomerEventsResponseV3 extends AbstractCustomerEventsResponse
{
    /**
     * @var CustomerEventV3[]
     * @JMS\Type("array<Webit\DPDClient\DPDInfoServices\CustomerEventV2>")
     * @JMS\SerializedName("eventsList")
     */
    private $eventsList;

    /**
     * CustomerEventsResponseV1 constructor.
     * @param string $confirmId
     * @param CustomerEventV3[] $eventsList
     */
    public function __construct($confirmId, array $eventsList = array())
    {
        parent::__construct($confirmId);
        $this->eventsList = $eventsList;
    }

    /**
     * @return CustomerEventV3[]
     */
    public function eventsList()
    {
        return $this->eventsList ?: array();
    }

    /**
     * @inheritdoc
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->eventsList());
    }
}

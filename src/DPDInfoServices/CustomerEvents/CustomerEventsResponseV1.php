<?php

namespace Webit\DPDClient\DPDInfoServices\CustomerEvents;

use JMS\Serializer\Annotation as JMS;

class CustomerEventsResponseV1 extends AbstractCustomerEventsResponse
{
    /**
     * @var CustomerEventV1[]
     * @JMS\Type("array<Webit\DPDClient\DPDInfoServices\CustomerEvents\CustomerEventV1>")
     * @JMS\SerializedName("eventsList")
     */
    private $eventsList;

    /**
     * CustomerEventsResponseV1 constructor.
     * @param string $confirmId
     * @param CustomerEventV1[] $eventsList
     */
    public function __construct($confirmId, array $eventsList = array())
    {
        parent::__construct($confirmId);
        $this->eventsList = $eventsList;
    }

    /**
     * @return CustomerEventV1[]
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

    /**
     * @inheritdoc
     */
    public function count()
    {
        return count($this->eventsList ?: array());
    }
}

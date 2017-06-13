<?php

namespace Webit\DPDClient\DPDInfoServices\CustomerEvents;

use JMS\Serializer\Annotation as JMS;

abstract class AbstractCustomerEventsResponse implements \IteratorAggregate, \Countable
{
    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("confirmId")
     */
    private $confirmId;

    /**
     * AbstractCustomerEventsResponse constructor.
     * @param string $confirmId
     */
    public function __construct($confirmId)
    {
        $this->confirmId = $confirmId;
    }

    /**
     * @return string
     */
    public function confirmId()
    {
        return $this->confirmId;
    }
}

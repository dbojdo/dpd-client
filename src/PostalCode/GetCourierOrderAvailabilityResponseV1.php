<?php

namespace Webit\DPDClient\PostalCode;

use JMS\Serializer\Annotation as JMS;

class GetCourierOrderAvailabilityResponseV1
{
    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("status")
     */
    private $status;

    /**
     * @var CourierOrderAvailabilityRangeV1[]
     * @JMS\Type("array<Webit\DPDClient\PostalCode\CourierOrderAvailabilityRangeV1>")
     * @JMS\SerializedName("ranges")
     */
    private $ranges;

    /**
     * @param string $status
     * @param CourierOrderAvailabilityRangeV1[] $ranges
     */
    public function __construct($status, array $ranges)
    {
        $this->status = $status;
        $this->ranges = $ranges;
    }

    /**
     * @return string
     */
    public function status()
    {
        return $this->status;
    }

    /**
     * @return CourierOrderAvailabilityRangeV1[]
     */
    public function ranges()
    {
        return $this->ranges;
    }

    /**
     * @JMS\PostDeserialize
     */
    public function postDeserialize()
    {
        $this->ensureRangesIsArray();
        $this->filterOutEmptyRanges();
    }

    private function ensureRangesIsArray()
    {
        if (is_array($this->ranges)) {
            return;
        }

        $this->ranges = array();
    }

    private function filterOutEmptyRanges()
    {
        $nonEmptyRanges = array();
        foreach ($this->ranges as $range) {
            if ($range->isEmpty()) {
                continue;
            }

            $nonEmptyRanges[]= $range;
        }

        $this->ranges = $nonEmptyRanges;
    }
}

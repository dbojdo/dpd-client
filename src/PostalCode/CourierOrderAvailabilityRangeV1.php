<?php
/**
 * Created by PhpStorm.
 * User: dbojdo
 * Date: 14/06/2017
 * Time: 11:27
 */

namespace Webit\DPDClient\PostalCode;

use JMS\Serializer\Annotation as JMS;

class CourierOrderAvailabilityRangeV1
{
    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("range")
     */
    private $range;

    /**
     * @var int
     * @JMS\Type("int")
     * @JMS\SerializedName("offset")
     */
    private $offset;

    /**
     * CourierOrderAvailabilityRangeV1 constructor.
     * @param string $range
     * @param int $offset
     */
    public function __construct($range, $offset)
    {
        $this->range = $range;
        $this->offset = $offset;
    }

    /**
     * @return string
     */
    public function range()
    {
        return $this->range;
    }

    /**
     * @return int
     */
    public function offset()
    {
        return $this->offset;
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return ! $this->range() && ! $this->offset();
    }
}
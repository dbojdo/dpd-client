<?php

namespace Webit\DPDClient\DPDParcelBusinessEvent;

use JMS\Serializer\Annotation as JMS;

class DPDParcelBusinessEventV1
{
    /**
     * @var string
     * @JMS\SerializedName("countryCode")
     * @JMS\Type("string")
     */
    private $countryCode;

    /**
     * @var string
     * @JMS\SerializedName("postalCode")
     * @JMS\Type("string")
     */
    private $postalCode;

    /**
     * @var string
     * @JMS\SerializedName("eventCode")
     * @JMS\Type("string")
     */
    private $eventCode;

    /**
     * @var string
     * @JMS\SerializedName("waybill")
     * @JMS\Type("string")
     */
    private $waybill;

    /**
     * @var \DateTime
     * @JMS\SerializedName("eventTime")
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
     */
    private $eventTime;

    /**
     * @var DPDParcelBusinessEventDataV1[]
     * @JMS\SerializedName("eventDataList")
     * @JMS\Type("array<Webit\DPDClient\DPDParcelBusinessEvent\DPDParcelBusinessEventDataV1>")
     */
    private $eventDataList;

    /**
     * @param string $countryCode
     * @param string $postalCode
     * @param string $eventCode
     * @param string $waybill
     * @param \DateTime $eventTime
     * @param DPDParcelBusinessEventDataV1[] $eventDataList
     */
    public function __construct(
        $countryCode,
        $postalCode,
        $eventCode,
        $waybill,
        \DateTime $eventTime,
        array $eventDataList
    ) {
        $this->countryCode = $countryCode;
        $this->postalCode = $postalCode;
        $this->eventCode = $eventCode;
        $this->waybill = $waybill;
        $this->eventTime = $eventTime;
        $this->eventDataList = $eventDataList;
    }

    /**
     * @return string
     */
    public function countryCode()
    {
        return $this->countryCode;
    }

    /**
     * @return string
     */
    public function postalCode()
    {
        return $this->postalCode;
    }

    /**
     * @return string
     */
    public function eventCode()
    {
        return $this->eventCode;
    }

    /**
     * @return string
     */
    public function waybill()
    {
        return $this->waybill;
    }

    /**
     * @return \DateTime
     */
    public function eventTime()
    {
        return $this->eventTime;
    }

    /**
     * @return DPDParcelBusinessEventDataV1[]
     */
    public function eventDataList()
    {
        return $this->eventDataList;
    }
}
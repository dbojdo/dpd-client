<?php

namespace Webit\DPDClient\DPDInfoServices\CustomerEvents;

use JMS\Serializer\Annotation as JMS;

abstract class AbstractCustomerEvent
{
    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("id")
     */
    private $id;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("businessCode")
     */
    private $businessCode;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("waybill")
     */
    private $waybill;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("description")
     */
    private $description;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("eventTime")
     */
    private $eventTime;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("depot")
     */
    private $depot;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("country")
     */
    private $country;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("packageReference")
     */
    private $packageReference;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("parcelReference")
     */
    private $parcelReference;

    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("objectId")
     */
    private $objectId;

    /**
     * AbstractCustomerEvent constructor.
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
        $objectId
    ) {
        $this->id = $id;
        $this->businessCode = $businessCode;
        $this->waybill = $waybill;
        $this->description = $description;
        $this->eventTime = $eventTime;
        $this->depot = $depot;
        $this->country = $country;
        $this->packageReference = $packageReference;
        $this->parcelReference = $parcelReference;
        $this->objectId = $objectId;
    }

    /**
     * @return int
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function businessCode()
    {
        return $this->businessCode;
    }

    /**
     * @return string
     */
    public function waybill()
    {
        return $this->waybill;
    }

    /**
     * @return string
     */
    public function description()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function eventTime()
    {
        return $this->eventTime;
    }

    /**
     * @return string
     */
    public function depot()
    {
        return $this->depot;
    }

    /**
     * @return string
     */
    public function country()
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function packageReference()
    {
        return $this->packageReference;
    }

    /**
     * @return string
     */
    public function parcelReference()
    {
        return $this->parcelReference;
    }

    /**
     * @return int
     */
    public function objectId()
    {
        return $this->objectId;
    }
}
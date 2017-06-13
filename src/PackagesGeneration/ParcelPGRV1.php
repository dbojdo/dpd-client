<?php
/**
 * File ParcelPGRV1.php
 * Created at: 2017-06-12 21:02
 *
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */

namespace Webit\DPDClient\PackagesGeneration;

use JMS\Serializer\Annotation as JMS;

class ParcelPGRV1
{
    /**
     * @var int
     * @JMS\SerializedName("parcelId")
     * @JMS\Type("int")
     */
    private $parcelId;

    /**
     * @var string
     * @JMS\SerializedName("reference")
     * @JMS\Type("string")
     */
    private $reference;

    /**
     * @var string
     * @JMS\SerializedName("waybill")
     * @JMS\Type("string")
     */
    private $waybill;

    /**
     * @var string
     * @JMS\SerializedName("status")
     * @JMS\Type("string")
     */
    private $status;

    /**
     * ParcelPGRV1 constructor.
     * @param int $parcelId
     * @param string $reference
     * @param string $waybill
     * @param string $status
     */
    public function __construct($parcelId, $reference, $waybill, $status)
    {
        $this->parcelId = $parcelId;
        $this->reference = $reference;
        $this->waybill = $waybill;
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function parcelId()
    {
        return $this->parcelId;
    }

    /**
     * @return string
     */
    public function reference()
    {
        return $this->reference;
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
    public function status()
    {
        return $this->status;
    }
}
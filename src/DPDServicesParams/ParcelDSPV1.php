<?php
/**
 * File ParcelDSPV1.php
 * Created at: 2017-06-12 21:30
 *
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */

namespace Webit\DPDClient\DPDServicesParams;

use JMS\Serializer\Annotation as JMS;

class ParcelDSPV1
{
    /**
     * @var int
     * @JMS\Type("int")
     * @JMS\SerializedName("parcelId")
     */
    private $parcelId;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("reference")
     */
    private $reference;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("waybill")
     */
    private $waybill;

    /**
     * ParcelDSPV1 constructor.
     * @param int $parcelId
     * @param string $reference
     * @param string $waybill
     */
    public function __construct($parcelId, $reference, $waybill)
    {
        $this->parcelId = $parcelId;
        $this->reference = $reference;
        $this->waybill = $waybill;
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
     * @param int $parcelId
     * @return ParcelDSPV1
     */
    public static function fromParcelId($parcelId)
    {
        return new self($parcelId, null, null);
    }

    /**
     * @param string $waybill
     * @return ParcelDSPV1
     */
    public static function fromWaybill($waybill)
    {
        return new self(null, $waybill, null);
    }

    /**
     * @param string $reference
     * @return ParcelDSPV1
     */
    public static function fromReference($reference)
    {
        return new self(null, null, $reference);
    }
}
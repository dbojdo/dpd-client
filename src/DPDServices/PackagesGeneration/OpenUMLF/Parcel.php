<?php

namespace Webit\DPDClient\DPDServices\PackagesGeneration\OpenUMLF;

use JMS\Serializer\Annotation as JMS;

class Parcel
{
    /**
     * Weight in kilograms
     * @var int
     * @JMS\SerializedName("weight")
     * @JMS\Type("double")
     */
    private $weight;

    /**
     * @var string
     * @JMS\SerializedName("content")
     * @JMS\Type("string")
     */
    private $content;

    /**
     * Size in centimeters
     * @var float
     * @JMS\SerializedName("sizeX")
     * @JMS\Type("double")
     */
    private $sizeX;

    /**
     * Size in centimeters
     * @var float
     * @JMS\SerializedName("sizeY")
     * @JMS\Type("double")
     */
    private $sizeY;

    /**
     * Size in centimeters
     * @var float
     * @JMS\SerializedName("sizeZ")
     * @JMS\Type("double")
     */
    private $sizeZ;


    /**
     * @var string
     * @JMS\SerializedName("customerData1")
     * @JMS\Type("string")
     */
    private $customerData1;

    /**
     * @var string
     * @JMS\SerializedName("customerData2")
     * @JMS\Type("string")
     */
    private $customerData2;

    /**
     * @var string
     * @JMS\SerializedName("customerData3")
     * @JMS\Type("string")
     */
    private $customerData3;

    /**
     * @param int $weight
     * @param string $content
     * @param float $sizeX
     * @param float $sizeY
     * @param float $sizeZ
     */
    public function __construct($weight, $content = null, $sizeX = null, $sizeY = null, $sizeZ = null)
    {
        $this->weight = $weight;
        $this->content = $content;
        $this->sizeX = $sizeX;
        $this->sizeY = $sizeY;
        $this->sizeZ = $sizeZ;
    }

    /**
     * @return int
     */
    public function weight()
    {
        return $this->weight;
    }

    /**
     * @return string
     */
    public function content()
    {
        return $this->content;
    }

    /**
     * @return float
     */
    public function sizeX()
    {
        return $this->sizeX;
    }

    /**
     * @return float
     */
    public function sizeY()
    {
        return $this->sizeY;
    }

    /**
     * @return float
     */
    public function sizeZ()
    {
        return $this->sizeZ;
    }

    /**
     * @return string
     */
    public function customerData1()
    {
        return $this->customerData1;
    }

    /**
     * @return string
     */
    public function customerData2()
    {
        return $this->customerData2;
    }

    /**
     * @return string
     */
    public function customerData3()
    {
        return $this->customerData3;
    }
}
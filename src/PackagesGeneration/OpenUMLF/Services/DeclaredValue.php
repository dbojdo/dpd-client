<?php

namespace Webit\DPDClient\PackagesGeneration\OpenUMLF\Services;

use JMS\Serializer\Annotation as JMS;

class DeclaredValue
{
    /**
     * @var float
     * @JMS\SerializedName("amount")
     * @JMS\Type("double")
     */
    private $amount;

    /**
     * @var string
     * @JMS\SerializedName("currency")
     * @JMS\Type("string")
     */
    private $currency;

    /**
     * @param float $amount
     * @param string $currency
     */
    public function __construct($amount, $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    /**
     * @return float
     */
    public function amount()
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function currency()
    {
        return $this->currency;
    }

    /**
     * @param float $amount
     * @param string $currency
     * @return DeclaredValue
     */
    public static function create($amount, $currency)
    {
        return new self($amount, $currency);
    }
}
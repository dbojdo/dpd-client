<?php

namespace Webit\DPDClient\DPDServices\PackagesGeneration\OpenUMLF;

use JMS\Serializer\Annotation as JMS;
use Webit\DPDClient\DPDServices\PackagesGeneration\OpenUMLF\Services\Cod;
use Webit\DPDClient\DPDServices\PackagesGeneration\OpenUMLF\Services\DeclaredValue;
use Webit\DPDClient\DPDServices\PackagesGeneration\OpenUMLF\Services\Guarantee;
use Webit\DPDClient\DPDServices\PackagesGeneration\OpenUMLF\Services\SelfCol;

class Services
{
    /**
     * @var DeclaredValue
     * @JMS\SerializedName("declaredValue")
     * @JMS\Type("Webit\DPDClient\DPDServices\PackagesGeneration\OpenUMLF\Services\DeclaredValue")
     */
    private $declaredValue;

    /**
     * @var Guarantee
     * @JMS\SerializedName("guarantee")
     * @JMS\Type("Webit\DPDClient\DPDServices\PackagesGeneration\OpenUMLF\Services\Guarantee")
     */
    private $guarantee;

    /**
     * @var bool
     * @JMS\SerializedName("cud")
     * @JMS\Type("boolean")
     */
    private $cud;

    /**
     * @var bool
     * @JMS\SerializedName("dox")
     * @JMS\Type("boolean")
     */
    private $dox;

    /**
     * @var bool
     * @JMS\SerializedName("rod")
     * @JMS\Type("boolean")
     */
    private $rod;

    /**
     * @var Cod
     * @JMS\SerializedName("cod")
     * @JMS\Type("Webit\DPDClient\DPDServices\PackagesGeneration\OpenUMLF\Services\Cod")
     */
    private $cod;

    /**
     * @var bool
     * @JMS\SerializedName("inPers")
     * @JMS\Type("boolean")
     */
    private $inPers;

    /**
     * @var SelfCol
     * @JMS\SerializedName("selfCol")
     * @JMS\Type("Webit\DPDClient\DPDServices\PackagesGeneration\OpenUMLF\Services\SelfCol")
     */
    private $selfCol;

    /**
     * @var bool
     * @JMS\SerializedName("privPers")
     * @JMS\Type("boolean")
     */
    private $privPers;

    /**
     * @var bool
     * @JMS\SerializedName("carryIn")
     * @JMS\Type("boolean")
     */
    private $carryIn;

    /**
     * @var bool
     * @JMS\SerializedName("duty")
     * @JMS\Type("boolean")
     */
    private $duty;

    /**
     * @var bool
     * @JMS\SerializedName("pallet")
     * @JMS\Type("boolean")
     */
    private $pallet;

    /**
     * @param DeclaredValue $declaredValue
     * @param Guarantee|null $guarantee
     * @param bool $cud
     * @param bool $dox
     * @param bool $rod
     * @param Cod $cod
     * @param bool $inPers
     * @param SelfCol $selfCol
     * @param bool $privPers
     * @param bool $carryIn
     * @param bool $duty
     * @param bool $pallet
     */
    public function __construct(
        DeclaredValue $declaredValue = null,
        Guarantee $guarantee = null,
        $cud = false,
        $dox = false,
        $rod = false,
        Cod $cod = null,
        $inPers = false,
        SelfCol $selfCol = null,
        $privPers = false,
        $carryIn = false,
        $duty = false,
        $pallet = false
    ) {
        $this->declaredValue = $declaredValue;
        $this->guarantee = $guarantee;
        $this->cud = $cud ?: null;
        $this->dox = $dox ?: null;
        $this->rod = $rod ?: null;
        $this->cod = $cod;
        $this->inPers = $inPers ?: null;
        $this->selfCol = $selfCol;
        $this->privPers = $privPers ?: null;
        $this->carryIn = $carryIn ?: null;
        $this->duty = $duty ?: null;
        $this->pallet = $pallet ?: null;
    }

    /**
     * @return DeclaredValue
     */
    public function declaredValue()
    {
        return $this->declaredValue;
    }

    /**
     * @return Guarantee
     */
    public function guarantee()
    {
        return $this->guarantee;
    }

    /**
     * @return bool
     */
    public function cud()
    {
        return $this->cud;
    }

    /**
     * @return bool
     */
    public function dox()
    {
        return $this->dox;
    }

    /**
     * @return bool
     */
    public function rod()
    {
        return $this->rod;
    }

    /**
     * @return Cod
     */
    public function cod()
    {
        return $this->cod;
    }

    /**
     * @return bool
     */
    public function inPers()
    {
        return $this->inPers;
    }

    /**
     * @return SelfCol
     */
    public function selfCol()
    {
        return $this->selfCol;
    }

    /**
     * @return bool
     */
    public function privPers()
    {
        return $this->privPers;
    }

    /**
     * @return bool
     */
    public function carryIn()
    {
        return $this->carryIn;
    }

    /**
     * @return bool
     */
    public function duty()
    {
        return $this->duty;
    }

    /**
     * @return bool
     */
    public function pallet()
    {
        return $this->pallet;
    }
}

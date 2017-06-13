<?php

namespace Webit\DPDClient\DPDServicesParams;

use JMS\Serializer\Annotation as JMS;

class PickupAddressDSPV1
{
    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("fid")
     */
    private $fid;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("name")
     */
    private $name;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("company")
     */
    private $company;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("address")
     */
    private $address;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("city")
     */
    private $city;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("countryCode")
     */
    private $countryCode;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("postalCode")
     */
    private $postalCode;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("phone")
     */
    private $phone;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("email")
     */
    private $email;

    /**
     * @param int $fid
     * @param string $name
     * @param string $company
     * @param string $address
     * @param string $city
     * @param string $countryCode
     * @param string $postalCode
     * @param string $phone
     * @param string $email
     */
    private function __construct(
        $fid = null,
        $name = null,
        $company = null,
        $address = null,
        $city = null,
        $countryCode = null,
        $postalCode = null,
        $phone = null,
        $email = null
    ) {
        $this->fid = $fid;
        $this->name = $name;
        $this->company = $company;
        $this->address = $address;
        $this->city = $city;
        $this->countryCode = $countryCode;
        $this->postalCode = $postalCode;
        $this->phone = $phone;
        $this->email = $email;
    }

    /**
     * @return int
     */
    public function fid()
    {
        return $this->fid;
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function company()
    {
        return $this->company;
    }

    /**
     * @return string
     */
    public function address()
    {
        return $this->address;
    }

    /**
     * @return string
     */
    public function city()
    {
        return $this->city;
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
    public function phone()
    {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function email()
    {
        return $this->email;
    }

    /**
     * @param int $fid
     * @return PickupAddressDSPV1
     */
    public static function fromFid($fid)
    {
        return new self($fid);
    }

    /**
     * @param null $fid
     * @param null $name
     * @param null $company
     * @param null $address
     * @param null $city
     * @param null $countryCode
     * @param null $postalCode
     * @param null $phone
     * @param null $email
     * @return PickupAddressDSPV1
     */
    public static function fromFidAndAddress(
        $fid = null,
        $name = null,
        $company = null,
        $address = null,
        $city = null,
        $countryCode = null,
        $postalCode = null,
        $phone = null,
        $email = null
    ) {
        return new self($fid, $name, $company, $address, $city, $countryCode, $postalCode, $phone, $email);
    }
}

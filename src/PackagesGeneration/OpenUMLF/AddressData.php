<?php
/**
 * Created by PhpStorm.
 * User: dbojdo
 * Date: 05/09/2017
 * Time: 13:22
 */

namespace Webit\DPDClient\PackagesGeneration\OpenUMLF;

use JMS\Serializer\Annotation as JMS;

abstract class AddressData
{
    /**
     * @var int
     * @JMS\SerializedName("fid")
     * @JMS\Type("int")
     */
    private $fid;

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
     * @JMS\SerializedName("company")
     * @JMS\Type("string")
     */
    private $company;

    /**
     * @var string
     * @JMS\SerializedName("name")
     * @JMS\Type("string")
     */
    private $name;

    /**
     * @var string
     * @JMS\SerializedName("address")
     * @JMS\Type("string")
     */
    private $address;

    /**
     * @var string
     * @JMS\SerializedName("city")
     * @JMS\Type("string")
     */
    private $city;

    /**
     * @var string
     * @JMS\SerializedName("phone")
     * @JMS\Type("string")
     */
    private $phone;


    /**
     * @var string
     * @JMS\SerializedName("email")
     * @JMS\Type("string")
     */
    private $email;

    /**
     * AddressData constructor.
     * @param $company
     * @param $address
     * @param $city
     * @param $postalCode
     * @param $countryCode
     * @param null $fid
     * @param null $name
     * @param null $phone
     * @param null $email
     */
    public function __construct(
        $company,
        $address,
        $city,
        $postalCode,
        $countryCode,
        $fid = null,
        $name = null,
        $phone = null,
        $email = null
    ) {
        $this->fid = $fid;
        $this->countryCode = $countryCode;
        $this->postalCode = $postalCode;
        $this->company = $company;
        $this->name = $name;
        $this->address = $address;
        $this->city = $city;
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
    public function company()
    {
        return $this->company;
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
}
<?php
/**
 * File PickupAddressDSPV1.php
 * Created at: 2017-06-12 21:27
 *
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */

namespace Webit\DPDClient\DPDServicesParams;

use JMS\Serializer\Annotation as JMS;

class PickupAddressDSPV1
{
    /**
     * @var int
     * @JMS\Type("int")
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
     * PickupAddressDSPV1 constructor.
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
    public function __construct($fid, $name, $company, $address, $city, $countryCode, $postalCode, $phone, $email)
    {
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
}
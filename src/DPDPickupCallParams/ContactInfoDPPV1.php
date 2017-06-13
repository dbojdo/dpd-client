<?php
/**
 * Created by PhpStorm.
 * User: dbojdo
 * Date: 13/06/2017
 * Time: 17:10
 */

namespace Webit\DPDClient\DPDPickupCallParams;

use JMS\Serializer\Annotation as JMS;

class ContactInfoDPPV1
{
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
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("comments")
     */
    private $comments;

    /**
     * ContactInfoDPPV1 constructor.
     * @param string $name
     * @param string $company
     * @param string $phone
     * @param string $email
     * @param string $comments
     */
    public function __construct($name, $company, $phone, $email, $comments)
    {
        $this->name = $name;
        $this->company = $company;
        $this->phone = $phone;
        $this->email = $email;
        $this->comments = $comments;
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
     * @return string
     */
    public function comments()
    {
        return $this->comments;
    }
}

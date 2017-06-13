<?php
/**
 * Created by PhpStorm.
 * User: dbojdo
 * Date: 14/06/2017
 * Time: 10:05
 */

namespace Webit\DPDClient\DPDPickupCallParams;

use JMS\Serializer\Annotation as JMS;

class PickupCustomerDPPV1
{
    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("customerName")
     */
    private $customerName;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("customerFullName")
     */
    private $customerFullName;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("customerPhone")
     */
    private $customerPhone;

    /**
     * PickupCustomerDPPV1 constructor.
     * @param string $customerName
     * @param string $customerFullName
     * @param string $customerPhone
     */
    public function __construct($customerName, $customerFullName, $customerPhone)
    {
        $this->customerName = $customerName;
        $this->customerFullName = $customerFullName;
        $this->customerPhone = $customerPhone;
    }

    /**
     * @return string
     */
    public function customerName()
    {
        return $this->customerName;
    }

    /**
     * @return string
     */
    public function customerFullName()
    {
        return $this->customerFullName;
    }

    /**
     * @return string
     */
    public function customerPhone()
    {
        return $this->customerPhone;
    }
}
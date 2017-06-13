<?php
/**
 * Created by PhpStorm.
 * User: dbojdo
 * Date: 13/06/2017
 * Time: 17:16
 */

namespace Webit\DPDClient\PackagesPickupCall;

use JMS\Serializer\Annotation as JMS;

class StatusInfoPCRV1
{
    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("status")
     */
    private $status;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("description")
     */
    private $description;

    /**
     * StatusInfoPCRV1 constructor.
     * @param string $status
     * @param string $description
     */
    public function __construct($status, $description = null)
    {
        $this->status = $status;
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function status()
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function description()
    {
        return $this->description;
    }
}
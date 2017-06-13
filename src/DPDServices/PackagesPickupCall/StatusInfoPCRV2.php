<?php

namespace Webit\DPDClient\DPDServices\PackagesPickupCall;

use JMS\Serializer\Annotation as JMS;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;

class StatusInfoPCRV2
{
    const OK = 'OK';
    const BOK_WS_ERROR = 'BOK_WS_ERROR';
    const BOK_WS_UNKNOWN_ERROR = 'BOK_WS_UNKNOWN_ERROR';
    const BOK_WS_NO_PRIVILEGES = 'BOK_WS_NO_PRIVILEGES';
    const INCORRECT_STATUS = 'INCORRECT_STATUS';
    const EMPTY_DATA = 'EMPTY_DATA';
    const BOK_WS_TRY_AGAIN_LATER = 'BOK_WS_TRY_AGAIN_LATER';
    const VALIDATION_ERROR = 'VALIDATION_ERROR';
    const ORDER_CANCEL_DENIED = 'ORDER_CANCEL_DENIED';

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("status")
     */
    private $status;

    /**
     * @var ErrorDetailsPCRV2[]
     * @JMS\Type("array<Webit\DPDClient\DPDServices\PackagesPickupCall\ErrorDetailsPCRV2>")
     * @JMS\SerializedName("errorDetails")
     */
    private $errorDetails;

    /**
     * @param string $status
     * @param ErrorDetailsPCRV2[] $errorDetails
     */
    public function __construct($status, array $errorDetails = array())
    {
        $this->status = $status;
        $this->errorDetails = $errorDetails;
    }

    /**
     * @return string
     */
    public function status()
    {
        return $this->status;
    }

    /**
     * @return ErrorDetailsPCRV2[]
     */
    public function errorDetails()
    {
        return $this->errorDetails;
    }
}

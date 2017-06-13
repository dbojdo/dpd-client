<?php

namespace Webit\DPDClient\PackagesPickupCall;

use JMS\Serializer\Annotation as JMS;

class ErrorDetailsPCRV2
{
    const BOK_WS_EMPTY_VALUE = 'BOK_WS_EMPTY_VALUE';
    const BOK_WS_INCORRECT_VALUE = 'BOK_WS_INCORRECT_VALUE';
    const BOK_WS_INCORRECT_FORMAT = 'BOK_WS_INCORRECT_FORMAT';
    const BOK_WS_INCORRECT_SET_OF_PARAMS = 'BOK_WS_INCORRECT_SET_OF_PARAMS';
    const BOK_WS_INCORRECT_PICKUP_TIME = 'BOK_WS_INCORRECT_PICKUP_TIME';
    const BOK_WS_INCORRECT_GABARITS = 'BOK_WS_INCORRECT_GABARITS';
    const BOK_WS_VALUE_GREATER_THAN = 'BOK_WS_VALUE_GREATER_THAN';
    const BOK_WS_VALUE_LOWER_THAN = 'BOK_WS_VALUE_LOWER_THAN';
    const BOK_WS_DATE_BEFORE_NOW = 'BOK_WS_DATE_BEFORE_NOW';
    const BOK_WS_DATES_NOT_WITHIN_THE_SAME_DAY = 'BOK_WS_DATES_NOT_WITHIN_THE_SAME_DAY';
    const BOK_WS_VALUE_BLOCKED = 'BOK_WS_VALUE_BLOCKED';
    const BOK_WS_BUSINESS_RULES_BLOCKED = 'BOK_WS_BUSINESS_RULES_BLOCKED';
    const BOK_WS_VALUE_NOT_A_NUMBER = 'BOK_WS_VALUE_NOT_A_NUMBER';
    const BOK_WS_VALUE_NOT_A_POSTAL_CODE = 'BOK_WS_VALUE_NOT_A_POSTAL_CODE';
    const BOK_WS_VALUE_NOT_AN_HOUR = 'BOK_WS_VALUE_NOT_AN_HOUR';
    const BOK_WS_VALUE_NOT_A_MINUTE = 'BOK_WS_VALUE_NOT_A_MINUTE';
    const BOK_WS_VALUE_NOT_A_DATE = 'BOK_WS_VALUE_NOT_A_DATE';
    const BOK_WS_NOT_ALLOWED_SEND_TO_DISPATCHER = 'BOK_WS_NOT_ALLOWED_SEND_TO_DISPATCHER';
    const BOK_WS_NOT_ALLOWED_SEND_TO_COORDINATOR = 'BOK_WS_NOT_ALLOWED_SEND_TO_COORDINATOR';
    const BOK_WS_VALUE_NOT_IN_FORMAT_HH_MM = 'BOK_WS_VALUE_NOT_IN_FORMAT_HH_MM';
    const BOK_WS_INCATION_ERROR = 'BOK_WS_INCATION_ERROR';
    const BOK_WS_INCORRECT_STATUS_CHANGE = 'BOK_WS_INCORRECT_STATUS_CHANGE';
    const BOK_WS_NONEXISTENT_USER = 'BOK_WS_NONEXISTENT_USER';
    const BOK_WS_UNKNOWN_ERROR = 'BOK_WS_UNKNOWN_ERROR';

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("code")
     */
    private $code;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("description")
     */
    private $description;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("fields")
     */
    private $fields;

    /**
     * @param string $code
     * @param string $description
     * @param string $fields
     */
    public function __construct($code, $description, $fields)
    {
        $this->code = $code;
        $this->description = $description;
        $this->fields = $fields;
    }

    /**
     * @return string
     */
    public function code()
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function description()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function fields()
    {
        return $this->fields;
    }
}
<?php

namespace Webit\DPDClient\PackagesGeneration;

use JMS\Serializer\Annotation as JMS;

class ValidationInfoPGRV2
{
    /**
     * @var int
     * @JMS\SerializedName("ErrorId")
     * @JMS\Type("integer")
     */
    private $errorId;

    /**
     * @var string
     * @JMS\SerializedName("ErrorCode")
     * @JMS\Type("string")
     */
    private $errorCode;

    /**
     * @var string
     * @JMS\SerializedName("FieldNames")
     * @JMS\Type("string")
     */
    private $fieldNames;

    /**
     * @var string
     * @JMS\SerializedName("Info")
     * @JMS\Type("string")
     */
    private $info;

    /**
     * ValidationInfoPGRV2 constructor.
     * @param int $errorId
     * @param string $errorCode
     * @param string $fieldNames
     * @param string $info
     */
    public function __construct($errorId, $errorCode, $fieldNames, $info)
    {
        $this->errorId = $errorId;
        $this->errorCode = $errorCode;
        $this->fieldNames = $fieldNames;
        $this->info = $info;
    }

    /**
     * @return int
     */
    public function errorId()
    {
        return $this->errorId;
    }

    /**
     * @return string
     */
    public function errorCode()
    {
        return $this->errorCode;
    }

    /**
     * @return string
     */
    public function fieldNames()
    {
        return $this->fieldNames;
    }

    /**
     * @return string
     */
    public function info()
    {
        return $this->info;
    }
}

<?php
/**
 * File InvalidFieldPGRV1.php
 * Created at: 2017-06-12 21:22
 *
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */

namespace Webit\DPDClient\PackagesGeneration;

use JMS\Serializer\Annotation as JMS;

class InvalidFieldPGRV1
{
    /**
     * @var string
     * @JMS\SerializedName("fieldName")
     * @JMS\Type("string")
     */
    private $fieldName;

    /**
     * @var string
     * @JMS\SerializedName("info")
     * @JMS\Type("string")
     */
    private $info;

    /**
     * @var string
     * @JMS\SerializedName("status")
     * @JMS\Type("string")
     */
    private $status;

    /**
     * InvalidFieldPGRV1 constructor.
     * @param string $fieldName
     * @param string $info
     * @param string $status
     */
    public function __construct($fieldName, $info, $status)
    {
        $this->fieldName = $fieldName;
        $this->info = $info;
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function fieldName()
    {
        return $this->fieldName;
    }

    /**
     * @return string
     */
    public function info()
    {
        return $this->info;
    }

    /**
     * @return string
     */
    public function status()
    {
        return $this->status;
    }
}
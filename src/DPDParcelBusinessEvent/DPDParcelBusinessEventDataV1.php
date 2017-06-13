<?php
/**
 * Created by PhpStorm.
 * User: dbojdo
 * Date: 14/06/2017
 * Time: 11:22
 */

namespace Webit\DPDClient\DPDParcelBusinessEvent;

use JMS\Serializer\Annotation as JMS;

class DPDParcelBusinessEventDataV1
{
    /**
     * @var string
     * @JMS\SerializedName("code")
     * @JMS\Type("string")
     */
    private $code;

    /**
     * @var string
     * @JMS\SerializedName("value")
     * @JMS\Type("string")
     */
    private $value;

    /**
     * DPDParcelBusinessEventDataV1 constructor.
     * @param string $code
     * @param string $value
     */
    public function __construct($code, $value)
    {
        $this->code = $code;
        $this->value = $value;
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
    public function value()
    {
        return $this->value;
    }
}
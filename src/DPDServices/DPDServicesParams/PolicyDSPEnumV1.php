<?php

namespace Webit\DPDClient\DPDServices\DPDServicesParams;

final class PolicyDSPEnumV1
{
    /** @var string[] */
    private static $policies = array(
        'STOP_ON_FIRST_ERROR' => 'STOP_ON_FIRST_ERROR',
        'IGNORE_ERRORS' => 'IGNORE_ERRORS'
    );

    /** @var string */
    private $policy;

    /**
     * PolicyDPPEnumV1 constructor.
     * @param string $policy
     */
    private function __construct($policy)
    {
        $this->policy = $policy;
    }

    /**
     * @return PolicyDSPEnumV1
     */
    public static function stopOnFirstError()
    {
        return new self(self::$policies['STOP_ON_FIRST_ERROR']);
    }

    /**
     * @return PolicyDSPEnumV1
     */
    public static function ignoreErrors()
    {
        return new self(self::$policies['IGNORE_ERRORS']);
    }

    /**
     * @inheritdoc
     */
    public function __toString()
    {
        return $this->policy;
    }
}
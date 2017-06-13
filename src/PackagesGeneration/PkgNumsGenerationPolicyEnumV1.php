<?php

namespace Webit\DPDClient\PackagesGeneration;

final class PkgNumsGenerationPolicyEnumV1
{
    /**
     * @var string[]
     */
    private static $policies = array(
        'ALL_OR_NOTHING' => 'ALL_OR_NOTHING',
        'STOP_ON_FIRST_ERROR' => 'STOP_ON_FIRST_ERROR',
        'IGNORE_ERRORS' => 'IGNORE_ERRORS'
    );

    /**
     * @var string
     */
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
     * @return PkgNumsGenerationPolicyEnumV1
     */
    public static function stopOnFirstError()
    {
        return new self(self::$policies['STOP_ON_FIRST_ERROR']);
    }

    /**
     * @return PkgNumsGenerationPolicyEnumV1
     */
    public static function ignoreErrors()
    {
        return new self(self::$policies['IGNORE_ERRORS']);
    }

    /**
     * @return PkgNumsGenerationPolicyEnumV1
     */
    public static function allOrNothing()
    {
        return new self(self::$policies['ALL_OR_NOTHING']);
    }

    /**
     * @inheritdoc
     */
    public function __toString()
    {
        return $this->policy;
    }
}

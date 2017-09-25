<?php

namespace Webit\DPDClient;

use Faker\Factory;
use Faker\Generator;
use Webit\SoapApi\Util\Dumper\VoidDumper;

abstract class AbstractTest extends \PHPUnit_Framework_TestCase
{
    /** @var string */
    protected static $runId;

    public static function setUpBeforeClass()
    {
        self::$runId = self::$runId ?: substr(md5(mt_rand(0, 100000).microtime()), -8);
    }

    /** @var Generator */
    private $faker;

    /**
     * @param int $min
     * @param int $max
     * @return int
     */
    protected function randomInt($min = null, $max = PHP_INT_MAX)
    {
        $min = (int)($min === null ? -PHP_INT_MAX : $min);
        $max = (int)($max === null ? PHP_INT_MAX : $max);

        return mt_rand($min, $max);
    }

    /**
     * @param int $max
     * @return int
     */
    protected function randomPositiveInt($max = PHP_INT_MAX)
    {
        return $this->randomInt(1, $max);
    }

    /**
     * @param int $length
     * @return bool|string
     */
    protected function randomString($length = 32)
    {
        $string = '';
        do {
            $string .= md5(microtime().$this->randomInt());
        } while (strlen($string) < $length);

        return substr($string, 0, $length);
    }

    /**
     * @return bool
     */
    protected function randomBoolean()
    {
        return (bool)$this->randomInt(0, 1);
    }

    /**
     * @return Generator
     */
    protected function faker()
    {
        if (! $this->faker) {
            $this->faker = Factory::create('pl_PL');
        }

        return $this->faker;
    }

    /**
     * @return \Mockery\MockInterface|\Webit\SoapApi\Executor\SoapApiExecutor
     */
    protected function mockSoapExecutor()
    {
        return \Mockery::mock('Webit\SoapApi\Executor\SoapApiExecutor');
    }

    protected function ioDumperDir()
    {
        $dir = getenv('dpd.dump_io') ?: null;
        if (!$dir) {
            return new VoidDumper();
        }

        return __DIR__.'/../'.$dir;
    }
}

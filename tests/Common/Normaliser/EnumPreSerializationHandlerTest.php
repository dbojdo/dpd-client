<?php
/**
 * File EnumPreSerializationHandlerTest.php
 * Created at: 2017-09-10 13:20
 *
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */

namespace Webit\DPDClient\Common\Normaliser;

use JMS\Serializer\SerializationContext;
use Webit\DPDClient\AbstractTest;

class EnumPreSerializationHandlerTest extends AbstractTest
{
    /**
     * @test
     */
    public function shouldCastToString()
    {
        $visitor = \Mockery::mock('JMS\Serializer\JsonSerializationVisitor');

        $handler = new EnumPreSerializationHandler();
        $object = new RubbishClassWithToString($string = $this->randomString());

        $this->assertEquals(
            $string,
            $handler->serialize($visitor, $object, array(), SerializationContext::create())
        );
    }

    /**
     * @test
     */
    public function shouldCreateAValidCallable()
    {
        $handlerCallable = EnumPreSerializationHandler::createCallable();

        $visitor = \Mockery::mock('JMS\Serializer\JsonSerializationVisitor');

        $object = new RubbishClassWithToString($string = $this->randomString());

        $this->assertEquals(
            $string,
            call_user_func($handlerCallable, $visitor, $object, array(), SerializationContext::create())
        );
    }
}

class RubbishClassWithToString
{
    /** @var string */
    private $xyz;

    /**
     * RubbishClassWithToString constructor.
     * @param $xyz
     */
    public function __construct($xyz)
    {
        $this->xyz = $xyz;
    }

    /**
     * @inheritdoc
     */
    public function __toString()
    {
        return $this->xyz;
    }
}
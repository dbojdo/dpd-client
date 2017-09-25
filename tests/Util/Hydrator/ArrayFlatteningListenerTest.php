<?php

namespace Webit\DPDClient\Util\Hydrator;

use JMS\Serializer\DeserializationContext;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;
use Webit\DPDClient\DPDServices\AbstractServicesTest;

class ArrayFlatteningListenerTest extends AbstractServicesTest
{
    /**
     * @param array $data
     * @param string $key
     * @param array $expectedData
     * @dataProvider data
     * @test
     */
    public function shouldFlattenArray(array $data, $key, array $expectedData)
    {
        $listener = new ArrayFlatteningListener($key);
        $event = new PreDeserializeEvent(DeserializationContext::create(), $data, array());

        $listener->flattenArray($event);

        $this->assertEquals($expectedData, $event->getData());
    }

    public function data()
    {
        return array(
            'non array key' => array(
                $data = array($key = $this->randomString() => $this->randomString()),
                $key,
                $data
            ),
            'undefined key' => array(
                $data = array($this->randomString() => $this->randomString()),
                $this->randomString(),
                $data
            ),
            'takes first sub-key' => array(
                $data = array(
                    $key = $this->randomString() => array(
                        $subKey1 = $this->randomString() => array($this->randomString()),
                        $subKey2 = $this->randomString() => array($this->randomString())
                    )
                ),
                $key,
                array($key => $data[$key][$subKey1])
            ),
            'flatten string' => array(
                $data = array(
                    $key = $this->randomString() => array(
                        $subKey1 = $this->randomString() => $this->randomString()
                    )
                ),
                $key,
                array($key => $data[$key][$subKey1])
            ),
        );
    }

    /**
     * @test
     */
    public function shouldCreateAValidCallback()
    {
        $data = array(
            $key = $this->randomString() => array(
                $subKey1 = $this->randomString() => $this->randomString()
            )
        );

        $callback = ArrayFlatteningListener::createCallable($key);

        $event = new PreDeserializeEvent(DeserializationContext::create(), $data, array());


        $data[$key] = $data[$key][$subKey1];
        call_user_func($callback, $event);
        $this->assertEquals($data, $event->getData());
    }
}

<?php

namespace Webit\DPDClient\Common\Client;

use JMS\Serializer\EventDispatcher\EventDispatcher;
use JMS\Serializer\EventDispatcher\Events;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\SerializerBuilder;
use Webit\DPDClient\Common\Normaliser\EnumPreSerializationHandler;
use Webit\SoapApi\Hydrator\Serializer\Listener\ArrayEnsuringListener;
use Webit\SoapApi\Hydrator\Serializer\Listener\ArrayFlatteningListener;

abstract class SerializerFactory
{
    /**
     * @return \JMS\Serializer\Serializer
     */
    public function create()
    {
        $builder = SerializerBuilder::create();

        $builder->addDefaultListeners();

        $arrayFlattening = $this->arrayFlatteningTypes();
        $arrayAssuring = $this->arrayEnsuringTypes();
        $builder->configureListeners(
            function (EventDispatcher $eventDispatcher) use ($arrayFlattening, $arrayAssuring) {
                foreach ($arrayFlattening as $class => $fields) {
                    foreach ((array)$fields as $field) {
                        $eventDispatcher->addListener(
                            Events::PRE_DESERIALIZE,
                            ArrayFlatteningListener::createCallable($field),
                            $class,
                            'json'
                        );
                    }
                }

                foreach ($arrayAssuring as $class => $fields) {
                    foreach ((array)$fields as $field) {
                        $eventDispatcher->addListener(
                            Events::PRE_DESERIALIZE,
                            ArrayEnsuringListener::createCallable($field),
                            $class,
                            'json'
                        );
                    }
                }
            }
        );

        $builder->addDefaultHandlers();

        $enums = $this->enums();
        $builder->configureHandlers(function (HandlerRegistry $registry) use ($enums) {
            $callable = EnumPreSerializationHandler::createCallable();
            foreach ($enums as $class) {
                $registry->registerHandler(
                    'serialization',
                    $class,
                    'json',
                    $callable
                );
            }
        });

        return $builder->build();
    }

    /**
     * Template method to be overridden
     * @return array
     */
    protected function arrayEnsuringTypes()
    {
        return array();
    }

    /**
     * Template method to be overridden
     * @return array
     */
    protected function arrayFlatteningTypes()
    {
        return array();
    }

    /**
     * Template method to be overridden
     * @return array
     */
    protected function enums()
    {
        return array();
    }
}

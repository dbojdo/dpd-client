<?php

namespace Webit\DPDClient\DPDInfoServices\Client;

use JMS\Serializer\EventDispatcher\EventDispatcher;
use JMS\Serializer\EventDispatcher\Events;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\SerializerBuilder;
use Webit\DPDClient\Util\Hydrator\ArrayEnsuringListener;
use Webit\DPDClient\Util\Hydrator\ArrayFlatteningListener;
use Webit\DPDClient\Util\Normaliser\EnumPreSerializationHandler;

class SerializerFactory
{
    /** @var string[] */
    private static $enums = array(
        'Webit\DPDClient\DPDInfoServices\CustomerEvents\EventsSelectTypeEnum'
    );

    /** @var string[] */
    private static $arrayFlattening = array();

    /** @var string[] */
    private static $arrayAssuring = array(
        'Webit\DPDClient\DPDInfoServices\CustomerEvents\CustomerEventsResponseV1' => 'eventsList',
        'Webit\DPDClient\DPDInfoServices\CustomerEvents\CustomerEventsResponseV2' => 'eventsList',
        'Webit\DPDClient\DPDInfoServices\CustomerEvents\CustomerEventV2' => 'eventDataList',
        'Webit\DPDClient\DPDInfoServices\CustomerEvents\CustomerEventsResponseV3' => 'eventsList',
        'Webit\DPDClient\DPDInfoServices\CustomerEvents\CustomerEventV3' => 'eventDataList'
    );

    /**
     * @return \JMS\Serializer\Serializer
     */
    public function create()
    {
        $builder = SerializerBuilder::create();

        $builder->addDefaultListeners();

        $arrayFlattening = self::$arrayFlattening;
        $arrayAssuring = self::$arrayAssuring;
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

        $enums = SerializerFactory::$enums;
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
}

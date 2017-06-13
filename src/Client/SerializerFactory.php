<?php

namespace Webit\DPDClient\Client;

use JMS\Serializer\EventDispatcher\EventDispatcher;
use JMS\Serializer\EventDispatcher\Events;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\SerializerBuilder;
use Webit\DPDClient\Common\Hydrator\ArrayEnsuringListener;
use Webit\DPDClient\Common\Hydrator\ArrayFlatteningListener;
use Webit\DPDClient\Common\Normaliser\EnumPreSerializationHandler;

class SerializerFactory
{
    /** @var string[] */
    private static $enums = array(
        'Webit\DPDClient\PackagesGeneration\PkgNumsGenerationPolicyEnumV1',
        'Webit\DPDClient\DocumentGeneration\OutputDocFormatDSPEnumV1',
        'Webit\DPDClient\DocumentGeneration\OutputDocPageFormatDSPEnumV1',
        'Webit\DPDClient\DPDPickupCallParams\PickupCallOperationTypeDPPEnumV1',
        'Webit\DPDClient\DPDPickupCallParams\PickupCallOrderTypeDPPEnumV1',
        'Webit\DPDClient\DPDPickupCallParams\PickupCallUpdateModeDPPEnumV1',
        'Webit\DPDClient\DPDPickupCallParams\PolicyDPPEnumV1',
        'Webit\DPDClient\DPDServicesParams\PolicyDSPEnumV1',
        'Webit\DPDClient\DPDServicesParams\SessionTypeDSPEnumV1',
        'Webit\DPDClient\PackagesGeneration\OpenUMLF\PayerType',
        'Webit\DPDClient\DocumentGeneration\OutputLabelTypeEnumV2'
    );

    /** @var string[] */
    private static $arrayFlattening = array(
        'Webit\DPDClient\PackagesGeneration\PackagesGenerationResponseV2' => 'Packages',
        'Webit\DPDClient\PackagesGeneration\PackagesGenerationResponseV3' => 'Packages',
        'Webit\DPDClient\PackagesGeneration\PackagePGRV2' => array('Parcels', 'ValidationDetails'),
    );

    /** @var string[] */
    private static $arrayAssuring = array(
        'Webit\DPDClient\PackagesPickupCall\PackagesPickupCallResponseV1' => 'prototocols',
        'Webit\DPDClient\PackagesPickupCall\StatusInfoPCRV2' => 'errorDetails',
        'Webit\DPDClient\PackagesGeneration\PackagePGRV1' => array('parcels', 'invalidFields'),
        'Webit\DPDClient\PackagesGeneration\PackagesGenerationResponseV1' => 'packages',
        'Webit\DPDClient\DocumentGeneration\SessionDGRV1' => 'packages',
        'Webit\DPDClient\DocumentGeneration\PackageDGRV1' => 'parcels',
        'Webit\DPDClient\PackagesGeneration\PackagesGenerationResponseV2' => 'Packages',
        'Webit\DPDClient\PackagesGeneration\PackagesGenerationResponseV3' => 'Packages',
        'Webit\DPDClient\PackagesGeneration\PackagePGRV2' => array('Parcels', 'ValidationDetails'),
        'Webit\DPDClient\PackagesGeneration\ParcelPGRV2' => 'ValidationDetails',
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
<?php

namespace Webit\DPDClient\DPDServices\Client;

use JMS\Serializer\EventDispatcher\EventDispatcher;
use JMS\Serializer\EventDispatcher\Events;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\SerializerBuilder;
use Webit\DPDClient\Util\Normaliser\EnumPreSerializationHandler;
use Webit\SoapApi\Hydrator\Serializer\Listener\ArrayEnsuringListener;
use Webit\SoapApi\Hydrator\Serializer\Listener\ArrayFlatteningListener;

class SerializerFactory
{
    /** @var string[] */
    private static $enums = array(
        'Webit\DPDClient\DPDServices\PackagesGeneration\PkgNumsGenerationPolicyEnumV1',
        'Webit\DPDClient\DPDServices\DocumentGeneration\OutputDocFormatDSPEnumV1',
        'Webit\DPDClient\DPDServices\DocumentGeneration\OutputDocPageFormatDSPEnumV1',
        'Webit\DPDClient\DPDServices\DPDPickupCallParams\PickupCallOperationTypeDPPEnumV1',
        'Webit\DPDClient\DPDServices\DPDPickupCallParams\PickupCallOrderTypeDPPEnumV1',
        'Webit\DPDClient\DPDServices\DPDPickupCallParams\PickupCallUpdateModeDPPEnumV1',
        'Webit\DPDClient\DPDServices\DPDPickupCallParams\PolicyDPPEnumV1',
        'Webit\DPDClient\DPDServices\DPDServicesParams\PolicyDSPEnumV1',
        'Webit\DPDClient\DPDServices\DPDServicesParams\SessionTypeDSPEnumV1',
        'Webit\DPDClient\DPDServices\PackagesGeneration\OpenUMLF\PayerType',
        'Webit\DPDClient\DPDServices\DocumentGeneration\OutputLabelTypeEnumV2'
    );

    /** @var string[] */
    private static $arrayFlattening = array(
        'Webit\DPDClient\DPDServices\PackagesGeneration\PackagesGenerationResponseV2' => 'Packages',
        'Webit\DPDClient\DPDServices\PackagesGeneration\PackagesGenerationResponseV3' => 'Packages',
        'Webit\DPDClient\DPDServices\PackagesGeneration\PackagePGRV2' => array('Parcels', 'ValidationDetails'),
    );

    /** @var string[] */
    private static $arrayAssuring = array(
        'Webit\DPDClient\DPDServices\PackagesPickupCall\PackagesPickupCallResponseV1' => 'prototocols',
        'Webit\DPDClient\DPDServices\PackagesPickupCall\StatusInfoPCRV2' => 'errorDetails',
        'Webit\DPDClient\DPDServices\PackagesGeneration\PackagePGRV1' => array('parcels', 'invalidFields'),
        'Webit\DPDClient\DPDServices\PackagesGeneration\PackagesGenerationResponseV1' => 'packages',
        'Webit\DPDClient\DPDServices\DocumentGeneration\SessionDGRV1' => 'packages',
        'Webit\DPDClient\DPDServices\DocumentGeneration\PackageDGRV1' => 'parcels',
        'Webit\DPDClient\DPDServices\PackagesGeneration\PackagesGenerationResponseV2' => 'Packages',
        'Webit\DPDClient\DPDServices\PackagesGeneration\PackagesGenerationResponseV3' => 'Packages',
        'Webit\DPDClient\DPDServices\PackagesGeneration\PackagePGRV2' => array('Parcels', 'ValidationDetails'),
        'Webit\DPDClient\DPDServices\PackagesGeneration\ParcelPGRV2' => 'ValidationDetails',
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

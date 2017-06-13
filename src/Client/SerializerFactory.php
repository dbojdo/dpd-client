<?php
/**
 * Created by PhpStorm.
 * User: dbojdo
 * Date: 06/09/2017
 * Time: 10:44
 */

namespace Webit\DPDClient\Client;


use JMS\Serializer\EventDispatcher\EventDispatcher;
use JMS\Serializer\EventDispatcher\Events;
use JMS\Serializer\SerializerBuilder;
use Webit\DPDClient\Common\Hydrator\ArrayEnsuringListener;

class SerializerFactory
{
    /**
     * @return \JMS\Serializer\Serializer
     */
    public function create()
    {
        $builder = SerializerBuilder::create();

        $builder->configureListeners(function (EventDispatcher $eventDispatcher) {
            $eventDispatcher->addListener(
                Events::PRE_DESERIALIZE,
                ArrayEnsuringListener::createCallable('prototocols'),
                'Webit\DPDClient\PackagesPickupCall\PackagesPickupCallResponseV1',
                'json'
            );

            $eventDispatcher->addListener(
                Events::PRE_DESERIALIZE,
                ArrayEnsuringListener::createCallable('errorDetails'),
                'Webit\DPDClient\PackagesPickupCall\StatusInfoPCRV2',
                'json'
            );

            $eventDispatcher->addListener(
                Events::PRE_DESERIALIZE,
                ArrayEnsuringListener::createCallable('parcels'),
                'Webit\DPDClient\PackagesGeneration\PackagePGRV1',
                'json'
            );

            $eventDispatcher->addListener(
                Events::PRE_DESERIALIZE,
                ArrayEnsuringListener::createCallable('invalidFields'),
                'Webit\DPDClient\PackagesGeneration\PackagePGRV1',
                'json'
            );

            $eventDispatcher->addListener(
                Events::PRE_DESERIALIZE,
                ArrayEnsuringListener::createCallable('packages'),
                'Webit\DPDClient\PackagesGeneration\PackagesGenerationResponseV1',
                'json'
            );

            $eventDispatcher->addListener(
                Events::PRE_DESERIALIZE,
                ArrayEnsuringListener::createCallable('packages'),
                'Webit\DPDClient\DocumentGeneration\SessionDGRV1',
                'json'
            );

            $eventDispatcher->addListener(
                Events::PRE_DESERIALIZE,
                ArrayEnsuringListener::createCallable('parcels'),
                'Webit\DPDClient\DocumentGeneration\PackageDGRV1',
                'json'
            );
        });

        return $builder->build();
    }
}
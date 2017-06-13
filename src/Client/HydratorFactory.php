<?php
/**
 * Created by PhpStorm.
 * User: dbojdo
 * Date: 06/09/2017
 * Time: 10:46
 */

namespace Webit\DPDClient\Client;

use JMS\Serializer\SerializerInterface;
use Webit\DPDClient\Common\Hydrator\ResponseExtractingHydrator;
use Webit\SoapApi\Hydrator\ArrayHydrator;
use Webit\SoapApi\Hydrator\ChainHydrator;
use Webit\SoapApi\Hydrator\HydratorSerializerBased;
use Webit\SoapApi\Hydrator\Serializer\ResultTypeMap;
use Webit\SoapApi\Util\StdClassToArray;

class HydratorFactory
{
    /**
     * @param SerializerInterface $serializer
     * @return ChainHydrator
     */
    public function create(SerializerInterface $serializer)
    {
        return new ChainHydrator(
            array(
                new ResponseExtractingHydrator(),
                new ArrayHydrator(new StdClassToArray()),
                new HydratorSerializerBased(
                    $serializer,
                    new ResultTypeMap(
                        array(
                            'findPostalCodeV1' => 'Webit\DPDClient\PostalCode\FindPostalCodeResponseV1',
                            'getCourierOrderAvailabilityV1' => 'Webit\DPDClient\PostalCode\GetCourierOrderAvailabilityResponseV1',
                            'packagesPickupCallV1' => 'Webit\DPDClient\PackagesPickupCall\PackagesPickupCallResponseV1',
                            'packagesPickupCallV2' => 'Webit\DPDClient\PackagesPickupCall\PackagesPickupCallResponseV2',
                            'packagesPickupCallV3' => 'Webit\DPDClient\PackagesPickupCall\PackagesPickupCallResponseV3',
                            'generatePackagesNumbersV1' => 'Webit\DPDClient\PackagesGeneration\PackagesGenerationResponseV1',
                            'generateSpedLabelsV1' => 'Webit\DPDClient\DocumentGeneration\DocumentGenerationResponseV1',
                            'generateProtocolV1' => 'Webit\DPDClient\DocumentGeneration\DocumentGenerationResponseV1',
                            'importDeliveryBusinessEventV1' => 'Webit\DPDClient\ImportDeliveryBusinessEvent\ImportDeliveryBusinessEventResponseV1'
                        )
                    )
                )
            )
        );
    }
}
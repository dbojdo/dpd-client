<?php

namespace Webit\DPDClient\DPDServices\Client;

use Webit\DPDClient\Common\Client\SerializerFactory as BaseSerializerFactory;

class SerializerFactory extends BaseSerializerFactory
{
    /**
     * @inheritdoc
     */
    protected function arrayEnsuringTypes()
    {
        return array(
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
    }

    /**
     * @inheritdoc
     */
    protected function arrayFlatteningTypes()
    {
        return array(
            'Webit\DPDClient\DPDServices\PackagesGeneration\PackagesGenerationResponseV2' => 'Packages',
            'Webit\DPDClient\DPDServices\PackagesGeneration\PackagesGenerationResponseV3' => 'Packages',
            'Webit\DPDClient\DPDServices\PackagesGeneration\PackagePGRV2' => array('Parcels', 'ValidationDetails'),
        );
    }

    /**
     * @inheritdoc
     */
    protected function enums()
    {
        return array(
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
    }
}

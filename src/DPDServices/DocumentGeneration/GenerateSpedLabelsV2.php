<?php

namespace Webit\DPDClient\DPDServices\DocumentGeneration;

use Webit\DPDClient\DPDServices\Common\AuthDataV1;
use Webit\DPDClient\DPDServices\DPDServicesParams\DPDServicesParamsV1;
use Webit\SoapApi\AbstractApi;

class GenerateSpedLabelsV2 extends AbstractApi
{
    /**
     * @param DPDServicesParamsV1 $DPDServicesParamsV1
     * @param OutputDocFormatDSPEnumV1 $outputDocFormatV1
     * @param OutputDocPageFormatDSPEnumV1 $outputDocPageFormatV1
     * @param OutputLabelTypeEnumV2 $outputLabelTypeV2
     * @param AuthDataV1 $authDataV1
     * @return DocumentGenerationResponseV2
     */
    public function __invoke(
        DPDServicesParamsV1 $DPDServicesParamsV1,
        OutputDocFormatDSPEnumV1 $outputDocFormatV1,
        OutputDocPageFormatDSPEnumV1 $outputDocPageFormatV1,
        OutputLabelTypeEnumV2 $outputLabelTypeV2 = null,
        AuthDataV1 $authDataV1
    ) {
        /** @var DocumentGenerationResponseV2 $response */
        $response = $this->doRequest(
            'generateSpedLabelsV2',
            array(
                'dpdServicesParamsV1' => $DPDServicesParamsV1,
                'outputDocFormatV1' => $outputDocFormatV1,
                'outputDocPageFormatV1' => $outputDocPageFormatV1,
                'outputLabelTypeV2' => $outputLabelTypeV2,
                'authDataV1' => $authDataV1
            )
        );

        return $response;
    }
}
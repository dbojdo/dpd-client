<?php

namespace Webit\DPDClient\DocumentGeneration;

use Webit\DPDClient\Common\AuthDataV1;
use Webit\DPDClient\DPDServicesParams\DPDServicesParamsV1;
use Webit\SoapApi\AbstractApi;

class GenerateProtocolV1 extends AbstractApi
{
    /**
     * @param DPDServicesParamsV1 $DPDServicesParamsV1
     * @param OutputDocFormatDSPEnumV1 $outputDocFormatV1
     * @param OutputDocPageFormatDSPEnumV1 $outputDocPageFormatV1
     * @param AuthDataV1 $authDataV1
     * @return DocumentGenerationResponseV1
     */
    public function __invoke(
        DPDServicesParamsV1 $DPDServicesParamsV1,
        OutputDocFormatDSPEnumV1 $outputDocFormatV1,
        OutputDocPageFormatDSPEnumV1 $outputDocPageFormatV1,
        AuthDataV1 $authDataV1
    ) {
        /** @var DocumentGenerationResponseV1 $response */
        $response = $this->doRequest(
            'generateProtocolV1',
            array(
                'dpdServicesParamsV1' => $DPDServicesParamsV1,
                'outputDocFormatV1' => $outputDocFormatV1,
                'outputDocPageFormatV1' => $outputDocPageFormatV1,
                'authDataV1' => $authDataV1
            )
        );

        return $response;
    }
}

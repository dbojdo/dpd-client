<?php

namespace Webit\DPDClient\DPDServices\PackagesGeneration;

use Webit\DPDClient\DPDServices\Common\AuthDataV1;
use Webit\DPDClient\DPDServices\PackagesGeneration\OpenUMLF\OpenUMLFV2;
use Webit\SoapApi\AbstractApi;

class GeneratePackagesNumbersV3 extends AbstractApi
{
    /**
     * @param OpenUMLFV2 $openUmlf
     * @param PkgNumsGenerationPolicyEnumV1 $generationPolicy
     * @param string $langCode
     * @param AuthDataV1 $authData
     * @return PackagesGenerationResponseV3
     */
    public function __invoke(
        OpenUMLFV2 $openUmlf,
        PkgNumsGenerationPolicyEnumV1 $generationPolicy,
        $langCode,
        AuthDataV1 $authData
    ) {
        /** @var PackagesGenerationResponseV3 $response */
        $response = $this->doRequest(
            'generatePackagesNumbersV3',
            array(
                'openUMLFeV2' => $openUmlf,
                'policyV1' => $generationPolicy,
                'langCode' => $langCode,
                'authDataV1' => $authData
            )
        );

        return $response;
    }
}
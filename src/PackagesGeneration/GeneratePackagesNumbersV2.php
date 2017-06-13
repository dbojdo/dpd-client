<?php

namespace Webit\DPDClient\PackagesGeneration;

use Webit\DPDClient\Common\AuthDataV1;
use Webit\DPDClient\PackagesGeneration\OpenUMLF\OpenUMLFV1;
use Webit\SoapApi\AbstractApi;

class GeneratePackagesNumbersV2 extends AbstractApi
{
    /**
     * @param OpenUMLFV1 $openUmlf
     * @param PkgNumsGenerationPolicyEnumV1 $generationPolicy
     * @param string $langCode
     * @param AuthDataV1 $authData
     * @return PackagesGenerationResponseV2
     */
    public function __invoke(
        OpenUMLFV1 $openUmlf,
        PkgNumsGenerationPolicyEnumV1 $generationPolicy,
        $langCode,
        AuthDataV1 $authData
    ) {
        /** @var PackagesGenerationResponseV2 $response */
        $response = $this->doRequest(
            'generatePackagesNumbersV2',
            array(
                'openUMLV1' => $openUmlf,
                'policyV1' => $generationPolicy,
                'langCode' => $langCode,
                'authDataV1' => $authData
            )
        );

        return $response;
    }
}
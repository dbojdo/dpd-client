<?php

namespace Webit\DPDClient\DPDServices\PackagesGeneration;

use Webit\DPDClient\DPDServices\Common\AuthDataV1;
use Webit\DPDClient\DPDServices\PackagesGeneration\OpenUMLF\OpenUMLFV1;
use Webit\SoapApi\AbstractApi;

class GeneratePackagesNumbersV1 extends AbstractApi
{
    /**
     * @param OpenUMLFV1 $openUmlf
     * @param PkgNumsGenerationPolicyEnumV1 $generationPolicy
     * @param AuthDataV1 $authData
     * @return PackagesGenerationResponseV1
     */
    public function __invoke(
        OpenUMLFV1 $openUmlf,
        PkgNumsGenerationPolicyEnumV1 $generationPolicy,
        AuthDataV1 $authData
    ) {
        /** @var PackagesGenerationResponseV1 $response */
        $response = $this->doRequest(
            'generatePackagesNumbersV1',
            array(
                'openUMLV1' => $openUmlf,
                'policyV1' => $generationPolicy,
                'authDataV1' => $authData
            )
        );

        return $response;
    }
}

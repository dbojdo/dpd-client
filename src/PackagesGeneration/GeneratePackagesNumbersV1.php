<?php
/**
 * Created by PhpStorm.
 * User: dbojdo
 * Date: 05/09/2017
 * Time: 13:00
 */

namespace Webit\DPDClient\PackagesGeneration;

use Webit\DPDClient\Common\AuthDataV1;
use Webit\DPDClient\PackagesGeneration\OpenUMLF\OpenUMLF;
use Webit\SoapApi\Executor\SoapApiExecutor;

class GeneratePackagesNumbersV1
{
    /**
     * @var SoapApiExecutor
     */
    private $soapExecutor;

    /**
     * GeneratePackagesNumbersV1 constructor.
     * @param SoapApiExecutor $soapExecutor
     */
    public function __construct(SoapApiExecutor $soapExecutor)
    {
        $this->soapExecutor = $soapExecutor;
    }

    /**
     * @param OpenUMLF $openUml
     * @param $generationPolicy
     * @param AuthDataV1 $authData
     * @return PackagesGenerationResponseV1
     */
    public function __invoke(OpenUMLF $openUml, $generationPolicy, AuthDataV1 $authData)
    {
        /** @var PackagesGenerationResponseV1 $response */
        $response = $this->soapExecutor->executeSoapFunction(
            'generatePackagesNumbersV1',
            array(
                'openUMLV1' => $openUml,
                'policyV1' => $generationPolicy,
                'authDataV1' => $authData
            )
        );

        return $response;
    }
}
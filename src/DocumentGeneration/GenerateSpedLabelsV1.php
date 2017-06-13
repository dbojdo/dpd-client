<?php
/**
 * File GenerateSpedLabelsV1.php
 * Created at: 2017-09-05 22:34
 *
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */

namespace Webit\DPDClient\DocumentGeneration;

use Webit\DPDClient\Common\AuthDataV1;
use Webit\DPDClient\DPDServicesParams\DPDServicesParamsV1;
use Webit\SoapApi\Executor\SoapApiExecutor;

class GenerateSpedLabelsV1
{
    /**
     * @var SoapApiExecutor
     */
    private $soapExecutor;

    /**
     * GenerateSpedLabelsV1 constructor.
     * @param SoapApiExecutor $soapExecutor
     */
    public function __construct(SoapApiExecutor $soapExecutor)
    {
        $this->soapExecutor = $soapExecutor;
    }

    public function __invoke(
        DPDServicesParamsV1 $DPDServicesParamsV1,
        $outputDocFormatV1,
        $outputDocPageFormatV1,
        AuthDataV1 $authDataV1
    ) {
        /** @var DocumentGenerationResponseV1 $response */
        $response = $this->soapExecutor->executeSoapFunction(
            'generateSpedLabelsV1',
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
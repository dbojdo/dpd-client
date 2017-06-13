<?php
/**
 * File GenerateProtocolV1.php
 * Created at: 2017-09-05 23:27
 *
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */

namespace Webit\DPDClient\DocumentGeneration;

use Webit\DPDClient\Common\AuthDataV1;
use Webit\DPDClient\DPDServicesParams\DPDServicesParamsV1;
use Webit\SoapApi\Executor\SoapApiExecutor;

class GenerateProtocolV1
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

    /**
     * @param DPDServicesParamsV1 $DPDServicesParamsV1
     * @param $outputDocFormatV1
     * @param $outputDocPageFormatV1
     * @param AuthDataV1 $authDataV1
     * @return DocumentGenerationResponseV1
     */
    public function __invoke(
        DPDServicesParamsV1 $DPDServicesParamsV1,
        $outputDocFormatV1,
        $outputDocPageFormatV1,
        AuthDataV1 $authDataV1
    ) {
        /** @var DocumentGenerationResponseV1 $response */
        $response = $this->soapExecutor->executeSoapFunction(
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

<?php
/**
 * Created by PhpStorm.
 * User: dbojdo
 * Date: 06/09/2017
 * Time: 15:19
 */

namespace Webit\DPDClient\DocumentGeneration;

use Webit\DPDClient\AbstractTest;
use Webit\DPDClient\Common\OutputDocFormatDSPEnumV1;
use Webit\DPDClient\Common\OutputDocPageFormatDSPEnumV1;
use Webit\SoapApi\Executor\SoapApiExecutor;

class GenerateSpedLabelsV1Test extends AbstractTest
{
    /**
     * @var SoapApiExecutor|\Mockery\MockInterface
     */
    private $soapExecutor;

    /**
     * @var GenerateProtocolV1
     */
    private $generateSpedLabels;

    protected function setUp()
    {
        $this->soapExecutor = $this->mockSoapExecutor();
        $this->generateSpedLabels = new GenerateSpedLabelsV1($this->soapExecutor);
    }

    /**
     * @test
     */
    public function shouldGenerateProtocol()
    {
        $params = $this->mockDpdServicesParams();
        $outputFormat = OutputDocFormatDSPEnumV1::PDF;
        $outputPageFormat = OutputDocPageFormatDSPEnumV1::LBL_PRINTER;
        $authData = $this->mockAuthData();

        $response = $this->mockDocumentGenerationResponse();

        $this->soapExecutor->shouldReceive('executeSoapFunction')->with(
            'generateSpedLabelsV1',
            array(
                'dpdServicesParamsV1' => $params,
                'outputDocFormatV1' => $outputFormat,
                'outputDocPageFormatV1' => $outputPageFormat,
                'authDataV1' => $authData
            )
        )->once()->andReturn($response);

        $this->assertSame(
            $response,
            $this->generateSpedLabels->__invoke($params, $outputFormat, $outputPageFormat, $authData)
        );
    }

    /**
     * @return \Mockery\MockInterface|\Webit\DPDClient\DPDServicesParams\DPDServicesParamsV1
     */
    private function mockDpdServicesParams()
    {
        return \Mockery::mock('Webit\DPDClient\DPDServicesParams\DPDServicesParamsV1');
    }

    /**
     * @return \Mockery\MockInterface|\Webit\DPDClient\DocumentGeneration\DocumentGenerationResponseV1
     */
    private function mockDocumentGenerationResponse()
    {
        return \Mockery::mock('Webit\DPDClient\DocumentGeneration\DocumentGenerationResponseV1');
    }
}

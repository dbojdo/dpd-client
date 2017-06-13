<?php

namespace Webit\DPDClient\DocumentGeneration;

use Webit\DPDClient\AbstractTest;
use Webit\DPDClient\DocumentGeneration\OutputDocFormatDSPEnumV1;
use Webit\DPDClient\DocumentGeneration\OutputDocPageFormatDSPEnumV1;
use Webit\SoapApi\Executor\SoapApiExecutor;

class GenerateProtocolV1Test extends AbstractTest
{
    /** @var SoapApiExecutor|\Mockery\MockInterface */
    private $soapExecutor;

    /** @var GenerateProtocolV1 */
    private $generateProtocol;

    protected function setUp()
    {
        $this->soapExecutor = $this->mockSoapExecutor();
        $this->generateProtocol = new GenerateProtocolV1($this->soapExecutor);
    }

    /**
     * @test
     */
    public function shouldGenerateProtocol()
    {
        $params = $this->mockDpdServicesParams();
        $outputFormat = OutputDocFormatDSPEnumV1::pdf();
        $outputPageFormat = OutputDocPageFormatDSPEnumV1::lblPrinter();
        $authData = $this->mockAuthData();

        $response = $this->mockDocumentGenerationResponse();

        $this->soapExecutor->shouldReceive('executeSoapFunction')->with(
            'generateProtocolV1',
            array(
                'dpdServicesParamsV1' => $params,
                'outputDocFormatV1' => $outputFormat,
                'outputDocPageFormatV1' => $outputPageFormat,
                'authDataV1' => $authData
            )
        )->once()->andReturn($response);

        $this->assertSame(
            $response,
            $this->generateProtocol->__invoke($params, $outputFormat, $outputPageFormat, $authData)
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

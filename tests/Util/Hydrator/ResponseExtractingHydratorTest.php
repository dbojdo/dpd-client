<?php

namespace Webit\DPDClient\Util\Hydrator;


use Webit\DPDClient\DPDServices\AbstractServicesTest;

class ResponseExtractingHydratorTest extends AbstractServicesTest
{
    /** @var ResponseExtractingHydrator */
    private $hydrator;

    protected function setUp()
    {
        $this->hydrator = new ResponseExtractingHydrator();
    }

    /**
     * @param $soapResponse
     * @param $expectedExtractedResponse
     * @test
     * @dataProvider responses
     */
    public function shouldExtractResponse($soapResponse, $expectedExtractedResponse)
    {
        $this->assertEquals(
            $expectedExtractedResponse,
            $this->hydrator->hydrateResult($soapResponse, $this->randomString())
        );
    }

    public function responses()
    {
        $examples = array(
            'not a stdClass' => array(
                $soapResponse = array($this->randomString() => $this->randomInt()),
                $soapResponse
            ),
            'stdClass not having "return"' => array(
                $soapResponse = new \stdClass(),
                $soapResponse
            )
        );

        $data = array(
            $this->randomString() => $this->randomInt(),
            $this->randomInt() => $this->randomString()
        );

        $soapResponse = new \stdClass();
        $soapResponse->return = $data;

        $examples['stdClass having "return"'] = array(
            $soapResponse,
            $data
        );

        return $examples;
    }
}
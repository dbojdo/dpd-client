<?php

namespace Webit\DPDClient\PostalCode;

class FindPostalCodeResponseV1Test extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function testGetters()
    {
       $response = new FindPostalCodeResponseV1('OK');
       $this->assertEquals('OK', $response->status());
    }
}

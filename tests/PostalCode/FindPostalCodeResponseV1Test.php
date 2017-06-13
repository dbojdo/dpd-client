<?php
/**
 * Created by PhpStorm.
 * User: dbojdo
 * Date: 26/06/2017
 * Time: 15:15
 */

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

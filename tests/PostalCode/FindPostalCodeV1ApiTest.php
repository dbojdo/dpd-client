<?php
/**
 * Created by PhpStorm.
 * User: dbojdo
 * Date: 26/06/2017
 * Time: 14:31
 */

namespace Webit\DPDClient\PostalCode;

use Webit\DPDClient\AbstractApiTest;

class FindPostalCodeV1ApiTest extends AbstractApiTest
{
    /**
     * @var FindPostalCodeV1
     */
    private $findPostalCode;

    protected function setUp()
    {
        $this->findPostalCode = new FindPostalCodeV1($this->soapExecutor());
    }

    /**
     * @group api
     * @test
     * @dataProvider postCodes
     */
    public function shouldFindPostalCodeV1($postalCode, $status)
    {
        $result = $this->findPostalCode->__invoke(
            $postalCode,
            $this->authData()
        );

        $this->assertInstanceOf(
            'Webit\DPDClient\PostalCode\FindPostalCodeResponseV1',
            $result
        );

        $this->assertEquals($status, $result->status());
    }

    public function postCodes()
    {
        return array(
            'valid PL' => array(
                new PostalCodeV1('PL', '32020'),
                'OK'
            ),
            'valid UK' => array(
                new PostalCodeV1('GB', 'RM81TF'),
                'OK'
            ),
            'invalid UK' => array(
                new PostalCodeV1('GB', 'RM8 1TF'),
                'WRONG_POSTAL_PATTERN'
            ),
            'invalid country' => array(
                new PostalCodeV1('XX', 'RM81TF'),
                'NONEXISTING_COUNTRY_CODE'
            )
        );
    }
}

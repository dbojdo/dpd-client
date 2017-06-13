<?php
/**
 * Created by PhpStorm.
 * User: dbojdo
 * Date: 19/06/2017
 * Time: 11:49
 */

namespace Webit\DPDClient\PostalCode;

use Webit\DPDClient\Common\AuthDataV1;
use Webit\SoapApi\Executor\SoapApiExecutor;

class FindPostalCodeV1
{
    /**
     * @var SoapApiExecutor
     */
    private $soapExecutor;

    /**
     * FindPostalCodeV1 constructor.
     * @param SoapApiExecutor $soapExecutor
     */
    public function __construct(SoapApiExecutor $soapExecutor)
    {
        $this->soapExecutor = $soapExecutor;
    }


    /**
     * @param PostalCodeV1 $postalCodeV1
     * @param AuthDataV1 $authDataV1
     * @return FindPostalCodeResponseV1
     */
    public function __invoke(PostalCodeV1 $postalCodeV1, AuthDataV1 $authDataV1)
    {
        /**
         * @var FindPostalCodeResponseV1 $response
         */
        $response = $this->soapExecutor->executeSoapFunction(
            'findPostalCodeV1',
            array(
                'postalCodeV1' => $postalCodeV1,
                'authDataV1' => $authDataV1
            )
        );

        return $response;
    }
}

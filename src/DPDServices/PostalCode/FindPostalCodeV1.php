<?php

namespace Webit\DPDClient\DPDServices\PostalCode;

use Webit\DPDClient\DPDServices\Common\AuthDataV1;
use Webit\SoapApi\AbstractApi;

class FindPostalCodeV1 extends AbstractApi
{
    /**
     * @param PostalCodeV1 $postalCodeV1
     * @param AuthDataV1 $authDataV1
     * @return FindPostalCodeResponseV1
     */
    public function __invoke(PostalCodeV1 $postalCodeV1, AuthDataV1 $authDataV1)
    {
        /** @var FindPostalCodeResponseV1 $response */
        $response = $this->doRequest(
            'findPostalCodeV1',
            array(
                'postalCodeV1' => $postalCodeV1,
                'authDataV1' => $authDataV1
            )
        );

        return $response;
    }
}

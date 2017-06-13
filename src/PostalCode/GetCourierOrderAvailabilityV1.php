<?php

namespace Webit\DPDClient\PostalCode;

use Webit\DPDClient\Common\AuthDataV1;
use Webit\SoapApi\AbstractApi;

class GetCourierOrderAvailabilityV1 extends AbstractApi
{
    /**
     * @param SenderPlaceV1 $senderPlace
     * @param AuthDataV1 $authData
     * @return GetCourierOrderAvailabilityResponseV1
     */
    public function __invoke(SenderPlaceV1 $senderPlace, AuthDataV1 $authData)
    {
        /** @var GetCourierOrderAvailabilityResponseV1 $response */
        $response = $this->doRequest(
            'getCourierOrderAvailabilityV1',
            array(
                'senderPlaceV1' => $senderPlace,
                'authDataV1' => $authData
            )
        );

        return $response;
    }
}

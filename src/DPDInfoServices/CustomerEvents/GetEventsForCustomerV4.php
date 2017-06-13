<?php

namespace Webit\DPDClient\DPDInfoServices\CustomerEvents;

use Webit\DPDClient\DPDInfoServices\Common\AuthDataV1;
use Webit\SoapApi\AbstractApi;

class GetEventsForCustomerV4 extends AbstractApi
{
    /**
     * @param int $limit
     * @param string $language
     * @param AuthDataV1 $authDataV1
     * @return CustomerEventsResponseV3
     */
    public function __invoke($limit, $language, AuthDataV1 $authDataV1)
    {
        /** @var CustomerEventsResponseV3 $response */
        $response = $this->doRequest(
            'getEventsForCustomerV4',
            array(
                'limit' => (int)$limit,
                'language' => (string)$language,
                'authDataV1' => $authDataV1
            )
        );

        return $response;
    }
}

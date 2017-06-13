<?php

namespace Webit\DPDClient\DPDInfoServices\CustomerEvents;

use Webit\DPDClient\DPDInfoServices\Common\AuthDataV1;
use Webit\SoapApi\AbstractApi;

class GetEventsForCustomerV2 extends AbstractApi
{
    /**
     * @param int $limit
     * @param string $language
     * @param AuthDataV1 $authDataV1
     * @return CustomerEventsResponseV1
     */
    public function __invoke($limit, $language, AuthDataV1 $authDataV1)
    {
        /** @var CustomerEventsResponseV1 $response */
        $response = $this->doRequest(
            'getEventsForCustomerV2',
            array(
                'limit' => (int)$limit,
                'language' => (string)$language,
                'authDataV1' => $authDataV1
            )
        );

        return $response;
    }
}

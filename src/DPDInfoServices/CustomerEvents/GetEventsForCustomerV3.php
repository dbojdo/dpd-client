<?php

namespace Webit\DPDClient\DPDInfoServices\CustomerEvents;

use Webit\DPDClient\DPDInfoServices\Common\AuthDataV1;
use Webit\SoapApi\AbstractApi;

class GetEventsForCustomerV3 extends AbstractApi
{
    /**
     * @param int $limit
     * @param AuthDataV1 $authDataV1
     * @return CustomerEventsResponseV2
     */
    public function __invoke($limit, AuthDataV1 $authDataV1)
    {
        /** @var CustomerEventsResponseV2 $response */
        $response = $this->doRequest(
            'getEventsForCustomerV3',
            array(
                'limit' => (int)$limit,
                'authDataV1' => $authDataV1
            )
        );

        return $response;
    }
}
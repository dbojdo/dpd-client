<?php

namespace Webit\DPDClient\DPDServices\PackagesPickupCall;

use Webit\DPDClient\DPDServices\Common\AuthDataV1;
use Webit\DPDClient\DPDServices\DPDPickupCallParams\DpdPickupCallParamsV2;
use Webit\SoapApi\AbstractApi;

class PackagesPickupCallV2 extends AbstractApi
{
    /**
     * @param DpdPickupCallParamsV2 $pickupCallParams
     * @param AuthDataV1 $authData
     * @return PackagesPickupCallResponseV2
     */
    public function __invoke(DpdPickupCallParamsV2 $pickupCallParams, AuthDataV1 $authData)
    {
        /** @var PackagesPickupCallResponseV2 $response */
        $response = $this->doRequest(
            'packagesPickupCallV2',
            array(
                'dpdPickupParamsV2' => $pickupCallParams,
                'authDataV1' => $authData
            )
        );

        return $response;
    }
}

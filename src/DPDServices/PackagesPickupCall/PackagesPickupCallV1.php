<?php

namespace Webit\DPDClient\DPDServices\PackagesPickupCall;

use Webit\DPDClient\DPDServices\Common\AuthDataV1;
use Webit\DPDClient\DPDServices\DPDPickupCallParams\DpdPickupCallParamsV1;
use Webit\SoapApi\AbstractApi;

class PackagesPickupCallV1 extends AbstractApi
{
    /**
     * @param DpdPickupCallParamsV1 $pickupCallParams
     * @param AuthDataV1 $authData
     * @return PackagesPickupCallResponseV1
     */
    public function __invoke(DpdPickupCallParamsV1 $pickupCallParams, AuthDataV1 $authData)
    {
        /** @var PackagesPickupCallResponseV1 $response */
        $response = $this->doRequest(
            'packagesPickupCallV1',
            array(
                'dpdPickupParamsV1' => $pickupCallParams,
                'authDataV1' => $authData
            )
        );

        return $response;
    }
}
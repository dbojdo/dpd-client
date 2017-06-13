<?php
/**
 * Created by PhpStorm.
 * User: dbojdo
 * Date: 21/08/2017
 * Time: 09:56
 */

namespace Webit\DPDClient\PackagesPickupCall;

use Webit\DPDClient\Common\AuthDataV1;
use Webit\DPDClient\DPDPickupCallParams\DpdPickupCallParamsV2;
use Webit\SoapApi\Executor\SoapApiExecutor;

class PackagesPickupCallV2
{
    /**
     * @var SoapApiExecutor
     */
    private $soapExecutor;

    /**
     * PackagesPickupCallV1 constructor.
     * @param SoapApiExecutor $soapExecutor
     */
    public function __construct(SoapApiExecutor $soapExecutor)
    {
        $this->soapExecutor = $soapExecutor;
    }

    /**
     * @param DpdPickupCallParamsV2 $pickupCallParams
     * @param AuthDataV1 $authData
     * @return PackagesPickupCallResponseV2
     */
    public function __invoke(DpdPickupCallParamsV2 $pickupCallParams, AuthDataV1 $authData)
    {
        /** @var PackagesPickupCallResponseV2 $response */
        $response = $this->soapExecutor->executeSoapFunction(
            'packagesPickupCallV2',
            array(
                'dpdPickupParamsV2' => $pickupCallParams,
                'authDataV1' => $authData
            )
        );

        return $response;
    }
}

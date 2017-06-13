<?php
/**
 * Created by PhpStorm.
 * User: dbojdo
 * Date: 21/08/2017
 * Time: 11:35
 */

namespace Webit\DPDClient\PackagesPickupCall;

use Webit\DPDClient\Common\AuthDataV1;
use Webit\DPDClient\DPDPickupCallParams\DpdPickupCallParamsV3;
use Webit\SoapApi\Executor\SoapApiExecutor;

class PackagesPickupCallV3
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
     * @param DpdPickupCallParamsV3 $pickupCallParams
     * @param AuthDataV1 $authData
     * @return PackagesPickupCallResponseV3
     */
    public function __invoke(DpdPickupCallParamsV3 $pickupCallParams, AuthDataV1 $authData)
    {
        /** @var PackagesPickupCallResponseV3 $response */
        $response = $this->soapExecutor->executeSoapFunction(
            'packagesPickupCallV3',
            array(
                'dpdPickupParamsV3' => $pickupCallParams,
                'authDataV1' => $authData
            )
        );

        return $response;
    }
}
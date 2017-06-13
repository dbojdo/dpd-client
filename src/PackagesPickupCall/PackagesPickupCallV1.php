<?php
/**
 * Created by PhpStorm.
 * User: dbojdo
 * Date: 27/06/2017
 * Time: 13:25
 */

namespace Webit\DPDClient\PackagesPickupCall;

use Webit\DPDClient\Common\AuthDataV1;
use Webit\DPDClient\DPDPickupCallParams\DpdPickupCallParamsV1;
use Webit\SoapApi\Executor\SoapApiExecutor;

class PackagesPickupCallV1
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
     * @param DpdPickupCallParamsV1 $pickupCallParams
     * @param AuthDataV1 $authData
     * @return PackagesPickupCallResponseV1
     */
    public function __invoke(DpdPickupCallParamsV1 $pickupCallParams, AuthDataV1 $authData)
    {
        /** @var PackagesPickupCallResponseV1 $response */
        $response = $this->soapExecutor->executeSoapFunction(
            'packagesPickupCallV1',
            array(
                'dpdPickupParamsV1' => $pickupCallParams,
                'authDataV1' => $authData
            )
        );

        return $response;
    }
}
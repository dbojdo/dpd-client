<?php
/**
 * Created by PhpStorm.
 * User: dbojdo
 * Date: 26/06/2017
 * Time: 15:50
 */

namespace Webit\DPDClient\PostalCode;

use Webit\DPDClient\Common\AuthDataV1;
use Webit\SoapApi\Executor\SoapApiExecutor;

class GetCourierOrderAvailabilityV1
{
    /**
     * @var SoapApiExecutor
     */
    private $soapExecutor;

    /**
     * GetCourierOrderAvailabilityV1 constructor.
     * @param SoapApiExecutor $soapExecutor
     */
    public function __construct(SoapApiExecutor $soapExecutor)
    {
        $this->soapExecutor = $soapExecutor;
    }

    /**
     * @param SenderPlaceV1 $senderPlace
     * @param AuthDataV1 $authData
     * @return GetCourierOrderAvailabilityResponseV1
     */
    public function __invoke(SenderPlaceV1 $senderPlace, AuthDataV1 $authData)
    {
        /** @var GetCourierOrderAvailabilityResponseV1 $response */
        $response = $this->soapExecutor->executeSoapFunction(
            'getCourierOrderAvailabilityV1',
            array(
                'senderPlaceV1' => $senderPlace,
                'authDataV1' => $authData
            )
        );

        return $response;
    }
}

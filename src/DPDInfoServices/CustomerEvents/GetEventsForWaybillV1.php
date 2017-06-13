<?php

namespace Webit\DPDClient\DPDInfoServices\CustomerEvents;

use Webit\DPDClient\DPDInfoServices\Common\AuthDataV1;
use Webit\SoapApi\AbstractApi;

class GetEventsForWaybillV1 extends AbstractApi
{
    /**
     * @param $waybill
     * @param EventsSelectTypeEnum $eventsSelectType
     * @param $language
     * @param AuthDataV1 $authDataV1
     * @return CustomerEventsResponseV3
     */
    public function __invoke($waybill, EventsSelectTypeEnum $eventsSelectType, $language, AuthDataV1 $authDataV1)
    {
        /** @var CustomerEventsResponseV3 $response */
        $response = $this->doRequest(
            'getEventsForWaybillV1',
            array(
                'waybill' => (string)$waybill,
                'eventsSelectType' => $eventsSelectType,
                'language' => $language,
                'authDataV1' => $authDataV1
            )
        );

        return $response;
    }
}

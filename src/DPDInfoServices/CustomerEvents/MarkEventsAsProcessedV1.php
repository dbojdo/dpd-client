<?php

namespace Webit\DPDClient\DPDInfoServices\CustomerEvents;

use Webit\DPDClient\DPDInfoServices\Common\AuthDataV1;
use Webit\SoapApi\AbstractApi;

class MarkEventsAsProcessedV1 extends AbstractApi
{
    /**
     * @param string $confirmId
     * @param AuthDataV1 $authDataV1
     * @return bool
     */
    public function __invoke($confirmId, AuthDataV1 $authDataV1)
    {
        return (bool)$this->doRequest(
            'markEventsAsProcessedV1',
            array(
                'confirmId' => (string)$confirmId,
                'authDataV1' => $authDataV1
            )
        );
    }
}

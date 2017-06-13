<?php

namespace Webit\DPDClient\DPDServices\ImportDeliveryBusinessEvent;

use Webit\DPDClient\DPDServices\Common\AuthDataV1;
use Webit\DPDClient\DPDServices\DPDParcelBusinessEvent\DPDParcelBusinessEventV1;
use Webit\SoapApi\AbstractApi;

class ImportDeliveryBusinessEvent extends AbstractApi
{
    /**
     * @param DPDParcelBusinessEventV1 $DPDParcelBusinessEventV1
     * @param AuthDataV1 $authDataV1
     * @return ImportDeliveryBusinessEventResponseV1
     */
    public function __invoke(DPDParcelBusinessEventV1 $DPDParcelBusinessEventV1, AuthDataV1 $authDataV1)
    {
        /** @var ImportDeliveryBusinessEventResponseV1 $response */
        $response = $this->doRequest(
            'importDeliveryBusinessEventV1',
            array(
                'dpdParcelBusinessEventV1' => $DPDParcelBusinessEventV1,
                'authDataV1' => $authDataV1
            )
        );

        return $response;
    }
}
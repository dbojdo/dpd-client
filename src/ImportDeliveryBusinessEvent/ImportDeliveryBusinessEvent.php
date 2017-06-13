<?php
/**
 * File ImportDeliveryBusinessEvent.php
 * Created at: 2017-09-05 23:45
 *
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */

namespace Webit\DPDClient\ImportDeliveryBusinessEvent;

use Webit\DPDClient\Common\AuthDataV1;
use Webit\DPDClient\DPDParcelBusinessEvent\DPDParcelBusinessEventV1;
use Webit\SoapApi\Executor\SoapApiExecutor;

class ImportDeliveryBusinessEvent
{
    /**
     * @var SoapApiExecutor
     */
    private $soapExecutor;

    /**
     * ImportDeliveryBusinessEvent constructor.
     * @param SoapApiExecutor $soapExecutor
     */
    public function __construct(SoapApiExecutor $soapExecutor)
    {
        $this->soapExecutor = $soapExecutor;
    }

    /**
     * @param DPDParcelBusinessEventV1 $DPDParcelBusinessEventV1
     * @param AuthDataV1 $authDataV1
     * @return ImportDeliveryBusinessEventResponseV1
     */
    public function __invoke(DPDParcelBusinessEventV1 $DPDParcelBusinessEventV1, AuthDataV1 $authDataV1)
    {
        /** @var ImportDeliveryBusinessEventResponseV1 $response */
        $response = $this->soapExecutor->executeSoapFunction(
            'importDeliveryBusinessEventV1',
            array(
                'dpdParcelBusinessEventV1' => $DPDParcelBusinessEventV1,
                'authDataV1' => $authDataV1
            )
        );

        return $response;
    }
}
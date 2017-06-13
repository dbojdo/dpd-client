<?php

namespace Webit\DPDClient\ImportDeliveryBusinessEvent;

use Webit\DPDClient\DPDParcelBusinessEvent\DPDParcelBusinessEventDataV1;
use Webit\DPDClient\DPDParcelBusinessEvent\DPDParcelBusinessEventV1;
use Webit\DPDClient\AbstractApiTest;
use Webit\DPDClient\PackagesGeneration\GeneratePackagesNumbersV1;
use Webit\DPDClient\PackagesGeneration\PkgNumsGenerationPolicyEnumV1;

class ImportDeliveryBusinessEventApiTest extends AbstractApiTest
{
    /** @var ImportDeliveryBusinessEvent */
    private $importDeliveryBusinessEvent;

    /** @var GeneratePackagesNumbersV1 */
    private $generatePackagesNumbersV1;

    protected function setUp()
    {
        $this->generatePackagesNumbersV1 = new GeneratePackagesNumbersV1($this->soapExecutor());
        $this->importDeliveryBusinessEvent = new ImportDeliveryBusinessEvent($this->soapExecutor());
    }

    /**
     * @test
     */
    public function shouldImportDeliveryBusinessEvent()
    {
        $openUml = $this->generateOpenUmlf(false, false);
        $numbers = $this->generatePackagesNumbersV1->__invoke(
            $openUml,
            PkgNumsGenerationPolicyEnumV1::allOrNothing(),
            $this->authData()
        );

        foreach ($numbers->packages() as $package) {
            foreach ($package->parcels() as $parcel) {
                $waybill = $parcel->waybill();

                $response = $this->importDeliveryBusinessEvent->__invoke(
                    new DPDParcelBusinessEventV1(
                        'PL',
                        '30313',
                        'event-code',
                        $waybill,
                        new \DateTime(),
                        array(
                            new DPDParcelBusinessEventDataV1('e1', 'v1')
                        )
                    ),
                    $this->authData()
                );

                $this->assertInstanceOf(
                    '\Webit\DPDClient\ImportDeliveryBusinessEvent\ImportDeliveryBusinessEventResponseV1',
                    $response
                );
            }
        }
    }
}

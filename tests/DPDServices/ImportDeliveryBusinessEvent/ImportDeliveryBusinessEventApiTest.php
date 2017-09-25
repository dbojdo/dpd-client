<?php

namespace Webit\DPDClient\DPDServices\ImportDeliveryBusinessEvent;

use Webit\DPDClient\DPDServices\AbstractApiTest;
use Webit\DPDClient\DPDServices\Common\Exception\NotSufficientPrivilegesException;
use Webit\DPDClient\DPDServices\DPDParcelBusinessEvent\DPDParcelBusinessEventDataV1;
use Webit\DPDClient\DPDServices\DPDParcelBusinessEvent\DPDParcelBusinessEventV1;
use Webit\DPDClient\DPDServices\PackagesGeneration\GeneratePackagesNumbersV3;
use Webit\DPDClient\DPDServices\PackagesGeneration\PkgNumsGenerationPolicyEnumV1;

/**
 * @group api
 */
class ImportDeliveryBusinessEventApiTest extends AbstractApiTest
{
    /** @var ImportDeliveryBusinessEvent */
    private $importDeliveryBusinessEvent;

    /** @var GeneratePackagesNumbersV3 */
    private $generatePackagesNumbers;

    protected function setUp()
    {
        $this->generatePackagesNumbers = new GeneratePackagesNumbersV3($this->soapExecutor());
        $this->importDeliveryBusinessEvent = new ImportDeliveryBusinessEvent($this->soapExecutor());
    }

    /**
     * @test
     */
    public function shouldImportDeliveryBusinessEvent()
    {
        $openUml = $this->generateOpenUmlfV2(false, false);
        $numbers = $this->generatePackagesNumbers->__invoke(
            $openUml,
            PkgNumsGenerationPolicyEnumV1::allOrNothing(),
            'PL',
            $this->authData()
        );

        foreach ($numbers->packages() as $package) {
            foreach ($package->parcels() as $parcel) {
                $waybill = $parcel->waybill();

                try {
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
                } catch (NotSufficientPrivilegesException $e) {
                    $this->markTestSkipped($e->getMessage());
                    return;
                }

                $this->assertInstanceOf(
                    '\Webit\DPDClient\DPDServices\ImportDeliveryBusinessEvent\ImportDeliveryBusinessEventResponseV1',
                    $response
                );
            }
        }
    }
}

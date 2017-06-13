<?php

namespace Webit\DPDClient\Client;

use Webit\DPDClient\Client;
use Webit\DPDClient\Common\AuthDataV1;
use Webit\DPDClient\DocumentGeneration\GenerateProtocolV1;
use Webit\DPDClient\DocumentGeneration\GenerateSpedLabelsV1;
use Webit\DPDClient\DocumentGeneration\GenerateSpedLabelsV2;
use Webit\DPDClient\ImportDeliveryBusinessEvent\ImportDeliveryBusinessEvent;
use Webit\DPDClient\PackagesGeneration\GeneratePackagesNumbersV1;
use Webit\DPDClient\PackagesGeneration\GeneratePackagesNumbersV2;
use Webit\DPDClient\PackagesGeneration\GeneratePackagesNumbersV3;
use Webit\DPDClient\PackagesPickupCall\PackagesPickupCallV1;
use Webit\DPDClient\PackagesPickupCall\PackagesPickupCallV2;
use Webit\DPDClient\PackagesPickupCall\PackagesPickupCallV3;
use Webit\DPDClient\PostalCode\FindPostalCodeV1;
use Webit\DPDClient\PostalCode\GetCourierOrderAvailabilityV1;

class ClientFactory
{
    /** @var SoapExecutorFactory */
    private $soapExecutorFactory;

    /**
     * @param SoapExecutorFactory $soapExecutorFactory
     */
    public function __construct(SoapExecutorFactory $soapExecutorFactory = null)
    {
        $this->soapExecutorFactory = $soapExecutorFactory ?: new SoapExecutorFactory();
    }

    /**
     * @param AuthDataV1 $authDataV1
     * @param string $wsdl
     * @return Client
     */
    public function create(AuthDataV1 $authDataV1, $wsdl = null)
    {
        $wsdl = $wsdl ?: ClientEnvironments::wsdl(ClientEnvironments::PROD);
        $soapExecutor = $this->soapExecutorFactory->create($wsdl);

        return new Client(
            new FindPostalCodeV1($soapExecutor),
            new GetCourierOrderAvailabilityV1($soapExecutor),
            new GeneratePackagesNumbersV1($soapExecutor),
            new GeneratePackagesNumbersV2($soapExecutor),
            new GeneratePackagesNumbersV3($soapExecutor),
            new GenerateSpedLabelsV1($soapExecutor),
            new GenerateSpedLabelsV2($soapExecutor),
            new GenerateProtocolV1($soapExecutor),
            new PackagesPickupCallV1($soapExecutor),
            new PackagesPickupCallV2($soapExecutor),
            new PackagesPickupCallV3($soapExecutor),
            new ImportDeliveryBusinessEvent($soapExecutor),
            $authDataV1
        );
    }
}
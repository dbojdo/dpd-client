<?php

namespace Webit\DPDClient\DPDInfoServices\Client;

use Webit\DPDClient\DPDInfoServices\Client;
use Webit\DPDClient\DPDInfoServices\Common\AuthDataV1;
use Webit\DPDClient\DPDInfoServices\CustomerEvents\GetEventsForCustomerV1;
use Webit\DPDClient\DPDInfoServices\CustomerEvents\GetEventsForCustomerV2;
use Webit\DPDClient\DPDInfoServices\CustomerEvents\GetEventsForCustomerV3;
use Webit\DPDClient\DPDInfoServices\CustomerEvents\GetEventsForCustomerV4;
use Webit\DPDClient\DPDInfoServices\CustomerEvents\GetEventsForWaybillV1;
use Webit\DPDClient\DPDInfoServices\CustomerEvents\MarkEventsAsProcessedV1;

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
            new GetEventsForCustomerV1($soapExecutor),
            new GetEventsForCustomerV2($soapExecutor),
            new GetEventsForCustomerV3($soapExecutor),
            new GetEventsForCustomerV4($soapExecutor),
            new GetEventsForWaybillV1($soapExecutor),
            new MarkEventsAsProcessedV1($soapExecutor),
            $authDataV1
        );
    }
}

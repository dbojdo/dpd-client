<?php

namespace Webit\DPDClient\DPDInfoServices;

use Webit\DPDClient\DPDInfoServices\Common\AuthDataV1;
use Webit\DPDClient\DPDInfoServices\CustomerEvents\EventsSelectTypeEnum;
use Webit\DPDClient\DPDInfoServices\CustomerEvents\GetEventsForCustomerV1;
use Webit\DPDClient\DPDInfoServices\CustomerEvents\GetEventsForCustomerV2;
use Webit\DPDClient\DPDInfoServices\CustomerEvents\GetEventsForCustomerV3;
use Webit\DPDClient\DPDInfoServices\CustomerEvents\GetEventsForCustomerV4;
use Webit\DPDClient\DPDInfoServices\CustomerEvents\GetEventsForWaybillV1;
use Webit\DPDClient\DPDInfoServices\CustomerEvents\MarkEventsAsProcessedV1ApiTest;

class Client
{
    /** @var GetEventsForCustomerV1 */
    private $getEventsForCustomerV1;

    /** @var GetEventsForCustomerV2 */
    private $getEventsForCustomerV2;

    /** @var GetEventsForCustomerV3 */
    private $getEventsForCustomerV3;

    /** @var GetEventsForCustomerV4 */
    private $getEventsForCustomerV4;

    /** @var GetEventsForWaybillV1 */
    private $eventsForWaybillV1;

    /** @var MarkEventsAsProcessedV1ApiTest */
    private $markEventsAsProcessedV1;

    /** @var AuthDataV1 */
    private $authDataV1;

    /**
     * Client constructor.
     * @param GetEventsForCustomerV1 $getEventsForCustomerV1
     * @param GetEventsForCustomerV2 $getEventsForCustomerV2
     * @param GetEventsForCustomerV3 $getEventsForCustomerV3
     * @param GetEventsForCustomerV4 $getEventsForCustomerV4
     * @param GetEventsForWaybillV1 $eventsForWaybillV1
     * @param MarkEventsAsProcessedV1ApiTest $markEventsAsProcessedV1
     * @param AuthDataV1 $authDataV1
     */
    public function __construct(
        GetEventsForCustomerV1 $getEventsForCustomerV1,
        GetEventsForCustomerV2 $getEventsForCustomerV2,
        GetEventsForCustomerV3 $getEventsForCustomerV3,
        GetEventsForCustomerV4 $getEventsForCustomerV4,
        GetEventsForWaybillV1 $eventsForWaybillV1,
        MarkEventsAsProcessedV1ApiTest $markEventsAsProcessedV1,
        AuthDataV1 $authDataV1
    ) {
        $this->getEventsForCustomerV1 = $getEventsForCustomerV1;
        $this->getEventsForCustomerV2 = $getEventsForCustomerV2;
        $this->getEventsForCustomerV3 = $getEventsForCustomerV3;
        $this->getEventsForCustomerV4 = $getEventsForCustomerV4;
        $this->eventsForWaybillV1 = $eventsForWaybillV1;
        $this->markEventsAsProcessedV1 = $markEventsAsProcessedV1;
        $this->authDataV1 = $authDataV1;
    }

    /**
     * @param $limit
     * @return CustomerEvents\CustomerEventsResponseV1
     */
    public function getEventsForCustomerV1($limit)
    {
        return $this->getEventsForCustomerV1->__invoke($limit, $this->authDataV1);
    }

    /**
     * @param int $limit
     * @param string $language
     * @return CustomerEvents\CustomerEventsResponseV1
     */
    public function getEventsForCustomerV2($limit, $language)
    {
        return $this->getEventsForCustomerV2->__invoke($limit, $language, $this->authDataV1);
    }

    /**
     * @param int $limit
     * @return CustomerEvents\CustomerEventsResponseV2
     */
    public function getEventsForCustomerV3($limit)
    {
        return $this->getEventsForCustomerV3->__invoke($limit, $this->authDataV1);
    }

    /**
     * @param int $limit
     * @param string $language
     * @return CustomerEvents\CustomerEventsResponseV2
     */
    public function getEventsForCustomerV4($limit, $language)
    {
        return $this->getEventsForCustomerV4->__invoke($limit, $language, $this->authDataV1);
    }

    /**
     * @param string $waybill
     * @param EventsSelectTypeEnum $eventsSelectType
     * @param string $language
     * @return CustomerEvents\CustomerEventsResponseV3
     */
    public function getEventsForWaybillV1($waybill, EventsSelectTypeEnum $eventsSelectType, $language)
    {
        return $this->eventsForWaybillV1->__invoke($waybill, $eventsSelectType, $language, $this->authDataV1);
    }

    /**
     * @param string $confirmId
     * @return bool
     */
    public function markEventsAsProcessedV1($confirmId)
    {
        return $this->markEventsAsProcessedV1->__invoke($confirmId, $this->authDataV1);
    }
}

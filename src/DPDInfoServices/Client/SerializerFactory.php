<?php

namespace Webit\DPDClient\DPDInfoServices\Client;

use Webit\DPDClient\Common\Client\SerializerFactory as BaseSerializerFactory;

class SerializerFactory extends BaseSerializerFactory
{
    /**
     * @inheritdoc
     */
    protected function arrayEnsuringTypes()
    {
        return array(
            'Webit\DPDClient\DPDInfoServices\CustomerEvents\CustomerEventsResponseV1' => 'eventsList',
            'Webit\DPDClient\DPDInfoServices\CustomerEvents\CustomerEventsResponseV2' => 'eventsList',
            'Webit\DPDClient\DPDInfoServices\CustomerEvents\CustomerEventV2' => 'eventDataList',
            'Webit\DPDClient\DPDInfoServices\CustomerEvents\CustomerEventsResponseV3' => 'eventsList',
            'Webit\DPDClient\DPDInfoServices\CustomerEvents\CustomerEventV3' => 'eventDataList'
        );
    }

    /**
     * @inheritdoc
     */
    protected function enums()
    {
        return array(
            'Webit\DPDClient\DPDInfoServices\CustomerEvents\EventsSelectTypeEnum'
        );
    }
}

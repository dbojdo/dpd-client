<?php

namespace Webit\DPDClient\DPDServices\ImportDeliveryBusinessEvent;

final class ImportDeliveryBusinessEventStatusEnumV1
{
    const OK = 'OK';
    const PARCEL_NOT_FOUND = 'PARCEL_NOT_FOUND';
    const PARCEL_PERMISSION_DENIED = 'PARCEL_PERMISSION_DENIED';
    const EVENT_PERMISSION_DENIED = 'EVENT_PERMISSION_DENIED';
    const INCORRECT_DATA = 'INCORRECT_DATA';
    const UNKNOWN_ERROR = 'UNKNOWN_ERROR';
}
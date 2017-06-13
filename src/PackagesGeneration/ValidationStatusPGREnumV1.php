<?php
/**
 * File ValidationStatusPGREnumV1.php
 * Created at: 2017-06-12 21:03
 *
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */

namespace Webit\DPDClient\PackagesGeneration;

final class ValidationStatusPGREnumV1
{
    const OK = 'OK';
    const UNKNOWN_ERROR = 'UNKNOWN_ERROR';
    const DB_ERROR = 'DB_ERROR';
    const INCORRECT_DATA = 'INCORRECT_DATA';
    const NOT_PROCESSED = 'NOT_PROCESSED';
    const DUPLICATED_PACKAGE_SEARCH_KEY = 'DUPLICATED_PACKAGE_SEARCH_KEY';
    const DUPLICATED_PARCEL_SEARCH_KEY = 'DUPLICATED_PARCEL_SEARCH_KEY';
    const DISALLOWED_FID = 'DISALLOWED_FID';
    const DUPLICATED_WAYBILL = 'DUPLICATED_WAYBILL';
}
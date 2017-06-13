<?php

namespace Webit\DPDClient\DPDServices\Client;

use Webit\DPDClient\Common\Client\NormaliserFactory as BaseNormaliserFactory;

class NormaliserFactory extends BaseNormaliserFactory
{
    /**
     * @inheritdoc
     */
    protected function soapFunctions()
    {
        return SoapFunctions::all();
    }
}

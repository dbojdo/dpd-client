<?php

namespace Webit\DPDClient\DPDInfoServices\Client;

use Webit\DPDClient\Common\Client\ExceptionsWrappingExecutor as BaseExceptionsWrappingExecutor;

class ExceptionsWrappingExecutor extends BaseExceptionsWrappingExecutor
{
    /**
     * @inheritdoc
     */
    protected function wrapSoapFault(\Exception $e, \SoapFault $previous, $soapFunction, $input)
    {
        return $e;
    }

    /**
     * @inheritdoc
     */
    protected function wrapGenericError(\Exception $e, $soapFunction, $input)
    {
        return $e;
    }
}

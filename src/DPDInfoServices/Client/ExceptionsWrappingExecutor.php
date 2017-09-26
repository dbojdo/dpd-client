<?php

namespace Webit\DPDClient\DPDInfoServices\Client;

use Webit\DPDClient\Common\Client\ExceptionsWrappingExecutor as BaseExceptionsWrappingExecutor;
use Webit\DPDClient\DPDInfoServices\Common\Exception\AccessDeniedException;
use Webit\DPDClient\DPDInfoServices\Common\Exception\DPDInfoServicesException;

class ExceptionsWrappingExecutor extends BaseExceptionsWrappingExecutor
{
    /**
     * @inheritdoc
     */
    protected function wrapSoapFault(\Exception $e, \SoapFault $previous, $soapFunction, $input)
    {
        if (false !== strpos($previous->getMessage(), 'Access denied')) {
            return new AccessDeniedException(
                sprintf('Access denied to the "%s" SOAP function.', $soapFunction),
                0,
                $e
            );
        }

        return $this->wrapGenericError($e, $soapFunction, $input);
    }

    /**
     * @inheritdoc
     */
    protected function wrapGenericError(\Exception $e, $soapFunction, $input)
    {
        return new DPDInfoServicesException(
            sprintf('Error during "%s" SOAP function execution', $soapFunction),
            0,
            $e
        );
    }
}

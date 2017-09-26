<?php

namespace Webit\DPDClient\Common\Client;

use Webit\SoapApi\Executor\SoapApiExecutor;

abstract class ExceptionsWrappingExecutor implements SoapApiExecutor
{
    /**
     * @var SoapApiExecutor
     */
    private $innerExecutor;

    /**
     * ExceptionsWrappingExecutor constructor.
     * @param SoapApiExecutor $innerExecutor
     */
    public function __construct(SoapApiExecutor $innerExecutor)
    {
        $this->innerExecutor = $innerExecutor;
    }

    /**
     * @inheritdoc
     */
    public function executeSoapFunction($soapFunction, $input = null)
    {
        try {
            return $this->innerExecutor->executeSoapFunction($soapFunction, $input);
        } catch (\Exception $e) {
            $previous = $e->getPrevious();
            if ($previous instanceof \SoapFault) {
                throw $this->wrapSoapFault($e, $previous, $soapFunction, $input);
            }

            throw $this->wrapGenericError($e, $soapFunction, $input);
        }
    }

    /**
     * @param \Exception $e
     * @param \SoapFault $previous
     * @param string $soapFunction
     * @param mixed $input
     * @return \Exception
     */
    abstract protected function wrapSoapFault(\Exception $e, \SoapFault $previous, $soapFunction, $input);

    /**
     * @param \Exception $e
     * @param string $soapFunction
     * @param mixed $input
     * @return \Exception
     */
    abstract protected function wrapGenericError(\Exception $e, $soapFunction, $input);
}

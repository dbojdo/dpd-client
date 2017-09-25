<?php

namespace Webit\DPDClient\DPDInfoServices\Client;

use Webit\DPDClient\DPDServices\Common\AuthDataV1;
use Webit\DPDClient\DPDServices\Common\Exception\AuthenticationException;
use Webit\DPDClient\DPDServices\Common\Exception\DPDServicesException;
use Webit\DPDClient\DPDServices\Common\Exception\NotSufficientPrivilegesException;
use Webit\SoapApi\Executor\SoapApiExecutor;

class ExceptionsWrappingExecutor implements SoapApiExecutor
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
     * @param string $soapFunction
     * @param mixed $input
     * @throws \Webit\SoapApi\Exception\SoapApiException
     * @return mixed
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
     * @return AuthenticationException|DPDServicesException|NotSufficientPrivilegesException
     */
    private function wrapSoapFault(\Exception $e, \SoapFault $previous, $soapFunction, $input)
    {
        if (false !== strpos($previous->getMessage(), 'no privileges')) {
            return new NotSufficientPrivilegesException(
                sprintf('You do not have sufficient privileges to execute SOAP function "%s"', $soapFunction),
                null,
                $e
            );
        }

        if (false !== strpos($previous->getMessage(), 'AuthData is null')) {
            return new AuthenticationException(
                'Request parameter "authDataV1" has not been passed or it\'s empty.',
                null,
                $e
            );
        }

        if (false !== strpos($previous->getMessage(), 'Login failed')) {
            @list($login, $fid) = $this->extractLoginAndFid($input);

            return new AuthenticationException(
                sprintf(
                    'Cannot authenticate the request with given credentials (login: %s, masterFid: %s).',
                    $login,
                    $fid
                ),
                null,
                $e
            );
        }

        return $this->wrapGenericError($e, $soapFunction, $input);
    }

    /**
     * @param \Exception $e
     * @param string $soapFunction
     * @param mixed $input
     * @return DPDServicesException
     */
    private function wrapGenericError(\Exception $e, $soapFunction, $input)
    {
        return new DPDServicesException(
            sprintf('Error during SOAP function "%s" execution.', $soapFunction),
            0,
            $e
        );
    }

    private function extractLoginAndFid($input)
    {
        $authData = is_array($input) && isset($input['authDataV1']) ? $input['authDataV1'] : null;

        if ($authData instanceof AuthDataV1) {
            return array($authData->login(), $authData->masterFid());
        }

        if (is_array($authData)) {
            return array(
                isset($authData['login']) ? $authData['login'] : '',
                isset($authData['masterFid']) ? $authData['masterFid'] : ''
            );
        }

        return array('', '');
    }
}

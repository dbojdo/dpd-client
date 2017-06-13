<?php

namespace Webit\DPDClient\Common\Hydrator;

use Webit\SoapApi\Hydrator\Hydrator;

class ResponseExtractingHydrator implements Hydrator
{
    /**
     * @param \stdClass|array $result
     * @param string $soapFunction
     * @return mixed
     */
    public function hydrateResult($result, $soapFunction)
    {
        if (! ($result instanceof \stdClass)) {
            return $result;
        }

        $properties = get_object_vars($result);
        if (! array_key_exists('return', $properties)) {
            return $result;
        }

        return $properties['return'];
    }
}

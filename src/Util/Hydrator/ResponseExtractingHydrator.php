<?php

namespace Webit\DPDClient\Util\Hydrator;

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
        $tmpResult = $result;
        if ($tmpResult instanceof \stdClass) {
            $tmpResult = get_object_vars($result);
        }

        if (array_key_exists('return', $tmpResult)) {
            return $tmpResult['return'];
        }

        return $result;
    }
}

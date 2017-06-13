<?php

namespace Webit\DPDClient\DPDInfoServices\Client;

final class ClientEnvironments
{
    const PROD = 'prod';
    const TEST = 'prod';

    private static $wsdl = array(
        self::PROD => 'https://dpdservices.dpd.com.pl/DPDPackageObjServicesService/DPDPackageObjServices?wsdl',
    );

    /**
     * @param string $env
     * @return bool
     */
    public static function isSupported($env)
    {
        return in_array($env, self::supportedEnvironments());
    }

    /**
     * @return array
     */
    public static function supportedEnvironments()
    {
        return array_keys(self::$wsdl);
    }

    /**
     * @param string $env
     * @return string
     */
    public static function wsdl($env)
    {
        if (!self::isSupported($env)) {
            throw new UnsupportedClientEnvironmentException(
                sprintf(
                    'The environment "%s" is not supported. Supported environments: [%s]',
                    $env,
                    implode(', ', self::supportedEnvironments())
                )
            );
        }

        return self::$wsdl[$env];
    }
}
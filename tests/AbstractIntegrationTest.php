<?php
/**
 * Created by PhpStorm.
 * User: dbojdo
 * Date: 26/06/2017
 * Time: 14:51
 */

namespace Webit\DPDClient;

use JMS\Serializer\Serializer;
use Webit\DPDClient\Client\HydratorFactory;
use Webit\DPDClient\Client\NormaliserFactory;
use Webit\DPDClient\Client\SerializerFactory;
use Webit\DPDClient\PackagesGeneration\OpenUMLF\OpenUMLF;
use Webit\DPDClient\PackagesGeneration\OpenUMLF\Package;
use Webit\DPDClient\PackagesGeneration\OpenUMLF\Parcel;
use Webit\DPDClient\PackagesGeneration\OpenUMLF\Receiver;
use Webit\DPDClient\PackagesGeneration\OpenUMLF\Sender;
use Webit\DPDClient\PackagesGeneration\OpenUMLF\Services;
use Webit\SoapApi\Hydrator\ChainHydrator;
use Webit\SoapApi\Input\InputNormaliserSerializerBased;

abstract class AbstractIntegrationTest extends AbstractTest
{
    /**
     * @return Serializer
     */
    protected function serializer()
    {
        $serializerFactory = new SerializerFactory();
        return $serializerFactory->create();
    }

    /**
     * @param Serializer|null $serializer
     * @return InputNormaliserSerializerBased
     */
    protected function normaliser(Serializer $serializer = null)
    {
        $serializer = $serializer ?: $this->serializer();

        $normaliserFactory = new NormaliserFactory();
        return $normaliserFactory->create($serializer);
    }

    /**
     * @param Serializer|null $serializer
     * @return ChainHydrator
     */
    protected function hydrator(Serializer $serializer = null)
    {
        $serializer = $serializer ?: $this->serializer();

        $hydratorFactory = new HydratorFactory();
        return $hydratorFactory->create($serializer);
    }

    protected function arrayToStdClass(array $arResult)
    {
        return $this->castToObject($arResult);
    }

    private function castToObject($value)
    {
        if (is_array($value)) {
            if (empty($value) || array_key_exists(0, $value)) {
                $objResult = array();
                foreach ($value as $k => $v) {
                    $objResult[$k] = $this->castToObject($v);
                }
                return $objResult;
            }

            $objResult = new \stdClass();
            foreach ($value as $k => $v) {
                $objResult->{$k} = $this->castToObject($v);
            }

            return $objResult;
        }

        if (is_scalar($value) || is_null($value)) {
            return $value;
        }

        return (object)$value;
    }

    protected function generateOpenUmlf($multiplePackages, $multipleParcels, Services $services = null)
    {
        $packages = array();
        $packagesNumber = $multiplePackages ? mt_rand(2, 5) : 1;
        for ($i = 0; $i < $packagesNumber; $i++) {
            $packages[] = $this->generatePackage($multipleParcels, $services ?: new Services());
        }

        return new OpenUMLF(
            $packages
        );
    }

    private function generatePackage($multipleParcels, Services $services)
    {
        $parcels = array();
        $parcelsNumber = $multipleParcels ? mt_rand(2, 5) : 1;
        for ($i = 0; $i < $parcelsNumber; $i++) {
            $parcels[] = $this->generateParcel();
        }

        return new Package(
            new Receiver(
                $this->faker()->company,
                $this->faker()->address,
                'Kraków',
                '30313',
                'PL',
                null,
                $this->faker()->name
            ),
            new Sender(
                $this->faker()->company,
                $this->faker()->address,
                'Kraków',
                '30798',
                'PL',
                $this->authData()->masterFid()
            ),
            'SENDER',
            $parcels,
            $services,
            $this->faker()->isbn13
        );
    }

    private function generateParcel()
    {
        return new Parcel(mt_rand(500, 15000)/100, $this->faker()->colorName);
    }
}

<?php

namespace Webit\DPDClient;

use JMS\Serializer\Serializer;
use Webit\DPDClient\Client\HydratorFactory;
use Webit\DPDClient\Client\NormaliserFactory;
use Webit\DPDClient\Client\SerializerFactory;
use Webit\DPDClient\PackagesGeneration\OpenUMLF\OpenUMLFV1;
use Webit\DPDClient\PackagesGeneration\OpenUMLF\OpenUMLFV2;
use Webit\DPDClient\PackagesGeneration\OpenUMLF\PackageV1;
use Webit\DPDClient\PackagesGeneration\OpenUMLF\PackageV2;
use Webit\DPDClient\PackagesGeneration\OpenUMLF\Parcel;
use Webit\DPDClient\PackagesGeneration\OpenUMLF\PayerType;
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

    protected function generateOpenUmlf(
        $multiplePackages,
        $multipleParcels,
        Services $services = null,
        $senderFid = null
    ) {
        $packages = array();
        $packagesNumber = $multiplePackages ? mt_rand(2, 5) : 1;
        for ($i = 0; $i < $packagesNumber; $i++) {
            $packages[] = $this->generatePackage(
                $multipleParcels,
                $services ?: new Services(),
                $this->generateSender($senderFid),
                $this->generateReceiver()
            );
        }

        return new OpenUMLFV1(
            $packages
        );
    }

    protected function generateOpenUmlfV2(
        $multiplePackages,
        $multipleParcels,
        Services $services = null,
        $customer = null,
        $senderFid = null
    ) {
        $packages = array();
        $packagesNumber = $multiplePackages ? mt_rand(2, 5) : 1;
        for ($i = 0; $i < $packagesNumber; $i++) {
            $packages[] = $this->generatePackageV2(
                $multipleParcels,
                $services ?: new Services(),
                $this->generateSender($senderFid),
                $this->generateReceiver(),
                $customer
            );
        }

        return new OpenUMLFV2(
            $packages
        );
    }

    protected function generatePackage($multipleParcels, Services $services, Sender $sender, Receiver $receiver)
    {
        $parcels = array();
        $parcelsNumber = $multipleParcels ? mt_rand(2, 5) : 1;
        for ($i = 0; $i < $parcelsNumber; $i++) {
            $parcels[] = $this->generateParcel();
        }

        return new PackageV1(
            $receiver,
            $sender,
            PayerType::sender(),
            $parcels,
            $services,
            $this->faker()->isbn13
        );
    }

    protected function generatePackageV2($multipleParcels, Services $services, Sender $sender, Receiver $receiver, $customer)
    {
        $parcels = array();
        $parcelsNumber = $multipleParcels ? mt_rand(2, 5) : 1;
        for ($i = 0; $i < $parcelsNumber; $i++) {
            $parcels[] = $this->generateParcel();
        }

        return new PackageV2(
            $receiver,
            $sender,
            PayerType::sender(),
            $parcels,
            $services,
            $this->faker()->isbn13,
            $customer,
            null,
            'ref1'
        );
    }

    private function generateParcel()
    {
        return new Parcel(mt_rand(500, 15000) / 100, $this->faker()->colorName);
    }

    /**
     * @param int $senderFid
     * @param string $city
     * @param string $postCode
     * @param string $countryCode
     * @return Sender
     */
    protected function generateSender($senderFid = null, $city = null, $postCode = null, $countryCode = null)
    {
        return new Sender(
            $this->faker()->company,
            $this->faker()->address,
            $city ?: 'Kraków',
            $postCode ?: '30313',
            $countryCode ?: 'PL',
            $senderFid ?: $this->faker()->numberBetween(1000, 9999)
        );
    }

    protected function generateReceiver($city = null, $postCode = null, $countryCode = null)
    {
        return new Receiver(
            $this->faker()->company,
            $this->faker()->address,
            $city ?: 'Kraków',
            $postCode ?: '30313',
            $countryCode ?: 'PL',
            null,
            $this->faker()->name,
            $this->faker()->numberBetween(1000, 9999)
        );
    }

}

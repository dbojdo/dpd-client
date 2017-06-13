# DPD SOAP API Client

The repository provides a client to communicate with DPD SOAP API

## Installation

Add the **webit/dpd-client** into **composer.json**

```json
{
    "require": {
        "webit/dpd-client": "^1.0.0"
    }
}
```

## DPDServices

### Creating the DPDServices Client

```php
use Webit\DPDClient\DPDServices\Client\ClientFactory;
use Webit\DPDClient\DPDServices\Common\AuthDataV1;

$authData = new AuthDataV1('login', 'password', 123);

$clientFactory = new ClientFactory();

/** @var \Webit\DPDClient\DPDServices\Client $client */
$client = $clientFactory->create($authData);

// optionally pass the test WSDL path
use Webit\DPDClient\Client\DPDServices\ClientEnvironments;
$client = $clientFactory->create($authData, ClientEnvironments::wsdl(ClientEnvironments::TEST));

// optionally pass a custom WSDL path
use Webit\DPDClient\Client\DPDServices\ClientEnvironments;
$client = $clientFactory->create($authData, 'dpdservices.wsdl');

```

### Supported Client's methods

```php
 public function findPostalCodeV1(PostalCodeV1 $postalCodeV1): FindPostalCodeResponseV1;
 
 public function getCourierOrderAvailability(SenderPlaceV1 $senderPlaceV1): GetCourierOrderAvailabilityResponseV1;
 
 public function generatePackagesNumbersV1(OpenUMLF $openUMLF, PkgNumsGenerationPolicyEnumV1 $generationPolicy): PackagesGenerationResponseV1;
  
 public function generateSpedLabelsV1(DPDServicesParamsV1 $DPDServicesParamsV1, OutputDocFormatDSPEnumV1 $outputDocFormatV1 = null, OutputDocPageFormatDSPEnumV1 $outputDocPageFormatV1 = null): PackagesGenerationResponseV1;
 
 public function generateProtocolV1(DPDServicesParamsV1 $DPDServicesParamsV1, OutputDocFormatDSPEnumV1 $outputDocFormatV1 = null, OutputDocPageFormatDSPEnumV1 $outputDocPageFormatV1 = null): PackagesGenerationResponseV1;
 
 public function packagesPickupCallV1(DpdPickupCallParamsV1 $pickupCallParams): PackagesPickupCallResponseV1;
 
 public function packagesPickupCallV2(DpdPickupCallParamsV2 $pickupCallParams): PackagesPickupCallResponseV2;
 
 public function packagesPickupCallV3(DpdPickupCallParamsV3 $pickupCallParams): PackagesPickupCallResponseV3;
 
 public function importDeliveryBusinessEvent(DPDParcelBusinessEventV1 $businessEventV1): ImportDeliveryBusinessEventResponseV1;
 ```
 
## DPDInfoServices

### Creating the DPDServices Client

```php
use Webit\DPDClient\DPDInfoServices\Client\ClientFactory;
use Webit\DPDClient\DPDInfoServices\Common\AuthDataV1;

$authData = new AuthDataV1('login', 'password', 123);

$clientFactory = new ClientFactory();

/** @var \Webit\DPDClient\DPDInfoServices\Client $client */
$client = $clientFactory->create($authData);

// optionally pass the test WSDL path
use Webit\DPDClient\Client\DPDInfoServices\ClientEnvironments;
$client = $clientFactory->create($authData, ClientEnvironments::wsdl(ClientEnvironments::PROD));

// optionally pass a custom WSDL path
use Webit\DPDClient\Client\DPDInfoServices\ClientEnvironments;
$client = $clientFactory->create($authData, 'dpdinfoservices.wsdl');

```

### Supported Client's methods

```php
 public function getEventsForCustomerV1($limit): CustomerEventsResponseV1;
 
 public function getEventsForCustomerV2($limit, $language): CustomerEventsResponseV1;
 
 public function getEventsForCustomerV3($limit): CustomerEventsResponseV2;
 
 public function getEventsForCustomerV4($limit, $language): CustomerEventsResponseV3; 
 
 public function getEventsForWaybillV1($waybill, EventsSelectTypeEnum $eventSelectType, $language): CustomerEventsResponseV3;
 
 public function markEventsAsProcessedV1($confirmId): bool;
 
 ```
 
## Running the tests

### Unit / Integration Tests

```bash
./vendor/bin/phpunit
```

### Api Tests

To run all the tests (Unit and API) you need to change the DPD credentials

```bash
cp phpunit.xml.dist phpunit.xml
vim phpunit.xml
```

```xml
    <php>
        <env name="dpd.login" value="changeme"/>
        <env name="dpd.password" value="changeme"/>
        <env name="dpd.fid" value="changeme"/>
        <env name="dpd.wsdl" value="https://dpdservicesdemo.dpd.com.pl/DPDPackageObjServicesService/DPDPackageObjServices?wsdl"/>
    </php>
```

```bash
./vendor/bin/phpunit
```

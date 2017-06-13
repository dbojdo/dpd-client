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

## Usage

### Creating the Client

```php
use Webit\DPDClient\Client\ClientFactory;
use Webit\DPDClient\Common\AuthDataV1;

$authData = new AuthDataV1('login', 'password', 123);

$clientFactory = new ClientFactory();

/** @var \Webit\DPDClient\Client $client */
$client = $clientFactory->create($authData);

```

### Supported Client's methods

```php
 public function findPostalCodeV1(PostalCodeV1 $postalCodeV1): FindPostalCodeResponseV1;
 
 public function getCourierOrderAvailability(SenderPlaceV1 $senderPlaceV1): GetCourierOrderAvailabilityResponseV1;
 
 public function generatePackagesNumbersV1(OpenUMLF $openUMLF, $generationPolicy = PkgNumsGenerationPolicyEnumV1::ALL_OR_NOTHING): PackagesGenerationResponseV1;
  
 public function generateSpedLabelsV1(DPDServicesParamsV1 $DPDServicesParamsV1, $outputDocFormatV1 = OutputDocFormatDSPEnumV1::PDF, $outputDocPageFormatV1 = OutputDocPageFormatDSPEnumV1::A4): PackagesGenerationResponseV1;
 
 public function generateProtocolV1(DPDServicesParamsV1 $DPDServicesParamsV1, $outputDocFormatV1 = OutputDocFormatDSPEnumV1::PDF, $outputDocPageFormatV1 = OutputDocPageFormatDSPEnumV1::A4): PackagesGenerationResponseV1;
 
 public function packagesPickupCallV1(DpdPickupCallParamsV1 $pickupCallParams): PackagesPickupCallResponseV1;
 
 public function packagesPickupCallV2(DpdPickupCallParamsV2 $pickupCallParams): PackagesPickupCallResponseV2;
 
 public function packagesPickupCallV3(DpdPickupCallParamsV3 $pickupCallParams): PackagesPickupCallResponseV3;
 
 public function importDeliveryBusinessEvent(DPDParcelBusinessEventV1 $businessEventV1): ImportDeliveryBusinessEventResponseV1;
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

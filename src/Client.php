<?php
/**
 * File Client.php
 * Created at: 2017-09-06 00:11
 *
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */

namespace Webit\DPDClient;

use Webit\DPDClient\Common\AuthDataV1;
use Webit\DPDClient\Common\OutputDocFormatDSPEnumV1;
use Webit\DPDClient\Common\OutputDocPageFormatDSPEnumV1;
use Webit\DPDClient\DocumentGeneration\GenerateProtocolV1;
use Webit\DPDClient\DocumentGeneration\GenerateSpedLabelsV1;
use Webit\DPDClient\DPDParcelBusinessEvent\DPDParcelBusinessEventV1;
use Webit\DPDClient\DPDPickupCallParams\DpdPickupCallParamsV1;
use Webit\DPDClient\DPDPickupCallParams\DpdPickupCallParamsV2;
use Webit\DPDClient\DPDPickupCallParams\DpdPickupCallParamsV3;
use Webit\DPDClient\DPDServicesParams\DPDServicesParamsV1;
use Webit\DPDClient\ImportDeliveryBusinessEvent\ImportDeliveryBusinessEvent as ImportDeliveryBusinessEventApi;
use Webit\DPDClient\PackagesGeneration\GeneratePackagesNumbersV1;
use Webit\DPDClient\PackagesGeneration\OpenUMLF\OpenUMLF;
use Webit\DPDClient\PackagesGeneration\PkgNumsGenerationPolicyEnumV1;
use Webit\DPDClient\PackagesPickupCall\PackagesPickupCallV1;
use Webit\DPDClient\PackagesPickupCall\PackagesPickupCallV2;
use Webit\DPDClient\PackagesPickupCall\PackagesPickupCallV3;
use Webit\DPDClient\PostalCode\FindPostalCodeV1;
use Webit\DPDClient\PostalCode\GetCourierOrderAvailabilityV1;
use Webit\DPDClient\PostalCode\PostalCodeV1;
use Webit\DPDClient\PostalCode\SenderPlaceV1;

class Client
{
    /**
     * @var FindPostalCodeV1
     */
    private $findPostalCodeV1;

    /**
     * @var GetCourierOrderAvailabilityV1
     */
    private $getCourierOrderAvailability;

    /**
     * @var GeneratePackagesNumbersV1
     */
    private $generatePackagesNumbersV1;

    /**
     * @var GenerateSpedLabelsV1
     */
    private $generateSpedLabelsV1;

    /**
     * @var GenerateProtocolV1
     */
    private $generateProtocolV1;

    /**
     * @var PackagesPickupCallV1
     */
    private $packagesPickupCallV1;

    /**
     * @var PackagesPickupCallV2
     */
    private $packagesPickupCallV2;

    /**
     * @var PackagesPickupCallV3
     */
    private $packagesPickupCallV3;

    /**
     * @var ImportDeliveryBusinessEventApi
     */
    private $importDeliveryBusinessEvent;

    /**
     * @var AuthDataV1
     */
    private $authDataV1;

    /**
     * Client constructor.
     * @param FindPostalCodeV1 $findPostalCodeV1
     * @param GetCourierOrderAvailabilityV1 $getCourierOrderAvailability
     * @param GeneratePackagesNumbersV1 $generatePackagesNumbersV1
     * @param GenerateSpedLabelsV1 $generateSpedLabelsV1
     * @param GenerateProtocolV1 $generateProtocolV1
     * @param PackagesPickupCallV1 $packagesPickupCallV1
     * @param PackagesPickupCallV2 $packagesPickupCallV2
     * @param PackagesPickupCallV3 $packagesPickupCallV3
     * @param ImportDeliveryBusinessEventApi $importDeliveryBusinessEvent
     * @param AuthDataV1 $authDataV1
     */
    public function __construct(
        FindPostalCodeV1 $findPostalCodeV1,
        GetCourierOrderAvailabilityV1 $getCourierOrderAvailability,
        GeneratePackagesNumbersV1 $generatePackagesNumbersV1,
        GenerateSpedLabelsV1 $generateSpedLabelsV1,
        GenerateProtocolV1 $generateProtocolV1,
        PackagesPickupCallV1 $packagesPickupCallV1,
        PackagesPickupCallV2 $packagesPickupCallV2,
        PackagesPickupCallV3 $packagesPickupCallV3,
        ImportDeliveryBusinessEventApi $importDeliveryBusinessEvent,
        AuthDataV1 $authDataV1
    ) {
        $this->findPostalCodeV1 = $findPostalCodeV1;
        $this->getCourierOrderAvailability = $getCourierOrderAvailability;
        $this->generatePackagesNumbersV1 = $generatePackagesNumbersV1;
        $this->generateSpedLabelsV1 = $generateSpedLabelsV1;
        $this->generateProtocolV1 = $generateProtocolV1;
        $this->packagesPickupCallV1 = $packagesPickupCallV1;
        $this->packagesPickupCallV2 = $packagesPickupCallV2;
        $this->packagesPickupCallV3 = $packagesPickupCallV3;
        $this->importDeliveryBusinessEvent = $importDeliveryBusinessEvent;
        $this->authDataV1 = $authDataV1;
    }

    /**
     * @param PostalCodeV1 $postalCodeV1
     * @return PostalCode\FindPostalCodeResponseV1
     */
    public function findPostalCodeV1(PostalCodeV1 $postalCodeV1)
    {
        return $this->findPostalCodeV1->__invoke($postalCodeV1, $this->authDataV1);
    }

    /**
     * @param SenderPlaceV1 $senderPlaceV1
     * @return PostalCode\GetCourierOrderAvailabilityResponseV1
     */
    public function getCourierOrderAvailability(SenderPlaceV1 $senderPlaceV1)
    {
        return $this->getCourierOrderAvailability->__invoke($senderPlaceV1, $this->authDataV1);
    }

    /**
     * @param OpenUMLF $openUMLF
     * @param $generationPolicy
     * @return PackagesGeneration\PackagesGenerationResponseV1
     */
    public function generatePackagesNumbersV1(
        OpenUMLF $openUMLF,
        $generationPolicy = PkgNumsGenerationPolicyEnumV1::ALL_OR_NOTHING
    ) {
        return $this->generatePackagesNumbersV1->__invoke($openUMLF, $generationPolicy, $this->authDataV1);
    }

    /**
     * @param DPDServicesParamsV1 $DPDServicesParamsV1
     * @param string $outputDocFormatV1
     * @param string $outputDocPageFormatV1
     * @return DocumentGeneration\DocumentGenerationResponseV1
     */
    public function generateSpedLabelsV1(
        DPDServicesParamsV1 $DPDServicesParamsV1,
        $outputDocFormatV1 = OutputDocFormatDSPEnumV1::PDF,
        $outputDocPageFormatV1 = OutputDocPageFormatDSPEnumV1::A4
    ) {
        return $this->generateSpedLabelsV1->__invoke(
            $DPDServicesParamsV1,
            $outputDocFormatV1,
            $outputDocPageFormatV1,
            $this->authDataV1
        );
    }

    /**
     * @param DPDServicesParamsV1 $DPDServicesParamsV1
     * @param string $outputDocFormatV1
     * @param string $outputDocPageFormatV1
     * @return DocumentGeneration\DocumentGenerationResponseV1
     */
    public function generateProtocolV1(
        DPDServicesParamsV1 $DPDServicesParamsV1,
        $outputDocFormatV1 = OutputDocFormatDSPEnumV1::PDF,
        $outputDocPageFormatV1 = OutputDocPageFormatDSPEnumV1::A4
    ) {
        return $this->generateProtocolV1->__invoke(
            $DPDServicesParamsV1,
            $outputDocFormatV1,
            $outputDocPageFormatV1,
            $this->authDataV1
        );
    }

    /**
     * @param DpdPickupCallParamsV1 $pickupCallParams
     * @return PackagesPickupCall\PackagesPickupCallResponseV1
     */
    public function packagesPickupCallV1(DpdPickupCallParamsV1 $pickupCallParams)
    {
        return $this->packagesPickupCallV1->__invoke($pickupCallParams, $this->authDataV1);
    }

    /**
     * @param DpdPickupCallParamsV2 $pickupCallParams
     * @return PackagesPickupCall\PackagesPickupCallResponseV2
     */
    public function packagesPickupCallV2(DpdPickupCallParamsV2 $pickupCallParams)
    {
        return $this->packagesPickupCallV2->__invoke($pickupCallParams, $this->authDataV1);
    }

    /**
     * @param DpdPickupCallParamsV3 $pickupCallParams
     * @return PackagesPickupCall\PackagesPickupCallResponseV3
     */
    public function packagesPickupCallV3(DpdPickupCallParamsV3 $pickupCallParams)
    {
        return $this->packagesPickupCallV3->__invoke($pickupCallParams, $this->authDataV1);
    }

    /**
     * @param DPDParcelBusinessEventV1 $businessEventV1
     * @return ImportDeliveryBusinessEvent\ImportDeliveryBusinessEventResponseV1
     */
    public function importDeliveryBusinessEvent(DPDParcelBusinessEventV1 $businessEventV1)
    {
        return $this->importDeliveryBusinessEvent->__invoke($businessEventV1, $this->authDataV1);
    }
}

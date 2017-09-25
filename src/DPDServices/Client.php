<?php

namespace Webit\DPDClient\DPDServices;

use Webit\DPDClient\DPDServices\Common\AuthDataV1;
use Webit\DPDClient\DPDServices\DocumentGeneration\GenerateSpedLabelsV2;
use Webit\DPDClient\DPDServices\DocumentGeneration\OutputDocFormatDSPEnumV1;
use Webit\DPDClient\DPDServices\DocumentGeneration\OutputDocPageFormatDSPEnumV1;
use Webit\DPDClient\DPDServices\DocumentGeneration\GenerateProtocolV1;
use Webit\DPDClient\DPDServices\DocumentGeneration\GenerateSpedLabelsV1;
use Webit\DPDClient\DPDServices\DocumentGeneration\OutputLabelTypeEnumV2;
use Webit\DPDClient\DPDServices\DPDParcelBusinessEvent\DPDParcelBusinessEventV1;
use Webit\DPDClient\DPDServices\DPDPickupCallParams\DpdPickupCallParamsV1;
use Webit\DPDClient\DPDServices\DPDPickupCallParams\DpdPickupCallParamsV2;
use Webit\DPDClient\DPDServices\DPDPickupCallParams\DpdPickupCallParamsV3;
use Webit\DPDClient\DPDServices\DPDServicesParams\DPDServicesParamsV1;
use Webit\DPDClient\DPDServices\ImportDeliveryBusinessEvent\ImportDeliveryBusinessEvent as ImportDeliveryBusinessEventApi;
use Webit\DPDClient\DPDServices\PackagesGeneration\GeneratePackagesNumbersV1;
use Webit\DPDClient\DPDServices\PackagesGeneration\GeneratePackagesNumbersV2;
use Webit\DPDClient\DPDServices\PackagesGeneration\GeneratePackagesNumbersV3;
use Webit\DPDClient\DPDServices\PackagesGeneration\OpenUMLF\OpenUMLFV1;
use Webit\DPDClient\DPDServices\PackagesGeneration\OpenUMLF\OpenUMLFV2;
use Webit\DPDClient\DPDServices\PackagesGeneration\PkgNumsGenerationPolicyEnumV1;
use Webit\DPDClient\DPDServices\PackagesPickupCall\PackagesPickupCallV1;
use Webit\DPDClient\DPDServices\PackagesPickupCall\PackagesPickupCallV2;
use Webit\DPDClient\DPDServices\PackagesPickupCall\PackagesPickupCallV3;
use Webit\DPDClient\DPDServices\PostalCode\FindPostalCodeV1;
use Webit\DPDClient\DPDServices\PostalCode\GetCourierOrderAvailabilityV1;
use Webit\DPDClient\DPDServices\PostalCode\PostalCodeV1;
use Webit\DPDClient\DPDServices\PostalCode\SenderPlaceV1;

class Client
{
    /** @var FindPostalCodeV1 */
    private $findPostalCodeV1;

    /** @var GetCourierOrderAvailabilityV1 */
    private $getCourierOrderAvailability;

    /** @var GeneratePackagesNumbersV1 */
    private $generatePackagesNumbersV1;

    /** @var GeneratePackagesNumbersV2 */
    private $generatePackagesNumbersV2;

    /** @var GeneratePackagesNumbersV3 */
    private $generatePackagesNumbersV3;

    /** @var GenerateSpedLabelsV1 */
    private $generateSpedLabelsV1;

    /** @var GenerateSpedLabelsV2 */
    private $generateSpedLabelsV2;

    /** @var GenerateProtocolV1 */
    private $generateProtocolV1;

    /** @var PackagesPickupCallV1 */
    private $packagesPickupCallV1;

    /** @var PackagesPickupCallV2 */
    private $packagesPickupCallV2;

    /** @var PackagesPickupCallV3 */
    private $packagesPickupCallV3;

    /** @var ImportDeliveryBusinessEventApi */
    private $importDeliveryBusinessEvent;

    /** @var AuthDataV1 */
    private $authDataV1;

    /**
     * @param FindPostalCodeV1 $findPostalCodeV1
     * @param GetCourierOrderAvailabilityV1 $getCourierOrderAvailability
     * @param GeneratePackagesNumbersV1 $generatePackagesNumbersV1
     * @param GeneratePackagesNumbersV2 $generatePackagesNumbersV2
     * @param GeneratePackagesNumbersV3 $generatePackagesNumbersV3
     * @param GenerateSpedLabelsV1 $generateSpedLabelsV1
     * @param GenerateSpedLabelsV2 $generateSpedLabelsV2
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
        GeneratePackagesNumbersV2 $generatePackagesNumbersV2,
        GeneratePackagesNumbersV3 $generatePackagesNumbersV3,
        GenerateSpedLabelsV1 $generateSpedLabelsV1,
        GenerateSpedLabelsV2 $generateSpedLabelsV2,
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
        $this->generatePackagesNumbersV2 = $generatePackagesNumbersV2;
        $this->generatePackagesNumbersV3 = $generatePackagesNumbersV3;
        $this->generateSpedLabelsV1 = $generateSpedLabelsV1;
        $this->generateSpedLabelsV2 = $generateSpedLabelsV2;
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
     * @param OpenUMLFV1 $openUMLF
     * @param PkgNumsGenerationPolicyEnumV1 $generationPolicy
     * @return PackagesGeneration\PackagesGenerationResponseV1
     */
    public function generatePackagesNumbersV1(
        OpenUMLFV1 $openUMLF,
        PkgNumsGenerationPolicyEnumV1 $generationPolicy = null
    ) {
        $generationPolicy = $generationPolicy ?: PkgNumsGenerationPolicyEnumV1::allOrNothing();
        return $this->generatePackagesNumbersV1->__invoke($openUMLF, $generationPolicy, $this->authDataV1);
    }

    /**
     * @param OpenUMLFV1 $openUMLF
     * @param PkgNumsGenerationPolicyEnumV1 $generationPolicy
     * @param string $languageCode
     * @return PackagesGeneration\PackagesGenerationResponseV2
     */
    public function generatePackagesNumbersV2(
        OpenUMLFV1 $openUMLF,
        PkgNumsGenerationPolicyEnumV1 $generationPolicy = null,
        $languageCode
    ) {
        $generationPolicy = $generationPolicy ?: PkgNumsGenerationPolicyEnumV1::allOrNothing();
        return $this->generatePackagesNumbersV2->__invoke(
            $openUMLF,
            $generationPolicy,
            $languageCode,
            $this->authDataV1
        );
    }

    /**
     * @param OpenUMLFV2 $openUMLF
     * @param PkgNumsGenerationPolicyEnumV1 $generationPolicy
     * @param string $languageCode
     * @return PackagesGeneration\PackagesGenerationResponseV3
     */
    public function generatePackagesNumbersV3(
        OpenUMLFV2 $openUMLF,
        PkgNumsGenerationPolicyEnumV1 $generationPolicy = null,
        $languageCode
    ) {
        $generationPolicy = $generationPolicy ?: PkgNumsGenerationPolicyEnumV1::allOrNothing();
        return $this->generatePackagesNumbersV3->__invoke(
            $openUMLF,
            $generationPolicy,
            $languageCode,
            $this->authDataV1
        );
    }

    /**
     * @param DPDServicesParamsV1 $DPDServicesParamsV1
     * @param OutputDocFormatDSPEnumV1 $outputDocFormatV1
     * @param OutputDocPageFormatDSPEnumV1 $outputDocPageFormatV1
     * @return DocumentGeneration\DocumentGenerationResponseV1
     */
    public function generateSpedLabelsV1(
        DPDServicesParamsV1 $DPDServicesParamsV1,
        OutputDocFormatDSPEnumV1 $outputDocFormatV1 = null,
        OutputDocPageFormatDSPEnumV1 $outputDocPageFormatV1 = null
    ) {
        return $this->generateSpedLabelsV1->__invoke(
            $DPDServicesParamsV1,
            $outputDocFormatV1 ?: OutputDocFormatDSPEnumV1::pdf(),
            $outputDocPageFormatV1 ?: OutputDocPageFormatDSPEnumV1::a4(),
            $this->authDataV1
        );
    }

    /**
     * @param DPDServicesParamsV1 $DPDServicesParamsV1
     * @param OutputDocFormatDSPEnumV1 $outputDocFormatV1
     * @param OutputDocPageFormatDSPEnumV1 $outputDocPageFormatV1
     * @param OutputLabelTypeEnumV2|null $outputLabelTypeEnumV2
     * @return DocumentGeneration\DocumentGenerationResponseV2
     */
    public function generateSpedLabelsV2(
        DPDServicesParamsV1 $DPDServicesParamsV1,
        OutputDocFormatDSPEnumV1 $outputDocFormatV1 = null,
        OutputDocPageFormatDSPEnumV1 $outputDocPageFormatV1 = null,
        OutputLabelTypeEnumV2 $outputLabelTypeEnumV2 = null
    ) {
        return $this->generateSpedLabelsV2->__invoke(
            $DPDServicesParamsV1,
            $outputDocFormatV1 ?: OutputDocFormatDSPEnumV1::pdf(),
            $outputDocPageFormatV1 ?: OutputDocPageFormatDSPEnumV1::a4(),
            $outputLabelTypeEnumV2,
            $this->authDataV1
        );
    }

    /**
     * @param DPDServicesParamsV1 $DPDServicesParamsV1
     * @param OutputDocFormatDSPEnumV1 $outputDocFormatV1
     * @param OutputDocPageFormatDSPEnumV1 $outputDocPageFormatV1
     * @return DocumentGeneration\DocumentGenerationResponseV1
     */
    public function generateProtocolV1(
        DPDServicesParamsV1 $DPDServicesParamsV1,
        OutputDocFormatDSPEnumV1 $outputDocFormatV1 = null,
        OutputDocPageFormatDSPEnumV1 $outputDocPageFormatV1 = null
    ) {
        return $this->generateProtocolV1->__invoke(
            $DPDServicesParamsV1,
            $outputDocFormatV1 ?: OutputDocFormatDSPEnumV1::pdf(),
            $outputDocPageFormatV1 ?: OutputDocPageFormatDSPEnumV1::a4(),
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

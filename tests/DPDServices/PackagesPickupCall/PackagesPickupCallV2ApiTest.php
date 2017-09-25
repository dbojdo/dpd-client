<?php

namespace Webit\DPDClient\DPDServices\PackagesPickupCall;

use Webit\DPDClient\DPDServices\AbstractApiTest;
use Webit\DPDClient\DPDServices\DPDPickupCallParams\DpdPickupCallParamsV2;
use Webit\DPDClient\DPDServices\DPDPickupCallParams\PickupCallOperationTypeDPPEnumV1;
use Webit\DPDClient\DPDServices\DPDPickupCallParams\PickupCallOrderTypeDPPEnumV1;
use Webit\DPDClient\DPDServices\DPDPickupCallParams\PickupCallSimplifiedDetailsDPPV1;
use Webit\DPDClient\DPDServices\DPDPickupCallParams\PickupCallUpdateModeDPPEnumV1;
use Webit\DPDClient\DPDServices\DPDPickupCallParams\PickupCustomerDPPV1;
use Webit\DPDClient\DPDServices\DPDPickupCallParams\PickupPackagesParamsDPPV1;
use Webit\DPDClient\DPDServices\DPDPickupCallParams\PickupPayerDPPV1;
use Webit\DPDClient\DPDServices\DPDPickupCallParams\PickupSenderDPPV1;

class PackagesPickupCallV2ApiTest extends AbstractApiTest
{
    /** @var PackagesPickupCallV2 */
    private $packagesPickupCall;

    protected function setUp()
    {
        $this->packagesPickupCall = new PackagesPickupCallV2($this->soapExecutor());
    }

    /**
     * @group api
     * @test
     * @param DpdPickupCallParamsV2 $pickupCallParams
     * @param PackagesPickupCallResponseV2 $expectedResult
     * @dataProvider pickupCalls
     */
    public function shouldCallPickup(
        DpdPickupCallParamsV2 $pickupCallParams,
        PackagesPickupCallResponseV2 $expectedResult
    ) {
        $autData = $this->authData();

        $result = $this->packagesPickupCall->__invoke(
            $pickupCallParams,
            $autData
        );

        $this->assertInstanceOf(
            'Webit\DPDClient\DPDServices\PackagesPickupCall\PackagesPickupCallResponseV2',
            $result
        );

        $this->assertEquals(
            $this->simplify($expectedResult),
            $this->simplify($result)
        );

        if ($result->statusInfo()->status() == 'OK') {
            $this->assertNotEmpty($result->orderNumber());
        }
    }

    public function pickupCalls()
    {

        return array(
            'a valid pickup' => array(
                $this->generatePickup(
                    PickupCallOperationTypeDPPEnumV1::insert(),
                    $this->authData()->masterFid(),
                    '30313'
                ),
                new PackagesPickupCallResponseV2(
                    '2017090539',
                    new StatusInfoPCRV2(
                        'OK',
                        array()
                    )
                )
            ),
            'invalid payer fid' => array(
                $this->generatePickup(
                    PickupCallOperationTypeDPPEnumV1::insert(),
                    $this->faker()->numberBetween(0, 10),
                    '30313'
                ),
                new PackagesPickupCallResponseV2(
                    '2017090539',
                    new StatusInfoPCRV2(
                        'DISALLOWED_FID',
                        array(
                            new ErrorDetailsPCRV2(
                                'INCORRECT_VALUE',
                                null,
                                'PickupPayer/PickupNumber;'
                            )
                        )
                    )
                )
            ),
            'invalid sender post code' => array(
                $this->generatePickup(
                    PickupCallOperationTypeDPPEnumV1::insert(),
                    $this->authData()->masterFid(),
                    'xyz'
                ),
                new PackagesPickupCallResponseV2(
                    '2017090539',
                    new StatusInfoPCRV2(
                        'INCORRECT_SENDER_POSTAL_CODE',
                        array(
                            new ErrorDetailsPCRV2(
                                'INCORRECT_VALUE',
                                null,
                                'PickupSender/SenderPostalCode;'
                            )
                        )
                    )
                )
            )
        );
    }

    /**
     * @param PickupCallOperationTypeDPPEnumV1 $operation
     * @param int $payerFid
     * @param string $senderPostalCode
     * @return DpdPickupCallParamsV2
     */
    private function generatePickup(PickupCallOperationTypeDPPEnumV1 $operation, $payerFid, $senderPostalCode)
    {
        return new DpdPickupCallParamsV2(
            $operation,
            PickupCallUpdateModeDPPEnumV1::dontCreateNewIfClosed(),
            null,
            date_create('now + 2 days'),
            '10:00',
            '16:00',
            PickupCallOrderTypeDPPEnumV1::domestic(),
            false,
            new PickupCallSimplifiedDetailsDPPV1(
                new PickupPayerDPPV1(
                    $payerFid,
                    $this->faker()->company
                ),
                new PickupCustomerDPPV1(
                    $this->faker()->company,
                    $this->faker()->name,
                    $this->faker()->phoneNumber
                ),
                new PickupSenderDPPV1(
                    $this->faker()->firstName,
                    $this->faker()->lastName,
                    $this->faker()->address,
                    'Kraków',
                    $senderPostalCode,
                    $this->faker()->phoneNumber
                ),
                new PickupPackagesParamsDPPV1(
                    false,
                    true,
                    false,
                    1,
                    0,
                    0,
                    2,
                    3,
                    30,
                    30,
                    30,
                    0,
                    0,
                    0
                )
            )
        );
    }

    private function simplify(PackagesPickupCallResponseV2 $expectedResult)
    {
        return array(
            'status' => $expectedResult->statusInfo(),
        );
    }
}

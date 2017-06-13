<?php

namespace Webit\DPDClient\DPDServices\Common;

use Webit\DPDClient\DPDServices\AbstractIntegrationTest;

class AuthDataV1NormalisationTest extends AbstractIntegrationTest
{
    /**
     * @test
     */
    public function shouldNormaliseAuthData()
    {
        $authData = new AuthDataV1(
            $login = $this->randomString(),
            $password = $this->randomString(),
            $fid = $this->randomInt()
        );

        $this->assertEquals(
            array(
                'login' => $login,
                'password' => $password,
                'masterFid' => $fid
            ),
            $this->normaliser()->normaliseInput($this->randomString(), $authData)
        );
    }
}

<?php

namespace Webit\DPDClient\Common;

use Webit\DPDClient\AbstractIntegrationTest;

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

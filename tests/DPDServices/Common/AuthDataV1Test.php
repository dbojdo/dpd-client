<?php

namespace Webit\DPDClient\DPDServices\Common;

use Webit\DPDClient\DPDServices\AbstractServicesTest;

class AuthDataV1Test extends AbstractServicesTest
{
    /**
     * @test
     */
    public function shouldKeepLoginPasswordAndMasterFid()
    {
        $authData = new AuthDataV1(
            $login = $this->randomString(),
            $password = $this->randomString(),
            $masterFid = $this->randomPositiveInt()
        );

        $this->assertEquals($login, $authData->login());
        $this->assertEquals($password, $authData->password());
        $this->assertEquals($masterFid, $authData->masterFid());
    }
}

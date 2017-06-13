<?php

namespace Webit\DPDClient\Common;

use Webit\DPDClient\AbstractTest;

class AuthDataV1Test extends AbstractTest
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

<?php

namespace Webit\DPDClient\DPDServices\Common;

use JMS\Serializer\Annotation as JMS;

class AuthDataV1
{
    /**
     * @var string
     * @JMS\SerializedName("login")
     * @JMS\Type("string")
     */
    private $login;

    /**
     * @var string
     * @JMS\SerializedName("password")
     * @JMS\Type("string")
     */
    private $password;

    /**
     * @var int
     * @JMS\SerializedName("masterFid")
     * @JMS\Type("integer")
     */
    private $masterFid;

    /**
     * @param string $login
     * @param string $password
     * @param int $masterFid
     */
    public function __construct($login, $password, $masterFid)
    {
        $this->login = $login;
        $this->password = $password;
        $this->masterFid = (int)$masterFid;
    }

    /**
     * @return string
     */
    public function login()
    {
        return $this->login;
    }

    /**
     * @return string
     */
    public function password()
    {
        return $this->password;
    }

    /**
     * @return int
     */
    public function masterFid()
    {
        return $this->masterFid;
    }
}

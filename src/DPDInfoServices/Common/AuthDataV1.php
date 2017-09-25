<?php

namespace Webit\DPDClient\DPDInfoServices\Common;

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
     * @JMS\SerializedName("channel")
     * @JMS\Type("string")
     */
    private $channel;

    /**
     * @param string $login
     * @param string $password
     * @param string $channel
     */
    public function __construct($login, $password, $channel)
    {
        $this->login = $login;
        $this->password = $password;
        $this->channel = $channel;
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
     * @return string
     */
    public function channel()
    {
        return $this->channel;
    }
}

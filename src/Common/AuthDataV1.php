<?php
/**
 * Created by PhpStorm.
 * User: dbojdo
 * Date: 14/06/2017
 * Time: 11:29
 */

namespace Webit\DPDClient\Common;

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
     * @JMS\Type("int")
     */
    private $masterFid;

    /**
     * AuthDataV1 constructor.
     * @param string $login
     * @param string $password
     * @param int $masterFid
     */
    public function __construct($login, $password, $masterFid)
    {
        $this->login = $login;
        $this->password = $password;
        $this->masterFid = $masterFid;
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

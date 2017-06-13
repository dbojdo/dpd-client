<?php

namespace Webit\DPDClient\PackagesGeneration\OpenUMLF;

final class Receiver extends AddressData
{
    /**
     * @param int $fid
     * @return Receiver
     */
    public static function fromFid($fid)
    {
        return new self(
            null,
            null,
            null,
            null,
            null,
            $fid
        );
    }
}
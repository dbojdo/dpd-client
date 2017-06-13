<?php

namespace Webit\DPDClient\PackagesGeneration\OpenUMLF;

use JMS\Serializer\Annotation as JMS;

class OpenUMLFV2
{
    /**
     * @var PackageV2[]
     * @JMS\SerializedName("packages")
     * @JMS\Type("array<Webit\DPDClient\PackagesGeneration\OpenUMLF\PackageV2>")
     */
    private $packages;

    /**
     * @param PackageV2[] $packages
     */
    public function __construct(array $packages = array())
    {
        $this->packages = $packages;
    }

    /**
     * @return PackageV2[]
     */
    public function packages()
    {
        return $this->packages;
    }

    /**
     * @inheritdoc
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->packages);
    }
}
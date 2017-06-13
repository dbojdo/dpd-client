<?php

namespace Webit\DPDClient\PackagesGeneration\OpenUMLF;

use JMS\Serializer\Annotation as JMS;

class OpenUMLFV1 implements \IteratorAggregate
{
    /**
     * @var PackageV1[]
     * @JMS\SerializedName("packages")
     * @JMS\Type("array<Webit\DPDClient\PackagesGeneration\OpenUMLF\PackageV1>")
     */
    private $packages;

    /**
     * @param PackageV1[] $packages
     */
    public function __construct(array $packages = array())
    {
        $this->packages = $packages;
    }

    /**
     * @return PackageV1[]
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

<?php
/**
 * Created by PhpStorm.
 * User: dbojdo
 * Date: 05/09/2017
 * Time: 13:06
 */

namespace Webit\DPDClient\PackagesGeneration\OpenUMLF;

use JMS\Serializer\Annotation as JMS;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;

class OpenUMLF implements \IteratorAggregate
{
    /**
     * @var Package[]
     * @JMS\SerializedName("packages")
     * @JMS\Type("array<Webit\DPDClient\PackagesGeneration\OpenUMLF\Package>")
     */
    private $packages;

    /**
     * OpenUMLF constructor.
     * @param Package[] $packages
     */
    public function __construct(array $packages = array())
    {
        $this->packages = $packages;
    }

    /**
     * @return Package[]
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

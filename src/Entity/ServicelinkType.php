<?php
/**
 * @author Sebastian Thum <mail@sebastianthum.de>
 * @copyright 2020
 */

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class ServicelinkType
 * @package App\Entity
 * @ORM\Entity()
 * @ORM\Table(name="servicelink_type")
 */
class ServicelinkType
    extends AbstractEntity
{

    /**
     * @var int
     * @ORM\Id()
     * @ORM\Column(name="servicelink_type_id", type="integer", length=10)
     * @ORM\GeneratedValue()
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="servicelink_type_key", type="string", length=32)
     */
    private $key;

    /**
     * @var string
     * @ORM\Column(name="servicelink_type_name", type="string", length=64)
     */
    private $name;

    /**
     * @var Servicelink[]
     * @ORM\OneToMany(targetEntity="Servicelink", mappedBy="type", fetch="LAZY")
     */
    private $servicelinks;

    /**
     * @var \DateTimeInterface
     * @ORM\Column(name="servicelink_type_created", type="datetime")
     */
    protected $created;

    /**
     * @var \DateTimeInterface
     * @ORM\Column(name="servicelink_type_updated", type="datetime")
     */
    protected $updated;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return ServicelinkType
     */
    public function setId(int $id): ServicelinkType
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $key
     * @return ServicelinkType
     */
    public function setKey(string $key): ServicelinkType
    {
        $this->key = $key;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ServicelinkType
     */
    public function setName(string $name): ServicelinkType
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Servicelink[]
     */
    public function getServicelinks(): Collection
    {
        return $this->servicelinks;
    }

    /**
     * @param Servicelink[] $servicelinks
     * @return ServicelinkType
     */
    public function setServicelinks(Collection $servicelinks): ServicelinkType
    {
        $this->servicelinks = $servicelinks;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'servicelink_type_id'      => $this->getId(),
            'servicelink_type_key'     => $this->getKey(),
            'servicelink_type_name'    => $this->getName(),
            'servicelink_type_created' => $this->getCreated()->format('Y-m-d H:i:s'),
            'servicelink_type_updated' => $this->getUpdated()->format('Y-m-d H:i:s')
        ];
    }


}
<?php
/**
 * @author Sebastian Thum <mail@sebastianthum.de>
 * @copyright 2020
 */

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class City
 * @package App\Entity
 * @ORM\Entity()
 * @ORM\Table(name="country")
 */
class Country
    extends AbstractEntity
{

    /**
     * @var int
     * @ORM\Id()
     * @ORM\Column(name="country_id", type="integer", length=10)
     * @ORM\GeneratedValue()
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="country_name", type="string", length=64)
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(name="country_code", type="string", length=2)
     */
    private $code;

    /**
     * @var Group[]
     * @ORM\ManyToMany(targetEntity="Group", inversedBy="countries")
     * @ORM\JoinTable(name="country_group",
     *     joinColumns={@ORM\JoinColumn(name="country_group_country_id", referencedColumnName="country_id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="country_group_group_id", referencedColumnName="group_id")}
     * )
     */
    private $groups;

    /**
     * @var \DateTimeInterface
     * @ORM\Column(name="country_created", type="datetime")
     */
    protected $created;

    /**
     * @var \DateTimeInterface
     * @ORM\Column(name="country_updated", type="datetime")
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
     * @return Country
     */
    public function setId(int $id): Country
    {
        $this->id = $id;

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
     * @return Country
     */
    public function setName(string $name): Country
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return Country
     */
    public function setCode(string $code): Country
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return Group[]
     */
    public function getGroups(): Collection
    {
        return $this->groups;
    }

    /**
     * @param Group[] $groups
     * @return Country
     */
    public function setGroups(Collection $groups): Country
    {
        $this->groups = $groups;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'country_id'      => $this->getId(),
            'country_name'    => $this->getName(),
            'country_code'    => $this->getCode(),
            'country_created' => $this->getCreated()->format('Y-m-d H:i:s'),
            'country_updated' => $this->getUpdated()->format('Y-m-d H:i:s')
        ];
    }




}
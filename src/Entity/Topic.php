<?php
/**
 * @author Sebastian Thum <mail@sebastianthum.de>
 * @copyright 2020
 */

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Topic
 * @package App\Entity
 * @ORM\Entity()
 * @ORM\Table(name="topic")
 */
class Topic
    extends AbstractEntity
{

    /**
     * @var int
     * @ORM\Id()
     * @ORM\Column(name="topic_id", type="integer", length=10)
     * @ORM\GeneratedValue()
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="topic_name", type="string", length=32)
     */
    private $name;

    /**
     * @var Group[]
     * @ORM\ManyToMany(targetEntity="Group", mappedBy="topics")
     */
    private $groups;

    /**
     * @var \DateTimeInterface
     * @ORM\Column(name="topic_created", type="datetime")
     */
    protected $created;

    /**
     * @var \DateTimeInterface
     * @ORM\Column(name="topic_updated", type="datetime")
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
     * @return Topic
     */
    public function setId(int $id): Topic
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
     * @return Topic
     */
    public function setName(string $name): Topic
    {
        $this->name = $name;

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
     * @return Topic
     */
    public function setGroups(Collection $groups): Topic
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
            'topic_id'      => $this->getId(),
            'topic_name'    => $this->getName(),
            'topic_created' => $this->getCreated()->format('Y-m-d H:i:s'),
            'topic_updated' => $this->getUpdated()->format('Y-m-d H:i:s')
        ];
    }


}
<?php
/**
 * @author Sebastian Thum <mail@sebastianthum.de>
 * @copyright 2020
 */

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Group
 * @package App\Entity
 * @ORM\Entity()`
 * @ORM\Table(name="`group`")
 */
class Group
    extends AbstractEntity
{

    /**
     * @var int
     * @ORM\Id()
     * @ORM\Column(name="group_id", type="integer", length=10)
     * @ORM\GeneratedValue()
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="group_name", type="text")
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(name="group_description", type="text")
     */
    private $description;

    /**
     * @var Country[]
     * @ORM\ManyToMany(targetEntity="Country", mappedBy="groups")
     */
    private $countries;

    /**
     * @var Servicelink[]
     * @ORM\OneToMany(targetEntity="Servicelink", mappedBy="group", fetch="LAZY", cascade={"persist", "refresh"})
     */
    private $servicelinks;

    /**
     * @var Topic[]
     * @ORM\ManyToMany(targetEntity="Topic", inversedBy="groups")
     * @ORM\JoinTable(name="group_topic",
     *     joinColumns={@ORM\JoinColumn(name="group_topic_group_id", referencedColumnName="group_id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="group_topic_topic_id", referencedColumnName="topic_id")}
     * )
     */
    private $topics;

    /**
     * @var \DateTimeInterface
     * @ORM\Column(name="group_created", type="datetime")
     */
    protected $created;

    /**
     * @var \DateTimeInterface
     * @ORM\Column(name="group_updated", type="datetime")
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
     * @return Group
     */
    public function setId(int $id): Group
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
     * @return Group
     */
    public function setName(string $name): Group
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Group
     */
    public function setDescription(string $description): Group
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Country[]
     */
    public function getCountries(): Collection
    {
        return $this->countries;
    }

    /**
     * @param Country[] $countries
     * @return Group
     */
    public function setCountries(Collection $countries): Group
    {
        $this->countries = $countries;

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
     * @return Group
     */
    public function setServicelinks(Collection $servicelinks): Group
    {
        $this->servicelinks = $servicelinks;

        return $this;
    }

    /**
     * @return Topic[]
     */
    public function getTopics(): Collection
    {
        return $this->topics;
    }

    /**
     * @param Topic[] $topics
     * @return Group
     */
    public function setTopics(Collection $topics): Group
    {
        $this->topics = $topics;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $topics = [];
        foreach ($this->getTopics() as $topic) {
            $topics[] = $topic->toArray();
        }

        $servicelinks = [];
        foreach ($this->getServicelinks() as $servicelink) {
            $servicelinks[] = $servicelink->toArray();
        }

        $countries = [];
        foreach ($this->getCountries() as $country) {
            $countries[] = $country->toArray();
        }

        $result[] = [
            'group_id'           => $this->getId(),
            'group_name'         => $this->getName(),
            'group_description'  => $this->getDescription(),
            'group_topics'       => $topics,
            'group_servicelinks' => $servicelinks,
            'group_countries'    => $countries,
            'group_created'      => $this->getCreated()->format('Y-m-d H:i:s'),
            'group_updated'      => $this->getUpdated()->format('Y-m-d H:i:s')
        ];

        return $result;
    }


}
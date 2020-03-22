<?php
/**
 * @author Sebastian Thum <mail@sebastianthum.de>
 * @copyright 2020
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class ServiceLink
 * @package App\Entity
 * @ORM\Entity()
 * @ORM\Table(name="servicelink")
 */
class Servicelink
    extends AbstractEntity
{

    /**
     * @var int
     * @ORM\Id()
     * @ORM\Column(name="servicelink_id", type="integer", length=10)
     * @ORM\GeneratedValue()
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="servicelink_text", type="text")
     */
    private $text;

    /**
     * @var string
     * @ORM\Column(name="servicelink_url", type="text")
     */
    private $url;

    /**
     * @var ServicelinkType
     * @ORM\ManyToOne(targetEntity="ServicelinkType", inversedBy="servicelinks", fetch="LAZY")
     * @ORM\JoinColumn(name="servicelink_servicelink_type_id", referencedColumnName="servicelink_type_id")
     */
    private $type;

    /**
     * @var Group
     * @ORM\ManyToOne(targetEntity="Group", inversedBy="servicelinks", fetch="LAZY")
     * @ORM\JoinColumn(name="servicelink_group_id", referencedColumnName="group_id")
     */
    private $group;

    /**
     * @var \DateTimeInterface
     * @ORM\Column(name="servicelink_created", type="datetime")
     */
    protected $created;

    /**
     * @var \DateTimeInterface
     * @ORM\Column(name="servicelink_updated", type="datetime")
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
     * @return Servicelink
     */
    public function setId(int $id): Servicelink
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return Servicelink
     */
    public function setText(string $text): Servicelink
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Servicelink
     */
    public function setUrl(string $url): Servicelink
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return ServicelinkType
     */
    public function getType(): ServicelinkType
    {
        return $this->type;
    }

    /**
     * @param ServicelinkType $type
     * @return Servicelink
     */
    public function setType(ServicelinkType $type): Servicelink
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Group
     */
    public function getGroup(): Group
    {
        return $this->group;
    }

    /**
     * @param Group $group
     * @return Servicelink
     */
    public function setGroup(Group $group): Servicelink
    {
        $this->group = $group;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'servicelink_id'      => $this->getId(),
            'servicelink_text'    => $this->getText(),
            'servicelink_url'     => $this->getUrl(),
            'servicelink_type'    => $this->getType()->toArray(),
            'servicelink_created' => $this->getCreated()->format('Y-m-d H:i:s'),
            'servicelink_updated' => $this->getUpdated()->format('Y-m-d H:i:s')
        ];
    }


}
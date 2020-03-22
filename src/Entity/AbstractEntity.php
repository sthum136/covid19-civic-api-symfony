<?php
/**
 * @author Sebastian Thum <mail@sebastianthum.de>
 * @copyright 2020
 */

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class EntityAbstract
 * @package App\Entity
 * @ORM\MappedSuperclass
 * @ORM\HasLifecycleCallbacks
 */
abstract class AbstractEntity
{
    /**
     * @var DateTime
     * @ORM\Column(name="created", type="datetime")
     */
    protected $created;

    /**
     * @var DateTime
     * @ORM\Column(name="updated", type="datetime")
     */
    protected $updated;

    /**
     * @return DateTime
     */
    public function getCreated(): DateTime
    {
        return $this->created;
    }

    /**
     * @param DateTime $created
     * @return AbstractEntity
     */
    public function setCreated(DateTime $created): AbstractEntity
    {
        $this->created = $created;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getUpdated(): DateTime
    {
        return $this->updated;
    }

    /**
     * @param DateTime $updated
     * @return AbstractEntity
     */
    public function setUpdated($updated): AbstractEntity
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * @ORM\PrePersist()
     */
    public function prePersist()
    {
        $now = new DateTime();
        $this->setCreated($now);
        $this->setUpdated($now);

        $this->setIdhash(md5(random_bytes(32) . microtime() . get_called_class()));
    }

    /**
     * @ORM\PreUpdate()
     */
    public function preUpdate()
    {
        $this->setUpdated(new DateTime());
    }
}
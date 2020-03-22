<?php
/**
 * @author Sebastian Thum <mail@sebastianthum.de>
 * @copyright 2020
 */

namespace App\Service;

use App\Entity\Country;
use App\Entity\Group;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class GroupService
 * @package App\Service
 */
class GroupService
    extends AbstractService
{

    /**
     * CountryService constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em);

        $this->repository = $em->getRepository(Group::class);
    }

    /**
     * Find groups by country
     * @return array
     */
    public function findByCountry(Country $country): array
    {
        /** @var Group[] $groups */
        $groups = $country->getGroups();

        $result = [];
        foreach ($groups as $group) {
            $result[] = $group->toArray();
        }

        return $result;
    }

    /**
     * @param int $groupId
     * @return array
     */
    public function findById(int $groupId): array
    {
        $group = $this->find($groupId);

        if (!$group instanceof Group) {

            return [];
        }
    }

}
<?php
/**
 * @author Sebastian Thum <mail@sebastianthum.de>
 * @copyright 2020
 */

namespace App\Service;

use App\Entity\Country;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class CountryService
 * @package App\Service
 */
class CountryService
    extends AbstractService
{

    /**
     * CountryService constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em);

        $this->repository = $em->getRepository(Country::class);
    }

    /**
     * Fetch all countries
     * @return array
     */
    public function getAllCountries(): array
    {
        /** @var Country[] $countries */
        $countries = $this->findAll();

        $result = [];
        foreach ($countries as $country) {
            $result[] = [
                'country_id' => $country->getId(),
                'country_name' => $country->getName(),
                'country_code' => $country->getCode(),
                'country_created' => $country->getCreated()->format('Y-m-d H:i:s'),
                'country_updated' => $country->getUpdated()->format('Y-m-d H:i:s')
            ];
        }

        return $result;
    }

}
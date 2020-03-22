<?php
/**
 * @author Sebastian Thum <mail@sebastianthum.de>
 * @copyright 2020
 */

namespace App\Controller\Api;

use App\Entity\Country;
use App\Service\CountryService;
use App\Service\GroupService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class GroupController
 * @package App\Controller\Api
 */
class GroupController
    extends AbstractController
{

    /**
     * @Route("/api/group/get-by-country/{countryId}", methods={"GET"})
     * @param $countryId
     * @param CountryService $countryService
     * @param GroupService $groupService
     * @return JsonResponse
     */
    public function getByCountryAction(int $countryId, CountryService $countryService, GroupService $groupService)
    {
        $country = $countryService->find($countryId);
        if (!$country instanceof Country) {

            return new JsonResponse('Error: No country found for given id', 400);
        }

        $groups = $groupService->findByCountry($country);

        return new JsonResponse($groups);
    }

    /**
     * @param int $groupId
     * @param GroupService $groupService
     */
    public function getAction(int $groupId, GroupService $groupService)
    {
        $group = $groupService->findById($groupId);

        return new JsonResponse($group);
    }
}
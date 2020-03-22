<?php
/**
 * @author Sebastian Thum <mail@sebastianthum.de>
 * @copyright 2020
 */

namespace App\Controller\Api;

use App\Service\CountryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CountryController
 * @package App\Controller\Api
 */
class CountryController
    extends AbstractController
{

    /**
     * @Route("/api/country", methods={"GET"})
     */
    public function getAction(CountryService $countryService)
    {
        $countries = $countryService->getAllCountries();

        return new JsonResponse($countries, 200);
    }
}
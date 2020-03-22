<?php
/**
 * @author Sebastian Thum <mail@sebastianthum.de>
 * @copyright 2020
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController
    extends AbstractController
{

    /**
     * @Route("/")
     */
    public function indexAction(Request $request)
    {
        return new Response('
            <head></head>
            <body>
                <h1>COVID19-Civictech API V0.1</h1>
            </body>
        ', 200);
    }

}
<?php

namespace AppBundle\Controller\Api;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class HelloController
{
    /**
     * @Route("/api/hello", name="hello", defaults={"_format": "json"})
     */
    public function getAction()
    {
        return new JsonResponse("Hello, Happy Api!");
    }
}

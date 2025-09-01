<?php

namespace App;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\HttpUtils;
use Twig\Environment;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    #[Route('/test')]
    public function testAction(Request $request, HttpUtils $httpUtils, Environment $twig): Response
    {
        return new Response($twig->render('debug.html.twig', [
            'request' => $request,
            'security_request' => $httpUtils->createRequest($request, '/'),
        ]));
    }

    #[Route('/admin', name: 'admin')]
    public function adminAction(Request $request): Response
    {
        return new Response('Protected page');
    }

    #[Route('/login', name: 'login')]
    public function loginAction(Request $request): Response
    {
        return new Response('OK');
    }
}

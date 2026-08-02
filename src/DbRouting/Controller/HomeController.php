<?php

declare(strict_types=1);

namespace IdealCms\DbRouting\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    /**
     * Контроллер главной страницы.
     *
     * Почти всегда будет переопределён, но на начальной стадии внедрения CMS может использоваться стандартный.
     */
    #[Route('/', priority: -1)]
    public function index(): Response
    {
        return $this->render('@IdealCms/home.html.twig');
    }
}

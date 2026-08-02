<?php

declare(strict_types=1);

namespace IdealCms\Structure\Part\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class PartController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('@IdealCms/structure/part/index.html.twig');
    }
}

<?php

declare(strict_types=1);

namespace IdealCms\DbRouting\Controller;

use IdealCms\DbRouting\Service\DbRouter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DbRouterController extends AbstractController
{
    /**
     * Роутинг по базе данных.
     *
     * Этот маршрут должен быть предпоследним в списке.
     * Он перехватывает всё, что не подошло другим контроллерам.
     * Последним может быть маршрут для легаси кода.
     */
    #[Route('/{path}', name: 'idealcms_db_route', requirements: ['path' => '.*'], priority: -99)]
    public function index(string $path, Request $request, DbRouter $dbRouting): Response
    {
        $pathElement = $dbRouting->execute($request, $path);

        return $this->forward($pathElement->controllerClass . '::' . $pathElement->action);
    }
}

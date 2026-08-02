<?php

declare(strict_types=1);

namespace IdealCms\DbRouting\Service;

use IdealCms\DbRouting\Dto\PathElementDto;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DbRouter
{
    public function __construct(
        protected StartRouterInterface $startRouter
    ) {}

    public function execute(Request $request, string $urlPath): PathElementDto
    {
        $path = $this->startRouter->routeByUrl(
            $request,
            explode('/', trim($urlPath, '/')),
        );

        if (count($path) === 0) {
            throw new NotFoundHttpException();
        }

        return $path->last();
    }
}
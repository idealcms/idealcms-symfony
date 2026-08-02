<?php

declare(strict_types=1);

namespace IdealCms\DbRouting\Service;

use Doctrine\Common\Collections\ArrayCollection;
use IdealCms\DbRouting\Dto\PathElementDto;
use Symfony\Component\HttpFoundation\Request;

/**
 * Интерфейс для обозначения стартовой структуры, с которой начинается роутинг по БД.
 */
interface StartRouterInterface
{
    /**
     * @param Request $request
     * @param string[] $url
     *
     * @return ArrayCollection<PathElementDto>
     */
    public function routeByUrl(Request $request, array $url): ArrayCollection;
}

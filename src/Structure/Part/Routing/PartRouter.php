<?php

declare(strict_types=1);

namespace IdealCms\Structure\Part\Routing;

use App\Entity\Part;
use Doctrine\Common\Collections\ArrayCollection;
use IdealCms\DbRouting\Dto\PathElementDto;
use IdealCms\DbRouting\Service\ConvertEntityName;
use IdealCms\DbRouting\Service\StartRouterInterface;
use IdealCms\Structure\Part\Repository\PartRepository;
use Symfony\Component\HttpFoundation\Request;

class PartRouter implements StartRouterInterface
{
    public function __construct(
        protected PartRepository $partRepository,
        protected ConvertEntityName $convertEntityName,
    ) {}

    public function routeByUrl(Request $request, array $url): ArrayCollection
    {
        /** @var Part[] $parts */
        $parts = $this->partRepository->findBy(['url' => $url]);

        // todo взять из старой cms переход вглубь БД

        if (count($parts) < count($url)) {
            return new ArrayCollection();
        }

        $elements = new ArrayCollection();
        foreach ($parts as $part) {
            if ($part->getStructure() === null) {
                // Внутри отображаемой страницы находятся те же сущности.
                $element = new PathElementDto(
                    $part,
                    $part->getController(),
                    'index',
                );
            } else {
                // Внутри отображаемой страницы находится другая сущность.
                // Поэтому будет вызван контроллер другой сущности, но в него будет передана текущая сущность.
                // Это нужно, например, чтобы отобразить список новостей внутри текстового раздела.
                $next = $this->convertEntityName->toClassObject($part->getStructure());
                $element = new PathElementDto(
                    $part,
                    $next->getController(),
                    'index',
                );

            }
            $elements->add($element);
        }

        // todo Разобрали все $parts, но ещё остались url
        $part->getRouter();


        return $elements;
    }
}
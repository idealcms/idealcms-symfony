<?php

declare(strict_types=1);

namespace IdealCms\DbRouting\Service;

use App\Entity\Part;
use IdealCms\Structure\CmsEntity;

/**
 * Конвертация из/в краткого представления имени класса для БД.
 *
 * todo Реализовать преобразование к краткому названию сущности и из него в класс.
 */
class ConvertEntityName
{
    public function toClassName(string $structure): string
    {
        return Part::class;
    }

    public function toClassObject(string $structure): CmsEntity
    {
        return new Part();
    }

    public function fromClassName(string $className): string
    {
        return 'Ideal_Part';
    }
}

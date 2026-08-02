<?php

declare(strict_types=1);

namespace IdealCms\DbRouting\Dto;

class PathElementDto
{
    public function __construct(
        public object $entity,
        public string $controllerClass,
        public string $action,
    ) {}
}
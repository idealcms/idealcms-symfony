<?php

declare(strict_types=1);

namespace IdealCms\Structure;

interface CmsEntity
{
    public function getController(): string;
}
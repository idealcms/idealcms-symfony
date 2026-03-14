<?php

declare(strict_types=1);

namespace IdealCms\Structure\Part\Entity;

use Doctrine\ORM\Mapping as ORM;
use IdealCms\Structure\CmsEntity;
use IdealCms\Structure\Part\Controller\PartController;
use IdealCms\Structure\Part\Routing\PartRouter;

#[ORM\MappedSuperclass]
class PartAbstract implements CmsEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    protected ?int $id = null;

    #[ORM\Column(length: 15)]
    protected ?string $prevStructure = null;

    #[ORM\Column(length: 255)]
    protected ?string $name = null;

    #[ORM\Column(length: 255)]
    protected string $url;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrevStructure(): ?string
    {
        return $this->prevStructure;
    }

    public function setPrevStructure(string $prevStructure): static
    {
        $this->prevStructure = $prevStructure;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): static
    {
        $this->url = $url;

        return $this;
    }

    public function getController(): string
    {
        return PartController::class;
    }

    public function getStructure(): ?string
    {
        return null;
    }

    public function getRouter(): string
    {
        return PartRouter::class;
    }
}

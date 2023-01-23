<?php

namespace Core\Ecommerce\Users\Application\FindCatalog;

class FindCatalogCommand
{
    private array $catalogs;
    private $filter;

    public function __construct(array $filter = null)
    {
        $this->filter = $filter;
    }

    public function catalogs(): array
    {
        return $this->catalogs;
    }

    public function filter(): array|null
    {
        return $this->filter;
    }

    public function setCatalogs(array $value): void
    {
        $this->catalogs = $value;
    }
}

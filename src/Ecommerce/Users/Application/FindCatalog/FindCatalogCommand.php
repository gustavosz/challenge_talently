<?php

namespace Core\Ecommerce\Users\Application\FindCatalog;

class FindCatalogCommand
{
    private array $catalogs;

    public function catalogs(): array
    {
        return $this->catalogs;
    }

    public function setCatalogs(array $value): void
    {
        $this->catalogs = $value;
    }
}

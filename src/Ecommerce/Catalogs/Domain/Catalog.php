<?php

namespace Core\Ecommerce\Catalogs\Domain;

use Core\Ecommerce\Shared\Domain\SupplierId;

final class Catalog
{
    private CatalogId $id;
    private CatalogName $name;
    private CatalogPrice $price;
    private SupplierId $supplierId;

    public function __construct(CatalogId $id, CatalogName $name, CatalogPrice $price, SupplierId $supplierId)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->supplierId = $supplierId;
    }

    public function id(): CatalogId
    {
        return $this->id;
    }

    public function name(): CatalogName
    {
        return $this->name;
    }

    public function price(): CatalogPrice
    {
        return $this->price;
    }

    public function supplierId(): SupplierId
    {
        return $this->supplierId;
    }
}

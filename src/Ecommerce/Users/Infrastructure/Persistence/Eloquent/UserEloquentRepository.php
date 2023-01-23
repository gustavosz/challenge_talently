<?php

namespace Core\Ecommerce\Users\Infrastructure\Persistence\Eloquent;

use Core\Ecommerce\Catalogs\Infrastructure\Persistence\Eloquent\CatalogEloquentModel;
use Core\Ecommerce\Users\Domain\UserRepository;

class UserEloquentRepository implements UserRepository
{
    public function listCatalogs(): array
    {
        $user = auth()->user();

        $supplierDefault = $user->suppliers()->wherePivot('is_default', true)->first();

        $modelCatalogs = CatalogEloquentModel::query()
            ->select(['id', 'name', 'price'])
            ->whereHas('supplier', function ($query) use ($supplierDefault) {
                $query->where('supplier_id', $supplierDefault->id);
            })
            ->orWhereNull('supplier_id')
            ->get();

        return $modelCatalogs->toArray();
    }
}

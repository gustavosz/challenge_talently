<?php

namespace Core\Ecommerce\Users\Infrastructure\Persistence\Eloquent;

use Core\Ecommerce\Catalogs\Infrastructure\Persistence\Eloquent\CatalogEloquentModel;
use Core\Ecommerce\Users\Domain\UserRepository;

class UserEloquentRepository implements UserRepository
{
    public function listCatalogs($filter): array
    {
        $user = auth()->user();

        $supplierDefault = $user->suppliers()->wherePivot('is_default', true)->first();

        $modelCatalogs = CatalogEloquentModel::query()
            ->select(['id', 'name', 'price'])
            ->where(function ($query) use ($supplierDefault) {
                $query->whereHas('supplier', function ($query) use ($supplierDefault) {
                    $query->where('supplier_id', $supplierDefault->id);
                })
                ->orWhereNull('supplier_id');
            })
            ->when($filter && isset($filter['name']), function ($query) use ($filter) {
                $query->where('name', 'like', '%' . $filter['name'] . '%');
            })
            ->get();

        return $modelCatalogs->toArray();
    }
}

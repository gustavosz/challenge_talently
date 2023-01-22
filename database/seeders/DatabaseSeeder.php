<?php

namespace Database\Seeders;

use Core\Ecommerce\Catalogs\Infrastructure\Persistence\Eloquent\CatalogEloquentModel;
use Core\Ecommerce\Suppliers\Infrastructure\Persistence\Eloquent\SupplierEloquentModel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Supplier default
        SupplierEloquentModel::factory()
            ->state([
                'id' => '01cb035b-1a4d-3726-bdbe-fc840dd6881b'
            ])
            ->has(CatalogEloquentModel::factory()->count(1), 'catalogs')
            ->create();

        // Supplier with catalog
        SupplierEloquentModel::factory()
            ->has(CatalogEloquentModel::factory()->count(2), 'catalogs')
            ->count(3)
            ->create();

        // Supplier without catalog
        SupplierEloquentModel::factory()
            ->count(3)
            ->create();
    }
}

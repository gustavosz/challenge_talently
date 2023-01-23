<?php

namespace Tests\Feature;

use Core\Backoffice\Auth\Infrastructure\Persistence\Eloquent\AuthUserEloquentModel;
use Core\Ecommerce\Catalogs\Infrastructure\Persistence\Eloquent\CatalogEloquentModel;
use Core\Ecommerce\Suppliers\Infrastructure\Persistence\Eloquent\SupplierEloquentModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Concerns\AttachJwtToken;
use Tests\TestCase;

class ListCatalogTest extends TestCase
{
    use RefreshDatabase;
    use AttachJwtToken;

    public function test_list_catalog()
    {
        // Supplier default
        $supplierDefault = SupplierEloquentModel::factory()
            ->state([
                'id' => '01cb035b-1a4d-3726-bdbe-fc840dd6881b'
            ])
            ->has(CatalogEloquentModel::factory()->count(1), 'catalogs')
            ->create();

        $user = AuthUserEloquentModel::factory()
            ->hasAttached(
                $supplierDefault,
                ['is_default' => true],
                'suppliers'
            )
            ->create();

        $this->loginAs($user);

        // Supplier with catalog
        SupplierEloquentModel::factory()
            ->has(CatalogEloquentModel::factory()->count(2), 'catalogs')
            ->count(3)
            ->create();

        // Catalog without supplier
        CatalogEloquentModel::factory()->count(2)->create();


        $response = $this->getJson("users/{$user->id}/catalogs");

        $response->assertStatus(200)
            ->assertJsonCount(3, 'data')
            ->assertJsonStructure([
                'data' => [
                    [
                        'id',
                        'name',
                        'price'
                    ]
                ]
            ]);
    }

    public function test_list_catalog_with_filter()
    {
        // Supplier default
        $supplierDefault = SupplierEloquentModel::factory()
            ->state([
                'id' => '01cb035b-1a4d-3726-bdbe-fc840dd6881b'
            ])
            ->has(CatalogEloquentModel::factory()->count(1), 'catalogs')
            ->create();

        $user = AuthUserEloquentModel::factory()
            ->hasAttached(
                $supplierDefault,
                ['is_default' => true],
                'suppliers'
            )
            ->create();

        $this->loginAs($user);

        // Supplier with catalog
        SupplierEloquentModel::factory()
            ->has(CatalogEloquentModel::factory()->count(2), 'catalogs')
            ->count(3)
            ->create();

        // Catalog without supplier
        CatalogEloquentModel::factory()
            ->state([
                'name' => 'Catalog Test Talently'
            ])
            ->count(1)
            ->create();


        $response = $this->getJson("users/{$user->id}/catalogs?filter[name]=Talently");

        $response->assertStatus(200)
            ->assertJsonCount(1, 'data')
            ->assertJsonStructure([
                'data' => [
                    [
                        'id',
                        'name',
                        'price'
                    ]
                ]
            ]);
    }
}

<?php

namespace Tests\Feature;

use Core\Backoffice\Auth\Infrastructure\Persistence\Eloquent\AuthUserEloquentModel;
use Core\Ecommerce\Catalogs\Infrastructure\Persistence\Eloquent\CatalogEloquentModel;
use Core\Ecommerce\Suppliers\Infrastructure\Persistence\Eloquent\SupplierEloquentModel;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthUserTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_without_previous_user_created(): void
    {
        // Supplier default
        SupplierEloquentModel::factory()
            ->state([
                'id' => '01cb035b-1a4d-3726-bdbe-fc840dd6881b'
            ])
            ->has(CatalogEloquentModel::factory()->count(1), 'catalogs')
            ->create();

        $response = $this->postJson('/login', [
            'email' => 'test@test.com',
            'password' => 'password'
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure(['token']);
    }

    public function test_login_with_previous_user_created(): void
    {
        $user = AuthUserEloquentModel::factory()
            ->state([
                'email' => 'test@test.com',
                'password' => bcrypt('test')
            ])
            ->create();

        $response = $this->postJson('/login', [
            'email' => $user->email,
            'password' => 'test'
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure(['token']);
    }
}

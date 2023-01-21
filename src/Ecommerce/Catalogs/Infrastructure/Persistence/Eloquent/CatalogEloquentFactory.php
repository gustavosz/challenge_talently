<?php

namespace Core\Ecommerce\Catalogs\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Factories\Factory;

class CatalogEloquentFactory extends Factory
{
    protected $model = CatalogEloquentModel::class;

    public function definition()
    {
        return [
            'id' => $this->faker->uuid,
            'name' => $this->faker->name,
            'price' => $this->faker->randomFloat(2, 0, 1000),
        ];
    }
}

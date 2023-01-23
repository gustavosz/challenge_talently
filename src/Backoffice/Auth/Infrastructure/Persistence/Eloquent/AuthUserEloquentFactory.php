<?php

namespace Core\Backoffice\Auth\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Factories\Factory;

class AuthUserEloquentFactory extends Factory
{
    protected $model = AuthUserEloquentModel::class;

    public function definition()
    {
        return [
            'id' => $this->faker->uuid,
            'email' => $this->faker->email,
            'password' => $this->faker->password,
        ];
    }
}

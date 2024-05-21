<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Faker\Generator as Faker;
use App\Models\Governorate;

class GovernorateFactory extends Factory
{
    protected $model = Governorate::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->city,

        ];
    }
}

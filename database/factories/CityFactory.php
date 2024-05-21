<?php

namespace Database\Factories;

use Faker\Generator as Faker;
use App\Models\City;

use Illuminate\Database\Eloquent\Factories\Factory;

class CityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = City::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->city,
            'governorate_id' => $this->faker->numberBetween(1, 10),
            
        ];
    }
}

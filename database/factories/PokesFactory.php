<?php

namespace Database\Factories;

use App\Models\Pokes;
use Illuminate\Database\Eloquent\Factories\Factory;

class PokesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pokes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'url' => $this->faker->url,
        ];
    }
}

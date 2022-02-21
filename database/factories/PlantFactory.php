<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PlantFactory extends Factory
{
    protected $fillable = [
        'name', 
        'cientificName', 
        'family', 
        'description',
      ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'cientificName' => $this->faker->unique()->text(10),
            'family' => $this->faker->randomElement(['Tree', 'Flower', 'Bush', 'Fungie']),
            'description' => $this->faker->sentence,
        ];
    }
}

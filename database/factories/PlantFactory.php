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
            'cientificName' => $this->faker->text(10),
            'family' => $this->faker->text(15),
            'description' => $this->faker->sentence,
        ];
    }
}

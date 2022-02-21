<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    protected $fillable = [
        'plant', 
        'image',
      ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'plant' => \App\Models\Plant::all()->random()->id,
            'image' => $this->faker->imageUrl(512, 512, 'nature'),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContributerFactory extends Factory
{
    protected $fillable = [
        'contributer',
        'plant', 
      ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'contributer' => \App\Models\User::all()->random()->id,
            'plant' => \App\Models\Plant::all()->random()->id,
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LikeFactory extends Factory
{
    protected $fillable = [
        'user',
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
            'user' => \App\Models\User::all()->random()->id,
            'image' => \App\Models\Image::all()->random()->id,
        ];
    }
}

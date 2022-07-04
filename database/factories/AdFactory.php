<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'img'=>$this->faker->imageUrl,
            'note'=>$this->faker->paragraph(2),
            'link'=>'/',
            //
        ];
    }
}

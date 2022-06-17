<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Part;
use Illuminate\Database\Eloquent\Factories\Factory;

class PartFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Part::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name'=>$this->faker->colorName,
            'note'=>$this->faker->paragraph,
            'department_id'=>Department::inRandomOrder()->pluck('id')->first()
        ];
    }
}

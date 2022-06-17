<?php

namespace Database\Factories;

use App\Models\HelperForPart;
use App\Models\Part;
use Illuminate\Database\Eloquent\Factories\Factory;

class HelperForPartFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HelperForPart::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titel'=>$this->faker->text(15),
            'disc'=>$this->faker->text(110),
            'part_id'=>Part::inRandomOrder()->pluck("id")->first()

            //
        ];
    }
}

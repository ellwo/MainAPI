<?php

namespace Database\Factories;

use App\Models\Bussinse;
use App\Models\Location;
use App\Models\Markt;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Location::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'address'=>"[".$this->faker->address."]".$this->faker->streetAddress,
            'phone'=>$this->phones(),
            'bussinse_id'=>Bussinse::inRandomOrder()->pluck('id')->first(),
            'markt_id'=>Markt::inRandomOrder()->pluck('id')->first()

        ];



    }

    function phones(){

        $p=[];


        for($i=1; $i<rand(1,3); $i++){
            $p[]=$this->faker->phoneNumber;
        }

        return $p;
    }
}

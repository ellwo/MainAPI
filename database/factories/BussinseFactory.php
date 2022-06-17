<?php

namespace Database\Factories;

use App\Models\Bussinse;
use App\Models\City;
use App\Models\Country;
use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BussinseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bussinse::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name'=>$this->faker->company,
            'note'=>$this->faker->paragraph,
            'username'=>$this->faker->userName,
            'address'=>$this->address(),
            'avatar'=>$this->faker->imageUrl,
            'department_id'=>Department::inRandomOrder()->pluck('id')->first(),
            'user_id'=>User::inRandomOrder()->pluck('id')->first(),


        ];
    }

    public function address(){
        $adress=[];

        for( $i=0; $i<rand(1,3); $i++){

            $adress[$this->faker->address]=$this->faker->streetAddress;
        }
        return $adress;
    }
}

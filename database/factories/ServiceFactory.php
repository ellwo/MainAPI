<?php

namespace Database\Factories;

use App\Models\Bussinse;
use App\Models\Department;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Service::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name'=>$this->faker->text(20),
            "price"=>$this->faker->numberBetween(2000,200000),
            "department_id"=>Department::inRandomOrder()->where("type","2")->pluck("id")->first(),
            "min_pyment"=>$this->faker->numberBetween(2000,60000),
            "how_long"=>$this->faker->numberBetween(24,168),
            "image"=>$this->faker->imageUrl(250,250,"service"),
            "imgs"=>$this->images(),
            "note"=>$this->notes()

        ];
    }


    public function images(){

        $imgs=[];

        for($i=0; $i<5;$i++){
            $imgs[]=$this->faker->imageUrl(250,250,"serveices");
        }
        return $imgs;
    }


    public function notes(){

        $imgs=[];

        for($i=0; $i<5;$i++){
            $imgs[$this->faker->text(25)]=$this->faker->text(191);
        }
        return $imgs;
    }
}

<?php

namespace Database\Seeders;

use App\Models\Bussinse;
use App\Models\City;
use App\Models\Country;
use App\Models\Part;
use App\Models\Product;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    //    \App\Models\Country::factory(1)->create();
    //    \App\Models\City::factory(10)->create();
    //    \App\Models\User::factory(30)->create();


    //    \App\Models\Department::factory(20)->create();
    //     \App\Models\Part::factory(120)->create();
    //     \App\Models\Bussinse::factory(30)->create();
    //     \App\Models\Product::factory(50)->create();
    //     \App\Models\Service::factory(50)->create();
    //      \App\Models\Part::factory(80)->create();

    //     $bussinses=Bussinse::all();














    //     foreach ($bussinses as $bussnise){
    //         $contr=Country::inRandomOrder()->first();
    //         $cities=$contr->cities->take(rand(1,4))->pluck("id");

    //         $bussnise->cities()->attach($cities);


    //         $parts=$bussnise->department->parts()->inRandomOrder()->take(rand(2,6))->pluck('id');
    //         $bussnise->parts()->attach($parts);

    //         if($bussnise->department->type==1)
    //         $bussnise->products()->saveMany(Product::where("owner_type","=",null)->where("owner_id","=",null)->take(rand(4,8))->get());
    //         else
    //         $bussnise->services()->saveMany(Service::where("owner_type","=",null)->where("owner_id","=",null)->take(rand(3,5))->get());


    //         foreach($bussnise->products as $pro){

    //             $pro->parts()->attach($bussnise->parts()->inRandomOrder()->take(rand(1,3))->pluck('id'));
    //             $pro->cities()->attach($bussnise->cities()->inRandomOrder()->take(rand(1,3))->pluck('id'));



    //         }


    //         foreach($bussnise->services as $pro){

    //             $pro->parts()->attach($bussnise->parts()->inRandomOrder()->take(rand(1,3))->pluck('id'));
    //             $pro->cities()->attach($bussnise->cities()->inRandomOrder()->take(rand(1,3))->pluck('id'));
    //         }



    //        $bussnise->followers(User::class)->attach(User::where("id","!=",$bussnise->user_id)->inRandomOrder()->take(rand(1,8))->pluck("id"));
    //     }




        $user=User::create(
            [
                'name'=>'admin',
                "email"=>"admin@me.com",
                "password"=>Hash::make("admin"),
                "gender"=>1,
                "city_id"=>2,
                "username"=>"mo",
                "phone"=>"775212843"
            ]
        );

       $role= Role::create([
            'name'=>'admin'
        ]);

        Role::create([
            'name'=>'normal'
        ]);

        $user->assignRole($role);







        $users=User::all();

        foreach ($users as $user){


            $products=Product::all();
            $service=Service::all();

            $user->products()->saveMany(Product::where("owner_type","=",null)->where("owner_id","=",null)->take(rand(1,4))->get());

            $user->services()->saveMany(Service::where("owner_type","=",null)->where("owner_id","=",null)->take(rand(1,4))->get());

            foreach ($products as $product){

               // $user->sync
               $user->rate($product,rand(1,5));


            }

            foreach ($service as $ser){

                // $user->sync
                $user->rate($ser,rand(1,5));


             }




        }






    }
}

<?php

namespace App\Providers;

use App\Models\City;
use App\Models\Department;
use App\Models\Markt;
use App\Models\Part;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(190);




     //   Cache::flush();

        $catgraies= Department::with('parts')->orderBy('updated_at','desc')->get();






        $cities= City::all();


          $parts= Part::all();


        view()->share('cities',$cities);

        view()->share('parts',$parts);

        view()->share('catgraies',$catgraies);

        view()->share('depts',$catgraies);



        $markts= Markt::all();



        view()->share('markts',$markts);














    }
}

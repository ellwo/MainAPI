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
        if (env('APP_ENV') == 'production')
        \URL::forceScheme('https');




        $catgraies=Cache::remember('catgraies',60*60*360,function(){
            return Department::with('parts')->get();

        });
        $cities=Cache::remember('cities',60*60*360,function(){
            return City::all();

        });
          $parts=Cache::remember('parts',60*60*360,function(){
            return Part::all();

        });

        view()->share('cities',$cities);

        view()->share('parts',$parts);

        view()->share('catgraies',$catgraies);

        view()->share('depts',$catgraies);



        $markts=Cache::remember('markts',60*60*360,function(){

            return Markt::all();
        });



        view()->share('markts',$markts);














    }
}

<?php

namespace App\Providers;

use App\Models\Department;
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


        // $catgraies=Cache::remember('catgraies',60*60*360,function(){
        //     return Department::all();

        // });

        // view()->share('catgraies',$catgraies);

    }
}

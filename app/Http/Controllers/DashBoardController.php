<?php

namespace App\Http\Controllers;

use App\Models\Bussinse;
use App\Models\City;
use App\Models\Department;
use App\Models\Markt;
use App\Models\Part;
use App\Models\Product;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashBoardController extends Controller
{
    //

    public function index()
    {
        if(Auth::check()){

            $depts_count=Department::all()->count();
            $parts_count=Part::all()->count();
            $service_count=Service::all()->count();
            $products_count=Product::all()->count();
            $user_counts=User::all()->count();
            $b_count=Bussinse::all()->count();
            $visits=visits(Bussinse::class)->count()+visits(Product::class)->count()+visits(Service::class)->count();

            $c_count=City::all()->count();
            $m_count=Markt::all()->count();


            return view('dashboard',[
                'd_count'=>$depts_count,
                'p_count'=>$parts_count,
                'services_count'=>$service_count,
                'v_count'=>$visits,
                'c_count'=>$c_count,
                'b_count'=>$b_count,
                'products_count'=>$products_count,
                'u_count'=>$user_counts,
                'm_count'=>$m_count
            ]);

        }


        return view('dashboard');

        # code...
    }
}

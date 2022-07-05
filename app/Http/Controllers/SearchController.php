<?php

namespace App\Http\Controllers;

use App\Models\Bussinse;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //


    public function index(Request $request)
    {
        # code...
        $bussinses=Bussinse::inRandomOrder()->take(4)->get();
        return view('search-pages.general-search-page',['bussinses'=>$bussinses]);
    }
}

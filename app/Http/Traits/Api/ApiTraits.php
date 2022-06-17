<?php
namespace App\Http\Traits\Api;






trait ApiTraits{


    public function okrspon($datar,$stats=200)
    {
        # code...
        return response($datar,$stats);
    }



}










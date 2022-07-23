<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Markt extends Model
{
    use HasFactory;

    public $fillable=[
        'name','city_id',
        'land_map',
        'long_map'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
        # code...
    }
    public function bussinses()
    {
        $this->hasManyThrough(Bussinse::class,Location::class);
        # code...
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory,\Znck\Eloquent\Traits\BelongsToThrough;

    public $fillable=[
        'address',
        'phone',
        'bussinse_id',
        'markt_id',
        'land_map',
        'long_map'
    ];

    public $casts=[
        'phone'=>'array'
    ];


    public function markt()
    {
        return $this->belongsTo(Markt::class);
        # code...
    }
    public function bussinse()
    {
        return $this->belongsTo(Bussinse::class);
        # code...
    }

    public function city()
    {
        return $this->belongsToThrough(City::class,Markt::class);
        # code...
    }






}

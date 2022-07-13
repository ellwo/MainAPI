<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory, \Staudenmeir\EloquentHasManyDeep\HasRelationships;

    protected $fillable=[
        'name','location','country_id'

    ];


    public function bussinses()
    {

       // return $this->hasManyDeep(Bussinse::class,['city_bussinse']);
        //return $this->hasManyThrough(Bussinse::class,CityBussinse::class);
        return $this->belongsToMany(Bussinse::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
        # code...
    }

    public function products()
    {
        # code...
        return $this->belongsToMany(Product::class);
    }

    public function service()
    {
        return $this->belongsToMany(Service::class);
        # code...
    }
    public function users()
    {
        return $this->hasMany(User::class);
        # code...
    }
    public function markts()
    {
        return $this->hasMany(Markt::class);
        # code...
    }
}

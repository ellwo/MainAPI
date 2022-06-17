<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory, \Staudenmeir\EloquentHasManyDeep\HasRelationships;



    protected $fillable=[
        'name',
        'location'

    ];


    public function cities()
    {
        return $this->hasMany(City::class);
    }
    public function bussinses()
    {

        return $this->hasMany(Bussinse::class);
       // return $this->hasManyDeep(Bussinse::class,[City::class,'city_bussinse']);
        //return $this->hasManyDeep(Bussinse::class,)
        //return $this->hasManyDeep(Bussinse::class,[City::class,CityBussinse::class]);
        //return $this->hasManyDeep(Bussinse::class,['city_bussinse',City::class]);
    }
    public function users()
    {
        # code...
        return $this->hasMany(User::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable=[
        'name','note','type',
        'img'
    ];

    public function parts()
    {
        return $this->hasMany(Part::class);


    }

    public function products()
    {
        return $this->hasMany(Product::class);
        # code...
    }

    public function itemscount()
    {
        if($this->type==1)
        return $this->products()->count();
        else
        return $this->services()->count();
        # code...
    }
    public function services()
    {
        # code...
        return $this->hasMany(Service::class);
    }
    public function bussinses()
    {
        # code...
        return $this->hasMany(Bussinse::class);
    }


}

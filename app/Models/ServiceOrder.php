<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    use HasFactory;


    public $fillable=[
        'user_id',
        'service_id',
        'note',
        'address',
        'land_map',
        'long_map',
        'status',
        'to_date',
        'qun'
    ] ;

    public $casts=[
        'updated_at'=>'datetime:Y m d'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
        # code...
    }
    public function service()
    {
        return $this->belongsTo(Service::class);
        # code...
    }

}

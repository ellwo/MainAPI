<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    use HasFactory;


    public $fillable=[
        'user_id',
        'product_id',
        'note',
        'address',
        'land_map',
        'long_map',
        'status',
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
    public function product()
    {
        return $this->belongsTo(Product::class);
        # code...
    }

}

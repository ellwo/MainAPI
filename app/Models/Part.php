<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;

    protected $fillable=[
        'name','note','department_id'
    ];

        public function department()
        {
            return $this->belongsTo(Department::class);
        }
        public function helpers()
        {
            return $this->hasMany(HelperForPart::class);
        }
        public function bussinses()
        {
            return $this->belongsToMany(Bussinse::class);
            # code...
        }
        public function products()
        {
            return $this->belongsToMany(Product::class);
        }
        public function services()
        {
            return $this->belongsToMany(Service::class);
            # code...
        }

}

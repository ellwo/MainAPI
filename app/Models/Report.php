<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    public $fillable=[
        'note','type',
        'reportable_id',
        'reportable_type'
    ];




    public function reportable()
    {
        return $this->morphTo();
        # code...
    }





}

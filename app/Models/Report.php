<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    public $fillable=[
        'reporting_id',
        'reportable_id',
        'reportable_type',
        'type',
        'note'
    ];



    public function reporting()
    {
        # code...

    }

    public function reportable()
    {
        return $this->morphTo();
        # code...
    }


}

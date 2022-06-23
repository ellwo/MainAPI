<?php

namespace App\Models;

use Alexmg86\LaravelSubQuery\Traits\LaravelSubQueryTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Nagy\LaravelRating\Traits\Like\Likeable;
use Nagy\LaravelRating\Traits\Rate\Rateable;

class Service extends Model
{
    use HasFactory
        , \Staudenmeir\EloquentHasManyDeep\HasRelationships
        ,\Znck\Eloquent\Traits\BelongsToThrough,
        Rateable,
        Likeable,
        LaravelSubQueryTrait;

    protected $fillable=[
        "department_id",
        "name","price","note","img","imgs",
        "min_pyment","how_long",""
    ];
    protected $casts=[
        'imgs'=>'array',
        'note'=>'array'
    ];

   public function note_json(){
       return json_encode($this->note);
   }

    public  function department(){
        return $this->belongsTo(Department::class);
    }
    public function country()
    {
        return $this->belongsToThrough(Country::class,[Bussinse::class]);
        # code...
    }

    public function cities()
    {
        return $this->belongsToMany(City::class);
    }
    public function bussinse() :BelongsTo
    {
        return $this->belongsTo(Bussinse::class);
    }

    public function parts()
    {
        return $this->belongsToMany(Part::class);

    }


    public function owner()
    {

        return $this->morphTo();
        # code...
    }


    public function vzt()
    {
        return visits($this);
    }
    public function vzt_count(){
        $this->vzt()->increment();
        return $this->vzt()->count();
    }


}

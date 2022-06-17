<?php

namespace App\Models;

use Alexmg86\LaravelSubQuery\Traits\LaravelSubQueryTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use \Nuwave\Lighthouse\Scout\ScoutBuilderDirective;
use Nagy\LaravelRating\Traits\Rate\Rateable;
use Nagy\LaravelRating\Traits\Like\Likeable;
class Product extends Model
{

    use HasFactory
        , \Staudenmeir\EloquentHasManyDeep\HasRelationships
        ,\Znck\Eloquent\Traits\BelongsToThrough,
        Rateable,
        Likeable,
        LaravelSubQueryTrait;

    protected $fillable=[
        "name",
        "price",
        "colors",
        "note",
        "img",
        "imgs",
        "year_created",
        "status"
    ];
    protected $casts =[
        'colors'=>'array',
        'note'=>'array',
        'imgs'=>'array'
    ];



    public function vzt()
    {
        return visits($this);
    }
    public function vzt_count(){
        $this->vzt()->increment();
        return $this->vzt()->count();
    }

    public function colorsasJson(){



        return json_encode($this->colors);

        $data=[];

        foreach ($this->colors as $k=>$v){

            $data[]=[
                "__typename"=>"JsonType",
                "k"=>$k,
                "v"=>$v
            ];
        }
       // $dta["data"]=$data;
        return $data;
    }

    public function owner()
    {

        return $this->morphTo();
        # code...
    }
    public function notes(){

        return json_encode($this->note);
        $data=[];

        foreach ($this->note as $k=>$v){

            $data[]=[
                "__typename"=>"JsonType",
                "k"=>$k,
                "v"=>$v
            ];
        }
        // $dta["data"]=$data;
        return $data;

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function bussinse() :BelongsTo
    {
        return $this->belongsTo(Bussinse::class);
    }


    public function parts()
    {
        return $this->belongsToMany(Part::class);

    }



    public function department(){

        return $this->belongsTo(Department::class);
    }
}

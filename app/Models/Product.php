<?php

namespace App\Models;

use Alexmg86\LaravelSubQuery\Traits\LaravelSubQueryTrait;
use Carbon\Carbon;
use DateTimeInterface;
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
        "status",
        'discrip',
        'owner_id',
        'owner_type',
        'department_id'
    ];
    protected $casts =[
        'colors'=>'array',
        'note'=>'array',
        'imgs'=>'array',
    ];





    public function reports()
    {
        return $this->morphMany(Report::class,'reportable');
        # code...
    }















    public function getUpdatedAtAttribute($value){

        $d=new Carbon($value,"Asia/Aden");

        
        $days=now()->diffInDays($d);


        $day=$d->format('Y-M-d');

        switch($days){
            case 0 : $day="اليوم منذ ";
            $hours=now()->diffInHours($d);
            $day.=$hours."ساعة";
            break;

            case 1 : $day="الامس";

            $day=$d->format(' h:i A  ').$day;

            break;
            case 2 : $day="منذ يومين";

            $day=$d->format(' h:i A  ').$day;

            break;
            case 7 :$day="منذ اسبوع";

            $day=$d->format(' h:i A  ').$day;
            break;
            case 10 :$day="منذ عشرة ايام ";

            $day=$d->format(' h:i A  ').$day;
            break;
            case 15 :$day="منذ نصف شهر";

        $day=$d->format(' h:i A  ').$day;

            break;
        }

        return $day;

      }
    public function getCreatedAtAttribute($value){

        $d=new Carbon($value,"Asia/Aden");

        $days=now()->diffInDays($d);

        $day=$d->format('Y-M-d');

        switch($days){
            case 0 : $day="اليوم منذ ";
            $hours=now()->diffInHours($d);
            $day.=$hours."ساعة";
            break;

            case 1 : $day="الامس";

            $day=$d->format(' h:i A  ').$day;

            break;
            case 2 : $day="منذ يومين";

            $day=$d->format(' h:i A  ').$day;

            break;
            case 7 :$day="منذ اسبوع";

            $day=$d->format(' h:i A  ').$day;
            break;
            case 10 :$day="منذ عشرة ايام ";

            $day=$d->format(' h:i A  ').$day;
            break;
            case 15 :$day="منذ نصف شهر";

        $day=$d->format(' h:i A  ').$day;

            break;
        }

        return $day;


   }


    public function orders()
    {

        return $this->hasMany(ProductOrder::class);
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


    // public function colorsasJson(){



    //     return json_encode($this->colors);

    //     $data=[];

    //     foreach ($this->colors as $k=>$v){

    //         $data[]=[
    //             "__typename"=>"JsonType",
    //             "k"=>$k,
    //             "v"=>$v
    //         ];
    //     }
    //    // $dta["data"]=$data;
    //     return $data;
    // }

    public function owner()
    {

        return $this->morphTo();
        # code...
    }









    // public function notes(){

    //     return json_encode($this->note);
    //     $data=[];

    //     foreach ($this->note as $k=>$v){

    //         $data[]=[
    //             "__typename"=>"JsonType",
    //             "k"=>$k,
    //             "v"=>$v
    //         ];
    //     }
    //     // $dta["data"]=$data;
    //     return $data;

    // }

    // public function country()
    // {



    //     return $this->belongsToThrough(Country::class,[Bussinse::class]);
    //     # code...
    // }
    // public function cities()
    // {
    //     return $this->belongsToMany(City::class);
    // }



    public function parts()
    {
        return $this->belongsToMany(Part::class);

    }



    public function department(){

        return $this->belongsTo(Department::class);
    }
}

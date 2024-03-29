<?php

namespace App\Models;

use Alexmg86\LaravelSubQuery\Traits\LaravelSubQueryTrait;
use Carbon\Carbon;
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
        "min_pyment","how_long","owner_id","owner_type"
    ];
    protected $casts=[
        'imgs'=>'array',
        'note'=>'array'
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


    public function orders()
    {

        return $this->hasMany(ServiceOrder::class);
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


    public static function boot() {
        parent::boot();

        Service::deleting(function($service) { // before delete() method call this

            $service->orders->delete();
            $service->ratings->delete();
            $service->parts()->detach();
        });
    }


}

<?php

namespace App\Models;

use App\Http\Traits\CanConvristion;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Znck\Eloquent\Traits\BelongsToThrough;
use Nagy\LaravelRating\Traits\Rate\CanRate;
use Rennokki\Befriended\Traits\Block;
use Rennokki\Befriended\Contracts\Blocking;
use Rennokki\Befriended\Contracts\Follower;
use Rennokki\Befriended\Traits\CanFollow;
use Spatie\Permission\Traits\HasRoles;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;
class User extends Authenticatable implements Blocking,Follower, BannableContract
{
    use HasApiTokens, HasFactory, Notifiable,CanRate,BelongsToThrough,
    CanConvristion,
    Block
    ,HasRoles, Bannable,
    CanFollow,
    \Staudenmeir\EloquentHasManyDeep\HasRelationships;



    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'phone',
        'gendar',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
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



    public function blockers_user(){
        return $this->blockers(Bussinse::class)->get();
    }


    public function orders()
    {
        return $this->hasMany(ProductOrder::class);   # code...
    }
    public function owne_product_orders()
    {



        return  $this->hasManyDeepFromRelations($this->products(), (new Product)->orders())->where('product_orders.status','=',0);

        # code...
    }


    public function owne_service_orders()
    {



        return  $this->hasManyDeepFromRelations($this->services(), (new Service)->orders())->where('service_orders.status','=',0);

        # code...
    }

    public function rate_comment($model,$value,$comment)
    {
        $this->rate($model,$value);

      //return $rate;
        $rate  =$model->ratings()->where('model_id','=',$this->id)->orderBy("id","desc")->first();

        $rate->comment=$comment;
        $rate->save();
        return $rate;

        # code...
    }


    // public function chatrooms()
    // {
    //     # code...
    //     return   ChatRoom::with("messages")->
    //     where(function ($query) {
    //         $query->where("to_id",$this->id)
    //         ->Orwhere("from_id",$this->id);

    //     })
    //     ->where(function($query){
    //         $query->where("from_type",get_class($this))
    //         ->Orwhere("to_type",get_class($this));
    //     })
    //     ->orderByRelation("messages:id");

    // }



    public function token($tokenName="graphql"){

        $token=$this->createToken("api");
       //$token=$this->tokens()->first();
        return $token->plainTextToken;
    }

    public function bussinses_followed(){
        return $this->belongsToMany(Bussinse::class)
        ->wherePivot("isblocked","=",0);
    }


    public function munfollow($buss_id)
    {

        $buss=$this->bussinses_followed()->where("id",$buss_id)->first();
       if($buss)
        return $buss->pivot->delete();
        else
        return false;



        # code...
    }

    public function mfollow($buss_id)
    {

        $buss=Bussinse::find($buss_id);
        if(!$buss->isBlocking($this)){


            return true;
        }
    else
        return false;

        # code...
    }


    public function bussinses()
    {


        # code...
        return $this->hasMany(Bussinse::class);
    }
    public function products()
    {
        return $this->morphMany(Product::class,'owner');

    }
    public function services()
    {
        return $this->morphMany(Service::class,'owner');
    }

    public function country()
    {
        return $this->belongsToThrough(Country::class,[City::class]);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }

}

<?php

namespace App\Models;

use Alexmg86\LaravelSubQuery\Traits\LaravelSubQueryTrait;
use App\Http\Traits\CanConvristion;
use App\Http\Traits\Reportable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nagy\LaravelRating\Traits\Rate\Rateable;
use Nagy\LaravelRating\Traits\Like\Likeable;
use Staudenmeir\EloquentHasManyDeep\HasManyDeep;
use Rennokki\Befriended\Traits\Block;
use Rennokki\Befriended\Scopes\BlockFilterable;
use Rennokki\Befriended\Contracts\Blocking;
use Rennokki\Befriended\Contracts\Followable;
use Rennokki\Befriended\Traits\CanBeFollowed;

class Bussinse extends Model implements Blocking,Followable
{
    use HasFactory,Rateable,
        LaravelSubQueryTrait,
        \Znck\Eloquent\Traits\BelongsToThrough,
        \Staudenmeir\EloquentHasManyDeep\HasRelationships,
        CanConvristion
        ,Block
        ,BlockFilterable,Reportable,CanBeFollowed;
    protected $fillable=[
        "name",
        "username",
        "avatar",
        "note",
        "imgs",
        "phone_numbers",
        "contact_links",
        "department_id",
        "user_id",
        "address"
    ];

    protected $casts=[
      'address'=>"array",
      "contact_links"=>"array",
      "imgs"=>"array",
      "phone_numbers"=>"array"
    ];






   public function followers_b(){

    return $this->followers(User::class);
   }


    public function ratingsAvg_()
    {

        $sum=0;
        $count=0;
        foreach($this->products()->withAvg("ratings:value")->get() as $prod){
          $sum+=$prod->ratings_value_avg;
          $count++;
        }


        if($count!=0)
          return (int)$sum/$count;
          else
          return 0;

    }

    public function address_json(){
        return json_encode($this->address);
    }
    public function phone_numbers_json(){
        return json_encode($this->phone_numbers);
    }








    // public function blocked_followers()
    // {
    //     return $this->belongsToMany(User::class)
    //     ->wherePivot("isblocked","=",1);
    //     # code...
    // }




// public function block_user($user_id)
// {
//     $follower=$this->followers()->wherePivot("user_id","=",$user_id)->first();
//     $follower->pivot->isblocked=1;
//     $follower->pivot->save();

//     return true;
//     # code...
// }






    public function country()
    {



       // return ;
        return Country::find($this->cities()->find(7)->pluck("country_id")->first());
        //$this->belongsTo(Country::class);
         //HasManyDeep('App\Permission', ['role_user', 'App\Role']);
    }






    public function user()
    {
        # code...
        return $this->belongsTo(User::class);
    }





    public function department()
    {
        # code...
        return $this->belongsTo(Department::class);
    }



    public function cities()
    {
        # code...
        return $this->belongsToMany(City::class);
    }







    public function parts()
    {
        # code...
        return $this->belongsToMany(Part::class);
    }








    public function products()
    {
        return $this->morphMany(Product::class,'owner');

    }





    public function services()
    {
        return $this->morphMany(Service::class,'owner');
        # code...
    }



}

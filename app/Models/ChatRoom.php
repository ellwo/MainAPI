<?php

namespace App\Models;

use Alexmg86\LaravelSubQuery\Traits\LaravelSubQueryTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{
    use HasFactory,LaravelSubQueryTrait;
    public $fillable=[

        'from_id',
        'from_type',
        'to_type',
        'to_id',
        'isblocked'
    ];















    function from(){

        return $this->morphTo();
    }



    function to(){
        return $this->morphTo();
    }







    public function name()
    {

        if ($this->to_id==auth()->user()->id)
            $nae=User::find($this->from_id)->name;
        else
            $nae=User::find($this->to_id)->name;


        # code...
    }



    public function messages(){
        return $this->hasMany(Message::class);
    }
    public function lasttmessage()
    {
        # code...
        return $this->messages()->orderby("id","desc")->first();
    }



    public function unread_messages(){
        return $this->hasMany(Message::class)->where("is_readed","=","0")->orderBy("id","desc");
    }

    public function unreaded_messages($chattings_id){
        return $this->hasMany(Message::class)->where("is_readed","=","0")->where("sender","!=",$chattings_id)->orderBy("id","desc");
    }



    public function chatable($id)
    {
        if($this->to_id ==$id){



            $model=null;

            //return $this->from_type==User::class?User::find($this->from_id):"no";

            if($this->from_type==User::class)
           { $model=User::find($this->from_id);

           }else
            $model=Bussinse::find($this->form_id);


            $model=$this->from;


            return [
                'name'=>$model->name,
                'avatar'=>$model->avatar,
                'id'=>$model->id
            ];
        }
        else if($this->from_id==$id){

            $model=null;

            if($this->to_type==User::class)
            $model=User::find($this->to_id);
            else
            $model=Bussinse::find($this->to_id);

            $model=$this->to;


            return [
                'name'=>$model->name,
                'avatar'=>$model->avatar,
                'id'=>$model->id
            ];
        }

        # code...
    }


    public function isitBlocked($id)
    {
        if($this->to_id==$id){

           return  $this->from->isBlocking($this->to);


        }
        else if($this->from_id==$id){

            return  $this->to->isBlocking($this->from);

        }



        # code...
    }


}

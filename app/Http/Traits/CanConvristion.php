<?php
namespace App\Http\Traits;

use Alexmg86\LaravelSubQuery\Traits\LaravelSubQueryTrait;
use App\Models\Bussinse;
use App\Models\ChatRoom;
use App\Models\User;
use Str;
trait CanConvristion{





    function startconvristion($model){



        // if($this->blocking(get_class($model)) || $model->blocks($this)){
        //     return null;
        // }

        $model_id=$model->id;
        $count=$this->chatrooms()
        ->where(function ($query) use ($model_id) {
            $query->where("to_id","=",$model_id)
            ->where("from_id","=",$this->id);
        })->Orwhere(
            function ($query) use ($model_id) {
                $query->where("to_id","=",$this->id)
                ->where("from_id","=",$model_id);
            }
        )->where("isblocked",0)->first();

        if($count==null)
{
   return $convers= ChatRoom::create([
            'from_id'=>$this->id,
            'from_type'=>get_class($this),
            'to_id'=>$model->id,
            'to_type'=>get_class($model),
            'isblocked'=>0
        ]);
        return $convers->with("messages")->get();
    }       else
        return $count;


    }




    public function block_convrstion($id)
    {

        // $convrs=Convrstion::find($id);

        // $convrs->isblocked=1;
        // $convrs->save();
        //         # code...
        // $this->convristions()->where("to_id","=",$model->id)
        // ->where("to_type","=",get_class($model))->get();

    }


    public function chatrooms()
    {
        # code...


        //return;

        return   ChatRoom::with("unread_messages")->
        where(function ($query) {
            $query->where("to_id",$this->id)
            ->where("to_type",get_class($this));

        })
        ->Orwhere(function($query){
            $query->where("from_type",get_class($this))
            ->where("from_id",$this->id);
        })->whereDoesntHave($this->blockers())
        ->orderByRelation("messages:id");

    }

    public function chatrooms_gql()
    {
        return $this->chatrooms()->get();
        # code...
    }

    public function chatrooms_only()
    {
        # code...


        $blokings_user=$this->blocking(User::class)->pluck('blockable_id')->toArray();

        $blokings_bussinse=$this->blocking(Bussinse::class)->pluck('blockable_id')->toArray();

    $blockers= array_merge ($blokings_bussinse,$blokings_user);








        return

        ChatRoom::
        where(function ($query)use($blockers) {
            $query->where("to_id",$this->id)
            ->where("to_type",get_class($this))->whereNotIn("from_id",$blockers);

        })
        ->Orwhere(function($query)use($blockers){
            $query->where("from_type",get_class($this))
            ->where("from_id",$this->id)->whereNotIn("to_id",$blockers);
        })
        ->orderByRelation("messages:id");

    }


    public function chatable()
    {








        # code...
    }



}

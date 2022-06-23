<?php

namespace App\Http\Livewire\Manage\Product;

use App\Models\Bussinse;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsManageTable extends Component
{

    public $type="";
    public $username="";
    public $search="";
    public $delete_productid="no";



   public function mount($type="all",$bussinse_username=""){
    $this->type=$type;
    $this->username=$bussinse_username;

   }

   use WithPagination;

    function Setdelete_productid($id)
   {
    $this->delete_productid=$id;
    # code...
   }



    public function render()
    {


        $user=User::find(auth()->user()->id);
        $bussinses_ids=$user->bussinses()->whereHas("department",function($query){
        $query->where('type',"=",1);
    })->get();

    $products=null;


    if($this->type=="all")
    $products=Product::where(function($query)use($user){
            $query->where('owner_id','=',$user->id)->where('owner_type','=',User::class);
        })
        ->Orwhere(function($query)use($bussinses_ids){
            $query->whereIn("owner_id",$bussinses_ids->pluck('id'))->where('owner_type','=',Bussinse::class);
        })->where('name','LIKE','%'.$this->search.'%')->orderBy('created_at','desc')->paginate(5);

        else if($this->type=="useronly")
        $products=$user->products()->where('name','LIKE','%'.$this->search.'%')->orderBy('created_at','desc')->paginate(5);


        else if($this->type=="bussinse" ){

            $buss=$user->bussinses()->where("username","=",$this->username)->first();
            if($buss!=null)
            {
                $products=$buss->products()->where('name','LIKE','%'.$this->search.'%')->orderBy('created_at','desc')->paginate(5);
            }
        }

        return view('manage.product.products-manage-table',['products'=>$products,'bussinses'=>$bussinses_ids]);
    }


     function choseBuss($username)
    {
        $this->type="bussinse";
        $this->bussinse_username=$username;

        # code...
    }
    function updateUsername(){
        $this->type="bussinse";
    }
    function UsernameUpdated(){
        $this->type="bussinse";

        if($this->username=="all")
        $this->type="all";
        if($this->username=="useronly")
        $this->type="useronly";

        $this->resetPage('page');
    }

     function userOnly()
    {
        $this->type="useronly";
        # code...
    }
}

<?php

namespace App\Http\Livewire\Orders\Service;

use App\Models\ServiceOrder;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ServiceOrders extends Component
{
    use WithPagination;

    public $type="";
    public $username="";
    public $search="";
    public $delete_orderid="no";
    public $status=4;

   public function mount($type="all",$bussinse_username=""){
    $this->type=$type;
    $this->username=$bussinse_username;

   }

    public function render()
    {


        $user=User::find(auth()->user()->id);
        $bussinses_ids=$user->bussinses()->whereHas("department",function($query){
        $query->where('type',"=",2);
                })->get();

                $status=[0,1,2];
                switch($this->status){
                    case 0 : $status=[0];
                    break;
                    case 1 : $status=[1];
                    break;
                    case 2 : $status=[2];
                    break;
                    default:$status=[0,1,2];
                }


               // $ids=array_merge($user->owne_orders()->pluck('id')->toArray(),$bussinses_ids->)

               if($this->type=="all"){
           $orders=ServiceOrder::with('service')->where(function($query)use($user,$bussinses_ids){
            $query->whereHas('service',function($query)use($bussinses_ids){
                $query->whereIn('owner_id',$bussinses_ids->pluck('id')->toArray())->where('owner_type','=',Bussinse::class);
               })->OrwhereHas('service',function($query)use($user){
                $query->where('owner_id','=',$user->id)->where('owner_type','=',User::class);
               });
           })->orderBy('updated_at','desc')->whereIn('status',$status)->paginate(5);
        }
        else if($this->type=="useronly"){
            $orders=ServiceOrder::with('service')->where(function($query)use($user,$bussinses_ids){
                $query->whereHas('service',function($query)use($user){
                    $query->where('owner_id','=',$user->id)->where('owner_type','=',User::class);
                   });
               })->orderBy('updated_at','desc')->whereIn('status',$status)->paginate(5);
        }
        else if($this->type=="bussinse")
        {
            $orders=ServiceOrder::with('service')->where(function($query)use($user,$bussinses_ids){
                $query->whereHas('service',function($query)use($bussinses_ids){
                    $query->where('owner_id',"=",$bussinses_ids->where("username","=",$this->username)->pluck('id')->first())->where('owner_type','=',Bussinse::class);
                   });
               })->orderBy('updated_at','desc')->whereIn('status',$status)->paginate(5);


        }





        return view('livewire.orders.service.service-orders',['orders'=>$orders,'bussinses'=>$bussinses_ids])->layout('components.dashborade.index');
    }
  public function choseBuss($id){
    $this->username=$id;
   }

   public function accept_order($id){
    $order= ServiceOrder::find($id);
    $order->status=1;

    session()->flash('status','تم قبول الطلب بنجاح');

    $order->save();
    $this->status=1;
   }
   public function deny_order($id){
    $order= ServiceOrder::find($id);
    $order->status=2;

    $order->save();
    $this->status=2;
        session()->flash('status','تم رفض الطلب بنجاح');

   }
     function UsernameUpdated(){
    $this->type="bussinse";

    if($this->username=="all")
    $this->type="all";
    if($this->username=="useronly")
    $this->type="useronly";

    $this->resetPage('page');
}

   public function delete_order($id)
   {
    $this->delete_orderid=$id;
    # code...
   }

}

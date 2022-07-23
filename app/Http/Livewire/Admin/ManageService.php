<?php

namespace App\Http\Livewire\Admin;

use App\Http\Controllers\UploadeController;
use App\Models\Bussinse;
use App\Models\Service;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ManageService extends Component
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


        $user=User::whereHas('services')->get();
        $bussinses_ids=Bussinse::whereHas('services')->whereHas("department",function($query){
        $query->where('type',"=",2);
    })->get();

    $products=null;


    if($this->type=="all")
    $products=Service::where('name','LIKE','%'.$this->search.'%')->Orwhere('id','=',$this->search)->orderBy('created_at','desc')->paginate(5);

    else if($this->type=='withusername'){
        $products=Service::whereHas('owner',function($query){
            $query->where('username','=',$this->username);
        })->where('name','LIKE','%'.$this->search.'%')->Orwhere('id','=',$this->search)->orderBy('created_at','desc')->paginate(5);
    }

        return view('livewire.admin.manage-service',['products'=>$products,'bussinses'=>$bussinses_ids,'users'=>$user])->layout('components.dashborade.index');
    }


     function choseBuss($username)
    {
        if($this->username!='all')
        $this->type="withusername";
        $this->username=$username;

        # code...
    }
    function updateUsername(){
    }
    function UsernameUpdated(){
        // $this->type="bussinse";

        // if($this->username=="all")
        // $this->type="all";
        // if($this->username=="useronly")
        // $this->type="useronly";
        if($this->username!='all')
        $this->type="withusername";

        $this->resetPage('page');
    }

     function userOnly()
    {
        $this->type="useronly";
        # code...
    }


    public function delete_pro($id)
    {
        $pro=Service::find($id);

        if($pro!=null){


            $uplode=new UploadeController();

            $uplode->delete_file($pro->img);

            foreach($pro->imgs as $img){
                $uplode->delete_file($img);

            }

            $pro->delete();

            session()->flash('status','تم الحذف بنجاح');
            session()->flash('tital','عملية التعديل ');

    }
}

}

<?php

namespace App\Http\Livewire\Admin;

use App\Models\Bussinse;
use Livewire\Component;
use Livewire\WithPagination;

class ManageBussinse extends Component
{

    use WithPagination;

    public $delete_b='no';
    public $dept='all';
    public $search='';
    public function render()
    {

        $bussinses=[];
        if($this->dept!='all'){
            $bussinses=Bussinse::whereHas('department',function($q){
                $q->where('id','=',$this->dept);
            })->where(function($q){
                $q->where('name','like','%'.$this->search.'%')
                ->Orwhere('note','like','%'.$this->search.'%')->
                Orwhere('username','like','%'.$this->search.'%');
            })->orderBy('created_at','desc')->paginate(8);

        }
        else{
            $bussinses=Bussinse::where(function($q){
                $q->where('name','like','%'.$this->search.'%')
                ->Orwhere('note','like','%'.$this->search.'%')->
                Orwhere('username','like','%'.$this->search.'%');
            })->orderBy('created_at','desc')->paginate(8);
        }


        return view('livewire.admin.manage-bussinse',['bussinses'=>$bussinses])
        ->layout('components.dashborade.index');
    }


    public function delete_bu($id)
    {
        $bus=Bussinse::find($id);
        if($bus!=null)
        $bus->delete();
        # code...
    }



}

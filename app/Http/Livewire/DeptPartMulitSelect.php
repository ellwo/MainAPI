<?php

namespace App\Http\Livewire;

use App\Models\Department;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class DeptPartMulitSelect extends Component
{

    public $dept=1;
    public $selected=array();
    public $parts='';
    public $selectedParts=[];
    public $type;
    public $searching=false;


    function mount($dept=1,$selected=[],$type='all',$searching=false){
        $this->dept=$dept;
        $this->searching=$searching;

        $this->selected=$selected;
        $this->type=$type;

    }
    public function render()
    {

        if($this->dept!='any')
        $department=Department::with('parts')->where('id',$this->dept)->first();
        else if($this->type!="all")
        $department=Department::with('parts')->where('type','=',$this->type)->first();
        else
        $department=Department::with('parts')->first();



        return view('livewire.dept-part-mulit-select',['department'=>$department,'dept_parts'=>$department->parts]);
    }


    public function updated()
    {
        $this->emit('setDept',$this->dept);
        $this->emit('setParts',$this->selectedParts);
        # code...
    }

    function onCahngeDept($id){
        $this->dept=$id;

    }

}

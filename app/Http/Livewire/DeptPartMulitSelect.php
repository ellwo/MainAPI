<?php

namespace App\Http\Livewire;

use App\Models\Department;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class DeptPartMulitSelect extends Component
{

    public $dept=1;
    public $selected=array();
    public $type;


    function mount($dept=1,$selected=[],$type='all'){
        $this->dept=$dept;

        $this->selected=$selected;
        $this->type=$type;

    }
    public function render()
    {

        if($this->dept!='any')
        $department=Department::with('parts')->where('id',$this->dept)->first();
        else if($this->type!="all")
        $department=Department::with('parts')->where('type','=',1)->first();
        else
        $department=Department::with('parts')->first();


        return view('livewire.dept-part-mulit-select',['department'=>$department,'dept_parts'=>$department->parts]);
    }


    public function updated()
    {
        $this->emit('setDept',$this->dept);
        # code...
    }

    function onCahngeDept($id){
        $this->dept=$id;

    }

}

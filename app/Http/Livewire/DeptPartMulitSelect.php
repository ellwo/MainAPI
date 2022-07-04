<?php

namespace App\Http\Livewire;

use App\Models\Department;
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

        $department=Department::with('parts')->where('id',$this->dept)->first();
        return view('livewire.dept-part-mulit-select',['department'=>$department,'dept_parts'=>$department->parts]);
    }

    function onCahngeDept($id){
        $this->dept=$id;

    }

}

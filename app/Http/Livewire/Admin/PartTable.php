<?php

namespace App\Http\Livewire\Admin;

use App\Models\Part;
use Livewire\Component;
use Livewire\WithPagination;

class PartTable extends Component
{
    use WithPagination;
    public $dept='all';
    public $type='all';
    public function render()
    {

        if($this->dept=='all')
        $part=Part::orderBy('updated_at','desc')->paginate(5);
        else
        $part=Part::where('department_id','=',$this->dept)->orderBy("updated_at")->paginate(5);


        return view('livewire.admin.part-table',['part'=>$part]);
    }
}

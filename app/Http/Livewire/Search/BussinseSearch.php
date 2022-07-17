<?php

namespace App\Http\Livewire\Search;

use App\Models\Bussinse;
use Livewire\Component;
use Livewire\WithPagination;

class BussinseSearch extends Component
{

    use WithPagination;
    public $search="";
    public $dept=null;
    public $parts=[];
    public $part=null;
    public $pre_page=8;
    public $orderby="updated_at";
    public $ordertype="desc";

    // protected $listeners=[
    //     // 'setDept'=>'set_dept',
    //     // 'setParts'=>'set_parts'
    // ];
    public function getQueryString()
    {

        return ['search'=>$this->search,'page',
        'part'=>$this->part,
        'parts'=>$this->parts,
        'dept'=>$this->dept,
    'ordertype'=>$this->ordertype,'orderby'=>$this->ordertype]; // TODO: Change the autogenerated stub
    }

    protected $queryString=['search','page','parts','dept','part','orderby','ordertype'];

    public function mount($search="",$dept=null,array $parts=[],$part="",$orderby="updated_at",$ordertype="desc")
    {
        $this->search=$search;
        $this->dept=$dept;
        $this->parts=$parts;
        $this->part=$part;
        $this->orderby=$orderby;
        $this->ordertype=$ordertype;
        # code...
    }
    public function render()
    {

        $bussinses=Bussinse::where('name','LIKE','%'.$this->search.'%')
        ->Orwhere('username','Like','%'.$this->search.'%')->Orwhere('note','LIKE','%'.$this->search.'%')->paginate($this->pre_page);
        return view('livewire.search.bussinse-search',compact('bussinses'));
    }
}
<?php

namespace App\Http\Livewire\Search;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithPagination;

class ProductSearch extends Component
{

    use WithPagination;

    public $search="";
    public $dept=null;
    public $parts=array();
    public $part=null;
    public $pre_page=5;

    protected $listeners=[
        'setDept'=>'set_dept',
        'setParts'=>'set_parts'
    ];

    public function mount($search="",$dept=null,$parts=[],$part="")
    {
        $this->search=$search;
        $this->dept=$dept;
        $this->parts=$parts;
        $this->part=$part;
        # code...
    }



    public function set_dept($value)
    {
        $this->dept=$value;
        $this->resetPage('page');

        # code...
    }
    public function set_parts($value)
    {
        $this->parts=$value;
    }



    public function render()
    {
        $products=[];
        $from = date('2018-01-01');
        $to = date('2019-05-02');
        if($this->dept!=null &&$this->dept!='any' ){

            $products=Product::
            with('parts','department','owner:id,name,username,avatar')
            ->withAvg('ratings:value')
            ->withCount('ratings')
            ->where('department_id',"=",$this->dept)
            ->where(function($query){
                $query->where('department_id',"=",$this->dept)->Orwhere(function($query){
                    $query->where('name','LIKE','%'.$this->search.'%')
                    ->Orwhere('discrip','LIKE','%'.$this->search.'%')
                    ->Orwhere('note','LIKE','%'.$this->search.'%')            ->OrwhereBetween('year_created', ['2010', '2019']);
                });
            })->orderBy('updated_at','desc')->paginate($this->pre_page);
        }


        return view('livewire.search.product-search',['products'=>$products]);
    }
}

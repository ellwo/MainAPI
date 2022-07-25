<?php

namespace App\Http\Livewire\Manage;

use App\Models\Bussinse;
use App\Models\Location;
use Livewire\Component;

class BussinseLocation extends Component
{

    public $username;
    public Location $loc;
    public  $phone1='';
    public  $phone2='';
    public  $phone3='';
    public  $update=false;
    public $deleted_loc='no';
    public $editid=-1;
    protected $rules = [
        'loc.id'=>'integer',
        'loc.bussinse_id'=>'required|exists:bussinses',
        'loc.address'=>'required|string',
        'loc.markt_id'=>'required|exists:markt',
    ];
    public function mount($username)
    {
        $this->username=$username;
        $this->loc=new Location();
        # code...
    }


    public function updateloc()
    {
        $this->update=false;
        $p=[];
        if($this->phone1!='')
        $p[]=$this->phone1;
        if($this->phone2!='')
        $p[]=$this->phone2;
        if($this->phone3!='')
        $p[]=$this->phone3;

        $this->loc->phone=$p;
        $this->loc->id=$this->editid;

        $this->loc->update($this->loc->toArray());

        session()->flash('status','تم الحفظ بنجاح');
        $this->loc=new Location();
        $this->phone1='';
        $this->phone2='';
        $this->phone3='';
//        return dd($this->loc);

        # code...
    }
    public function save()
    {
        $bus=Bussinse::where('username','=',$this->username)->first();
        $this->loc->bussinse_id=$bus->id;
        $p=[];
        if($this->phone1!='')
        $p[]=$this->phone1;
        if($this->phone2!='')
        $p[]=$this->phone2;
        if($this->phone3!='')
        $p[]=$this->phone3;
        $this->loc->phone=$p;

        Location::updateOrCreate([
            'address'=>$this->loc->address,
            'markt_id'=>$this->loc->markt_id,
            'bussinse_id'=>$this->loc->bussinse_id,
            'phone'=>$p
        ]);
        session()->flash('status','تم الحفظ بنجاح');
        $this->loc=new Location();
        $this->phone1='';
        $this->phone2='';
        $this->phone3='';

        # code...
    }

    public function edit($loc)
    {
        //$this->update=true;
        $this->editid=$loc['id'];

        $this->loc->id=$loc['id'];
        $this->loc=new Location(
            [
                'address'=>$loc['address'],
                'markt_id'=>$loc['markt_id'],
                'bussinse_id'=>$loc['bussinse_id'],
                'phone'=>$loc['phone'],
                'id'=>$loc['id']
            ]
        );
        foreach($this->loc->phone??[] as $k=>$p )
        {
            switch($k){
                case 0:$this->phone1=$p;
                case 1:$this->phone2=$p;
                case 2:$this->phone3=$p;
            }

        }
    }

    public function deleted_l($id)
    {
       $l= Location::find($id);
       if($l!=null)
       $l->delete();

       session()->flash('status','تم الحذف بنجاح');
        # code...
    }
    public function render()
    {
        $bus=Bussinse::where('username','=',$this->username)->first();
        $locs=$bus->locations;
        return view('livewire.manage.bussinse-location',['locs'=>$locs]);
    }
}

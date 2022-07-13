<?php

namespace App\Http\Livewire;

use App\Models\City;
use Livewire\Component;

class CityMarktSelect extends Component
{ public $city=1;


    function mount($city=1){
        $this->city=$city;

    }
    public function render()
    {

        if($this->city!='any')
        $city=City::with('markts')->where('id',$this->city)->first();
        else
        $city=City::with('markts')->first();


        return view('livewire.city-markt-select',['cityy'=>$city,'mar'=>$city->markts]);
    }


    public function updated()
    {
        $this->emit('setDept',$this->city);
        # code...
    }

    function onCahngeDept($id){
        $this->city=$id;

    }

}

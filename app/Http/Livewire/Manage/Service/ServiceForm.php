<?php

namespace App\Http\Livewire\Manage\Service;

use App\Models\Bussinse;
use App\Models\Service;
use Livewire\Component;

class ServiceForm extends Component
{
    public $step=0;
    public Service $product;
    public $img;
    public $type;
    public $username;

    protected $rules = [
        'product.name' => 'required|string',
        'product.price'=>'required|numeric',
        'product.img'=>'required|string',
        'product.year_created'=>'required|date_format:Y'
    ];
    public function mount($step=0,$username='me')
    {


        $this->step=(int)$step;

        if($username!='me')
        $username=$username;
        else{
            $username=auth()->user()->username;
        }
        $this->username=$username;

        if($this->username==auth()->user()->username)
        $this->type="me";
        else{
        $this->type="bussinse";

    }

        $this->product=new Service();
        # code...
    }
    public function render()
    {

        $parts=null;
        $bussinse=null;
        if($this->type=="bussinse"){

        $bussinse=Bussinse::with('parts')->where("username","=",$this->username)->first();
        $parts=$bussinse->parts;
        }

        return view('manage.service.service-form',['b_parts'=>$parts,'bussinse'=>$bussinse!=null ?$bussinse:''])->layout('components.dashborade.index');
    }

    public function updatedStep($value)
    {
        switch($this->step-1){
            case 0 : if($this->step_0_valdition()==true){
                $this->step=$value;
            }
            else
            $this->step=0;
            break;

        }


        //
    }


    public function step_0_valdition()
    {

        return true;
        # code...
    }







}

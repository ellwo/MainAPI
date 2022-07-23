<?php

namespace App\Http\Livewire\Show;

use App\Models\Bussinse;
use App\Models\Product;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsServeces extends Component
{

    use WithPagination;
    public $proORserv='pro';
    protected $listeners = [
        'load-more-product' => 'more_product',
        'load-more-service'=>'more_service'
    ];

    public $username;
    public $procount=5;
    public $servcount=5;
    public $type='user';
    public $servtotal=0;
    public $prototal=0;


    public function mount($username,$proORserv="pro",$type='user'){
        $this->username=$username;
        $this->proORserv=$proORserv;
        $this->type=$type;
    }

    public function render()
    {


        if($this->type=='user')
        $user=User::where("username","=",$this->username)->first();
        else
        $user=Bussinse::where('username','=',$this->username)->first();







        if($user!=null){


            if($this->proORserv=="pro")
            {

                $products=$user->products()->latest()->paginate($this->procount);


               $this->prototal= $products->total();
               $includescript=true;
               $this->emit('userStore');
        return view('livewire.show.products-serveces',compact('products','includescript'));
            }

            else
            {
                $products=$user->services()->paginate($this->servcount);
                $this->servtotal=$products->total();
                $this->emit('userStore');
                return view('livewire.show.products-serveces',compact('products'));

            }



        }

        // $products=

        return view('livewire.show.products-serveces');
    }


    public function more_product()
    {
        if($this->prototal > $this->procount)
        $this->procount+=5;

    }

    public function more_service()
    {
        if($this->servtotal > $this->servcount)
        $this->servcount+=5;
    }


}

<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;

class AddToCartButton extends Component
{
    public $p;
    public $routename;
    public function mount($p,$routename="product.show")
    {
        $this->p=$p;
        $this->routename=$routename;
        # code...
    }
    public function render()
    {
        return view('livewire.cart.add-to-cart-button');
    }


    public function addtocart($pro,$routename="product.show")
    {
        $this->emit("AddTocart",$pro,$routename);
        # code...
    }
}

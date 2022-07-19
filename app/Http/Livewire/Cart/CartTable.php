<?php

namespace App\Http\Livewire\Cart;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartTable extends Component
{
    public $o=0;
    public function render()
    {
        $cart=Cart::instance("cart")->content();

        return view('livewire.cart.cart-table',["cart"=>$cart]);
    }

    public function removeitem($id)
    {
        Cart::instance("cart")->remove($id);
         $this->emit('Remove',null);

        # code...
    }
}

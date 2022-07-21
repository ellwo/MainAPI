<?php

namespace App\Http\Livewire\Wishlist;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class WishlistTable extends Component
{
    public $o=0;
    public function render()
    {
        $cart=Cart::instance("wishlist")->content();

        return view('livewire.wishlist.wishlist-table',["cart"=>$cart]);
    }

    public function removeitem($id)
    {
        Cart::instance("wishlist")->remove($id);
         $this->emit('Removewishlist',null);

        # code...
    }
}

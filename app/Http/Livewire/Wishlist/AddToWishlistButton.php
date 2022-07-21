<?php

namespace App\Http\Livewire\Wishlist;

use Livewire\Component;

class AddToWishlistButton extends Component
{

    public $p;
    public $routename;
    public function mount($p,$routename="product.show")
    {
        $this->p=$p;
        $this->routename=$routename;
        # code...
    }

    public function addtocart($pro,$routename="product.show")
    {
        $this->emit("AddTowishlist",$pro,$routename);
        # code...
    }
    public function render()
    {
        return view('livewire.wishlist.add-to-wishlist-button');
    }
}

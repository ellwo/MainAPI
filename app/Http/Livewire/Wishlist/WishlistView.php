<?php

namespace App\Http\Livewire\Wishlist;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class WishlistView extends Component
{


    protected $listeners=[
         'AddTowishlist'=>'add',
         'Removewishlist'=>'remove'
        // 'setParts'=>'set_parts'
    ];
    public function render()
    {
        $cart=Cart::instance("wishlist")->content();
        return view('livewire.wishlist.wishlist-view',['cart'=>$cart]);
    }


    public function add($pro,$routename)
    {
        Cart::instance("wishlist")->add(
            $pro["id"],
            $pro["name"],
              1,
              $pro["price"],
              0,
              ['img'=>$pro["img"],
              'owner'=>$pro["owner"],
              'routename'=>$routename
              ]
          );
       // $cartitem=Cart::add($id,)
        # code...
    }

    public function remove($id)
    {
        if($id!=null)
        Cart::instance("wishlist")->remove($id);
        # code...
    }

    public function delete_all()
    {
        # code...
    }

}

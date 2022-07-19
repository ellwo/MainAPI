<?php

namespace App\Http\Livewire\Cart;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartView extends Component
{



    protected $listeners=[
         'AddTocart'=>'add',
         'Remove'=>'remove'
        // 'setParts'=>'set_parts'
    ];
    public function render()
    {
        $cart=Cart::instance("cart")->content();
        return view('livewire.cart.cart-view',['cart'=>$cart]);
    }


    public function add($pro,$routename)
    {
        Cart::instance("cart")->add(
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
        Cart::instance("cart")->remove($id);
        # code...
    }

    public function delete_all()
    {
        # code...
    }
}

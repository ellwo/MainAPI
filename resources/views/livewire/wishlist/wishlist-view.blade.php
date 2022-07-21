<div>
    <div x-data="{opencart:0}" class="blockcart cart-preview active">
        <div class="relative header-cart">
            {{-- <div class="cart-left">
                <div class="shopping-cart"><i class="zmdi zmdi-shopping-cart"></i></div>
                <div class="cart-products-count">0</div>
            </div>
            <div class="cart-right d-flex flex-column align-self-end ml-13">
                <span class="title-cart">سلة الشراء</span>
                <span class="cart-item"> items</span>
            </div>
         --}}
         <a x-on:click="opencart=!opencart"  class="relative p-2" title="My Wishlists">
            <x-bi-heart class="w-16 h-16 text-danger-dark"/>
            <span class="absolute bottom-0 right-0 p-2 rounded-full text-light bg-danger-lighter">{{ $cart->count() }}</span>
         </a>
         <div class="absolute inset-0 w-full h-full text-center bg-white"
         x-transition:enter="transition duration-300 ease-in-out" x-transition:enter-start="opacity-0"
x-transition:enter-end="opacity-100" x-transition:leave="transition duration-300 ease-in-out"
x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
         wire:loading>
        <x-heroicon-s-plus class="w-full h-full text-blue-900 bg-white "/>
        </div>
        </div>
        <div x-show="opencart" x-on:click.away="opencart=0" class="absolute" style="z-index: 1000 !important">
        <ul tabindex="0" class="p-2 bg-white shadow menu dropdown-content dark:bg-dark-eval-1 dark:text-white rounded-box w-52">


            @foreach($cart->take(2) as $c)
        <li>
            <div class="flex mt-3 text-black bg-white rounded-lg">

                <div class="p-4 mx-auto bg-gray-200 rounded-lg">
                    <img  src="{{$c->options->img}}" class="w-32 h-32 bg-blue-900 rounded-full"/>


                    <div class="flex flex-col">
                    <a href="{{ route($c->options->routename, $c->id) }}"  title="{{__('اظهار المنتج ')}}" class="font-bold text-blue-900 cursor-pointer hover:text-red-800 hover:bg-success">
                        {{$c->name}}
                    </a>
                <span class="block mt-1">
                    <span class="p-2 font-bold bg-yellow-400 rounded-full text-darker ">{{$c->price}}/ر.ي</span></span>

                    <span class="block mt-1 ">{{__('الكمية')}}:{{$c->qty}}</span>

                    <a   wire:click="remove('{{$c->rowId}}')"  title="{{__('حذف من السلة')}}" class="font-bold rounded-full cursor-pointer "  >
                        <x-heroicon-s-x class="w-6 h-6 text-red-800"/>
                    </a>
                </div>
                </div>
            </div>

        </li>
            @endforeach
    <li>
        <a href="{{ route('wishlist') }}" class="p-2 font-bold rounded-md cursor-pointer text-darker dark:text-darker border-info">المزيد</a>
    </li>


</ul>
        </div>

    </div>
</div>

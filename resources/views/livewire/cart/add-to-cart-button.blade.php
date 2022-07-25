<div x-data='{showbtn:1}' >
    <div  class="flex w-full h-full cursor-pointer ">
        <a x-show='showbtn' x-on:click='$wire.addtocart({{ $p }},"{{ $routename }}"); showbtn=!showbtn' class="w-full h-full" >

            <div class="flex w-full h-full text-dark ">
                <x-bi-cart-plus-fill class="w-full h-full text-yellow-400"/>
            </div>
        </a>
        <a x-show='!showbtn'  class="w-full h-full" >

            <div class="flex w-full h-full text-dark ">
                <x-bi-cart-check-fill class="w-full h-full text-green-800"/>
            </div>
        </a>

    </div></div>

<div x-data='{showbtn:1}' >
    <div   class="flex w-full h-full cursor-pointer ">
        <a x-show='showbtn' x-on:click='$wire.addtocart({{ $p }},"{{ $routename }}"); showbtn=!showbtn' class="w-full h-full" >

            <div class="flex w-full h-full text-dark ">
                <x-bi-heart class="w-full h-full text-danger"/>
            </div>
        </a>
        <a x-show='!showbtn'  class="w-full h-full" >

            <div class="flex w-full h-full text-dark ">
                <x-bi-heart-fill class="w-full h-full text-danger"/>
            </div>
        </a>

    </div></div>

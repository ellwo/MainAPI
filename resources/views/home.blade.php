@extends('ex.site')



@section('content')

<div id="main">

    <div id="displayTop" class="displaytopthree">
        <div class="container">
            <div class="row">
                <div class="nov-rowl col-lg-12 col-xs-12" ><div class="nov-row-wrap row">
                        <!-- begin /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/novpagemanage/views/source/html.tpl -->
                        <div class="nov-html col-xl-3 col-lg-3 col-md-3">
                            <div class="block">
                                <div class="block_content">

                                </div>
                            </div>
                        </div>



<div id="nov-slider" class="slider-wrapper theme-default col-xl-9 col-lg-9 col-md-9 col-md-12"

data-animSpeed="500"
data-pauseTime="10000"
data-boxRows=2
>
<div class="nov_preload">
   <div class="process-loading active">
       <div class="loader">
           <div class="dot"></div>
           <div class="dot"></div>
           <div class="dot"></div>
       </div>
   </div>
</div>


<div class="nivoSlider">


   @foreach ($ads as $ad)
   <a href="{{ $ad->link }}">
    <img src="{{$ad->img }}"   alt="" title="#htmlcaption_{{ $ad->id }}" />
</a>
   @endforeach

</div>

@foreach ($ads as $ad)
<div id="htmlcaption_{{ $ad->id }}" class="nivo-html-caption relative">
    <div class="absolute bottom-0 w-full bg-m_primary-100 border  rounded-lg p-8 text-light  ">
        <div class="bottom-0">
            <div class="nov-title effect-0 mb-4" >
                {{ $ad->note }}
            </div>
            <div class="nov-html effect-0">
               <button class="rounded-md bg-m_primary hover:bg-darker hover:text-white text-darker p-2"   href="{{ $ad->link }}">
            اذهب
            </button>
            </div>
        </div>
    </div>
</div>
@endforeach




</div>










</div>

</div>
            </div>
        </div>
    </div>








    @include('ex.products-home',['routename'=>'product.show','l_products'=>$l_products,'r_products'=>$r_products])







    @include('ex.products-home',['routename'=>'service.show','l_products'=>$l_service,'r_products'=>$r_service])





































</div>

@endsection

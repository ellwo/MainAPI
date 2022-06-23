@extends('ex.site')



@section('content')

<div id="main">

    <div id="displayTop" class="displaytopthree">
        <div class="container">
            <div class="row">
                <div class="nov-row  col-lg-12 col-xs-12" ><div class="nov-row-wrap row">
                        <!-- begin /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/novpagemanage/views/source/html.tpl -->
                        <div class="nov-html col-xl-3 col-lg-3 col-md-3">
                            <div class="block">
                                <div class="block_content">

                                </div>
                            </div>
                        </div>

<div id="nov-slider" class="slider-wrapper theme-default col-xl-9 col-lg-9 col-md-9 col-md-12"
data-effect="random"
data-slices="15"
data-animSpeed="500"
data-pauseTime="10000"
data-startSlide="0"
data-directionnav="false"
data-controlNav="true"
data-controlNavThumbs="false"
data-pauseOnHover="true"
data-manualAdvance="false"
data-randomStart="false">
<div class="nov_preload">
   <div class="process-loading active">
       <div class="loader">
           <div class="dot"></div>
           <div class="dot"></div>
           <div class="dot"></div>
           <div class="dot"></div>
           <div class="dot"></div>
       </div>
   </div>
</div>
<div class="nivoSlider">
   <a href="#">
       <img src="http://demo.bestprestashoptheme.com/savemart/modules/novnivoslider/images/266cf50ba4d1d91fa5f5ded20bb66ea38de3b350_1.jpg" alt="" title="#htmlcaption_42" />
   </a>
   <a href="#">
       <img src="http://demo.bestprestashoptheme.com/savemart/modules/novnivoslider/images/62896aebffd6fdce749d957fc76bd83d734fa338_2.jpg" alt="" title="#htmlcaption_43" />
   </a>
   <a href="#">
       <img src="http://demo.bestprestashoptheme.com/savemart/modules/novnivoslider/images/195d62088850e3489886855b4239edcc4fb1868f_3.jpg" alt="" title="#htmlcaption_57" />
   </a>
</div>
<div id="htmlcaption_42" class="nivo-html-caption">
   <div class="nov-slider-ct">
       <div class="nov-center slider-none">
           <div class="nov-title effect-0" >
               Slide Home 3 01
           </div>
           <div class="nov-description effect-0" >
               <p>Slide Home 3 01</p>
           </div>
           <div class="nov-html effect-0">
               <p>Slide Home 3 01</p>
           </div>
       </div>
   </div>
</div>
<div id="htmlcaption_43" class="nivo-html-caption">
   <div class="nov-slider-ct">
       <div class="nov-center slider-none">
           <div class="nov-title effect-0" >
               Slide Home 3 02
           </div>
           <div class="nov-description effect-0" >
               <p>Slide Home 3 02</p>
           </div>
           <div class="nov-html effect-0">
               <p>Slide Home 3 02</p>
           </div>
       </div>
   </div>
</div>
<div id="htmlcaption_57" class="nivo-html-caption">
   <div class="nov-slider-ct">
       <div class="nov-center slider-none">
           <div class="nov-title effect-0" >
               Slider Home 3 03
           </div>
           <div class="nov-description effect-0" >
               <p>Slider Home 3 03</p>
           </div>
           <div class="nov-html effect-0">
               <p>Slider Home 3 03</p>
           </div>
       </div>
   </div>
</div>
</div>

</div>

</div>
            </div>
        </div>
    </div>








    @include('ex.products-home',['l_products'=>$l_products,'r_products'=>$r_products])







    @include('ex.products-home',['l_products'=>$l_service,'r_products'=>$r_service])





































</div>

@endsection

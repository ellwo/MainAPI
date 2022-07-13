@extends('ex.site')


@section('header')
    @include('ex.header')
@endsection




@section('content')
    <div id="wapper-site" class="mx-8 rounded-xl dark:bg-darker dark:text-white ">

        {{-- - هنا القائمة التي تظهر فوق تفاصل المنتج --}}
        <nav data-depth="3" class="breadcrumb-bg">
            <div class="container no-index">
                <div class="breadcrumb">

                    <ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                            <a itemprop="item" href="https://demo.bestprestashoptheme.com/savemart/ar/">
                                <span itemprop="name">الصفحة الرئيسية</span>
                            </a>
                            <meta itemprop="position" content="1">
                        </li>
                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                            <a itemprop="item" href="https://demo.bestprestashoptheme.com/savemart/ar/9-smartphone-tablet">
                                <span itemprop="name">Smartphone &amp; Tablet</span>
                            </a>
                            <meta itemprop="position" content="2">
                        </li>
                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                            <a itemprop="item"
                                href="https://demo.bestprestashoptheme.com/savemart/ar/smartphone-tablet/1-40-hummingbird-printed-t-shirt.html#/الحجم-ص/اللون_-رمادي_داكن">
                                <span itemprop="name">Nullam sed sollicitudin mauris</span>
                            </a>
                            <meta itemprop="position" content="3">
                        </li>
                    </ol>

                </div>
            </div>


        </nav>
        {{-- - هنا القائمة التي  نهايتة التاق تظهر فوق تفاصل المنتج --}}


        <div class="no-index">
            <div id="content-wrapper">

                <section id="main">
                    {{-- <meta itemprop="url" content="https://demo.bestprestashoptheme.com/savemart/ar/home-appliance/6-nullam-tempor-orci-eu-pretium.html"> --}}

                    <div class="product-detail-top">
                        <div class="container">



                            <div class="row main-productdetail" data-product_layout_thumb="bottom_thumb"
                                style="position: relative;">
                                <div class="col-lg-5 col-md-4 col-xs-12 box-image">

                                    <section class="page-content" id="content">



                                        <div class="images-container bottom_thumb" x-data='{img:"{{ $product->img }}"}'>


                                            {{-- هنا االصورة صورة العر --}}

                                            <div class="product-cover">
                                                <img class="" :src="img" alt="" title=""
                                                    style="width:100%;" itemprop="image">
                                                {{-- <div class="layer hidden-sm-down" data-toggle="modal" data-target="#product-modal">
                                    <i class="fa fa-expand"></i>
                                </div> --}}
                                            </div>



                                            <div class="">
                                                <div class="">
                                                    <div class="">
                                                        <div class="flex flex-wrap space-x-4 space-y-4 text-center ">

                                                            {{-- -هنا الصور الي تحت --}}


                                                            @foreach ($product->imgs as $img)
                                                                <div class="h-32 mt-2 ml-2">
                                                                    <img @click="img='{{ $img }}'"
                                                                        class="w-full h-full" src="{{ $img }}"
                                                                        alt="" title="">
                                                                </div>
                                                            @endforeach

                                                            {{-- <div class="item thumb-container slick-slide slick-cloned"
                                                data-slick-index="-3" aria-hidden="true" style="width: 120px;"
                                                tabindex="-1">
                                                <img class="img-fluid thumb js-thumb "
                                                    data-image-medium-src="https://demo.bestprestashoptheme.com/savemart/51-medium_default/nullam-tempor-orci-eu-pretium.jpg"
                                                    data-image-large-src="https://demo.bestprestashoptheme.com/savemart/51-large_default/nullam-tempor-orci-eu-pretium.jpg"
                                                    src="https://demo.bestprestashoptheme.com/savemart/51-medium_default/nullam-tempor-orci-eu-pretium.jpg"
                                                    alt="" title="" itemprop="image">
                                            </div>
                                            <div class="item thumb-container slick-slide slick-cloned"
                                                data-slick-index="-2" aria-hidden="true" style="width: 120px;"
                                                tabindex="-1">
                                                <img class="img-fluid thumb js-thumb "
                                                    data-image-medium-src="https://demo.bestprestashoptheme.com/savemart/52-medium_default/nullam-tempor-orci-eu-pretium.jpg"
                                                    data-image-large-src="https://demo.bestprestashoptheme.com/savemart/52-large_default/nullam-tempor-orci-eu-pretium.jpg"
                                                    src="https://demo.bestprestashoptheme.com/savemart/52-medium_default/nullam-tempor-orci-eu-pretium.jpg"
                                                    alt="" title="" itemprop="image">
                                            </div>
                                            <div class="item thumb-container slick-slide slick-cloned"
                                                data-slick-index="-1" aria-hidden="true" style="width: 120px;"
                                                tabindex="-1">
                                                <img class="img-fluid thumb js-thumb "
                                                    data-image-medium-src="https://demo.bestprestashoptheme.com/savemart/53-medium_default/nullam-tempor-orci-eu-pretium.jpg"
                                                    data-image-large-src="https://demo.bestprestashoptheme.com/savemart/53-large_default/nullam-tempor-orci-eu-pretium.jpg"
                                                    src="https://demo.bestprestashoptheme.com/savemart/53-medium_default/nullam-tempor-orci-eu-pretium.jpg"
                                                    alt="" title="" itemprop="image">
                                            </div>
                                            <div class="item thumb-container slick-slide" data-slick-index="0"
                                                aria-hidden="true" style="width: 120px;" tabindex="-1">
                                                <img class="img-fluid thumb js-thumb selected"
                                                    data-image-medium-src="https://demo.bestprestashoptheme.com/savemart/49-medium_default/nullam-tempor-orci-eu-pretium.jpg"
                                                    data-image-large-src="https://demo.bestprestashoptheme.com/savemart/49-large_default/nullam-tempor-orci-eu-pretium.jpg"
                                                    src="https://demo.bestprestashoptheme.com/savemart/49-medium_default/nullam-tempor-orci-eu-pretium.jpg"
                                                    alt="" title="" itemprop="image">
                                            </div>
                                            <div class="item thumb-container slick-slide" data-slick-index="1"
                                                aria-hidden="true" style="width: 120px;" tabindex="-1">
                                                <img class="img-fluid thumb js-thumb"
                                                    data-image-medium-src="https://demo.bestprestashoptheme.com/savemart/50-medium_default/nullam-tempor-orci-eu-pretium.jpg"
                                                    data-image-large-src="https://demo.bestprestashoptheme.com/savemart/50-large_default/nullam-tempor-orci-eu-pretium.jpg"
                                                    src="https://demo.bestprestashoptheme.com/savemart/50-medium_default/nullam-tempor-orci-eu-pretium.jpg"
                                                    alt="" title="" itemprop="image">
                                            </div>
                                            <div class="item thumb-container slick-slide slick-current slick-active"
                                                data-slick-index="2" aria-hidden="false" style="width: 120px;"
                                                tabindex="0">
                                                <img class="img-fluid thumb js-thumb"
                                                    data-image-medium-src="https://demo.bestprestashoptheme.com/savemart/51-medium_default/nullam-tempor-orci-eu-pretium.jpg"
                                                    data-image-large-src="https://demo.bestprestashoptheme.com/savemart/51-large_default/nullam-tempor-orci-eu-pretium.jpg"
                                                    src="https://demo.bestprestashoptheme.com/savemart/51-medium_default/nullam-tempor-orci-eu-pretium.jpg"
                                                    alt="" title="" itemprop="image">
                                            </div>
                                            <div class="item thumb-container slick-slide slick-active"
                                                data-slick-index="3" aria-hidden="false" style="width: 120px;"
                                                tabindex="0">
                                                <img class="img-fluid thumb js-thumb"
                                                    data-image-medium-src="https://demo.bestprestashoptheme.com/savemart/52-medium_default/nullam-tempor-orci-eu-pretium.jpg"
                                                    data-image-large-src="https://demo.bestprestashoptheme.com/savemart/52-large_default/nullam-tempor-orci-eu-pretium.jpg"
                                                    src="https://demo.bestprestashoptheme.com/savemart/52-medium_default/nullam-tempor-orci-eu-pretium.jpg"
                                                    alt="" title="" itemprop="image">
                                            </div>
                                            <div class="item thumb-container slick-slide slick-active"
                                                data-slick-index="4" aria-hidden="false" style="width: 120px;"
                                                tabindex="0">
                                                <img class="img-fluid thumb js-thumb "
                                                    data-image-medium-src="https://demo.bestprestashoptheme.com/savemart/53-medium_default/nullam-tempor-orci-eu-pretium.jpg"
                                                    data-image-large-src="https://demo.bestprestashoptheme.com/savemart/53-large_default/nullam-tempor-orci-eu-pretium.jpg"
                                                    src="https://demo.bestprestashoptheme.com/savemart/53-medium_default/nullam-tempor-orci-eu-pretium.jpg"
                                                    alt="" title="" itemprop="image">
                                            </div>
                                            <div class="item thumb-container slick-slide slick-cloned slick-active"
                                                data-slick-index="5" aria-hidden="false" style="width: 120px;"
                                                tabindex="-1">
                                                <img class="img-fluid thumb js-thumb"
                                                    data-image-medium-src="https://demo.bestprestashoptheme.com/savemart/49-medium_default/nullam-tempor-orci-eu-pretium.jpg"
                                                    data-image-large-src="https://demo.bestprestashoptheme.com/savemart/49-large_default/nullam-tempor-orci-eu-pretium.jpg"
                                                    src="https://demo.bestprestashoptheme.com/savemart/49-medium_default/nullam-tempor-orci-eu-pretium.jpg"
                                                    alt="" title="" itemprop="image">
                                            </div>
                                            <div class="item thumb-container slick-slide slick-cloned"
                                                data-slick-index="6" aria-hidden="true" style="width: 120px;"
                                                tabindex="-1">
                                                <img class="img-fluid thumb js-thumb "
                                                    data-image-medium-src="https://demo.bestprestashoptheme.com/savemart/50-medium_default/nullam-tempor-orci-eu-pretium.jpg"
                                                    data-image-large-src="https://demo.bestprestashoptheme.com/savemart/50-large_default/nullam-tempor-orci-eu-pretium.jpg"
                                                    src="https://demo.bestprestashoptheme.com/savemart/50-medium_default/nullam-tempor-orci-eu-pretium.jpg"
                                                    alt="" title="" itemprop="image">
                                            </div>
                                            <div class="item thumb-container slick-slide slick-cloned"
                                                data-slick-index="7" aria-hidden="true" style="width: 120px;"
                                                tabindex="-1">
                                                <img class="img-fluid thumb js-thumb "
                                                    data-image-medium-src="https://demo.bestprestashoptheme.com/savemart/51-medium_default/nullam-tempor-orci-eu-pretium.jpg"
                                                    data-image-large-src="https://demo.bestprestashoptheme.com/savemart/51-large_default/nullam-tempor-orci-eu-pretium.jpg"
                                                    src="https://demo.bestprestashoptheme.com/savemart/51-medium_default/nullam-tempor-orci-eu-pretium.jpg"
                                                    alt="" title="" itemprop="image">
                                            </div>
                                            <div class="item thumb-container slick-slide slick-cloned"
                                                data-slick-index="8" aria-hidden="true" style="width: 120px;"
                                                tabindex="-1">
                                                <img class="img-fluid thumb js-thumb "
                                                    data-image-medium-src="https://demo.bestprestashoptheme.com/savemart/52-medium_default/nullam-tempor-orci-eu-pretium.jpg"
                                                    data-image-large-src="https://demo.bestprestashoptheme.com/savemart/52-large_default/nullam-tempor-orci-eu-pretium.jpg"
                                                    src="https://demo.bestprestashoptheme.com/savemart/52-medium_default/nullam-tempor-orci-eu-pretium.jpg"
                                                    alt="" title="" itemprop="image">
                                            </div>
                                            <div class="item thumb-container slick-slide slick-cloned"
                                                data-slick-index="9" aria-hidden="true" style="width: 120px;"
                                                tabindex="-1">
                                                <img class="img-fluid thumb js-thumb "
                                                    data-image-medium-src="https://demo.bestprestashoptheme.com/savemart/53-medium_default/nullam-tempor-orci-eu-pretium.jpg"
                                                    data-image-large-src="https://demo.bestprestashoptheme.com/savemart/53-large_default/nullam-tempor-orci-eu-pretium.jpg"
                                                    src="https://demo.bestprestashoptheme.com/savemart/53-medium_default/nullam-tempor-orci-eu-pretium.jpg"
                                                    alt="" title="" itemprop="image">
                                            </div> --}}
                                                        </div>
                                                    </div>




                                                </div>
                                            </div>

                                        </div>



                                    </section>

                                </div>

                                <div class="col-lg-7 col-md-8 col-xs-12 mt-sm-20">
                                    <div class="product-information">
                                        <div class="product-actions">

                                            <div class="row">
                                                <input type="hidden" name="token"
                                                    value="28add935523ef131c8432825597b9928">
                                                <input type="hidden" name="id_product" value="6"
                                                    id="product_page_product_id">
                                                <input type="hidden" name="id_customization" value="0"
                                                    id="product_customization_id">
                                                <div class="productdetail-right col-12 col-lg-6 col-md-6">
                                                    <div class="product-reviews">
                                                        <div id="product_comments_block_extra">

                                                            <div class="flex space-x-2 space-y-2 border rounded-lg">
                                                                <div class="py-2 mx-4 rounded-full">
                                                                    <img class="w-32 h-32 rounded-full"
                                                                        src="{{ $product->owner->avatar }}">
                                                                </div>
                                                                <div class="">
                                                                    <a href="#"><span
                                                                            class="font-bold text-darker dark:text-white">{{ $product->owner->name }}</span>
                                                                        <br>
                                                                        <span class="font-normal text-info">
                                                                            {{ '@' . $product->owner->username }}
                                                                        </span>
                                                                    </a>
                                                                </div>

                                                            </div>

                                                            <div class="comments_note">
                                                                <span>التقييم: </span>
                                                                <div class="clearfix star_content">
                                                                    @php
                                                                        $count = (int) $product->ratings_value_avg;
                                                                    @endphp
                                                                    @for ($i = 1; $i <= $count; $i++)
                                                                        <div class="star star_on"></div>
                                                                    @endfor
                                                                    @for ($i = 0; $i < 5 - $count; $i++)
                                                                        <div class="star">

                                                                        </div>
                                                                    @endfor
                                                                </div>
                                                            </div>


                                                            <div class="comments_advices">
                                                                <a class="open-comment-form" data-toggle="modal"
                                                                    data-target="#new_comment_form" href="#"><i
                                                                        class="fa fa-edit"></i>Write your review</a>
                                                            </div>
                                                        </div>


                                                        <!--  /Module NovProductComments -->

                                                    </div>

                                                    <h1 class="detail-product-name" itemprop="name">{{ $product->name }}
                                                    </h1>



                                                    <div
                                                        class="group-price d-flex justify-content-start align-items-center">

                                                        <div class="product-prices">


                                                            <div class="product-price ">

                                                                <div class="mt-4 current-price">

                                                                    <span
                                                                        class="p-2 font-bold bg-yellow-400 rounded-full text-darker">{{ $product->price . '\ر.ي' }}</span>
                                                                </div>



                                                            </div>













                                                        </div>

                                                    </div>



                                                    <hr>


                                                    <div class="mt-4 space-y-4 in_border dark:text-white end">

                                                        <div class=" dark:text-white">
                                                            <label class=" dark:text-white"><span class="p-2 border rounded-xl">القسم:</span></label>
                                                            <div>
                                                                <span class="dark:text-white"><a href="#">
                                                                        {{ $product->department != null ? $product->department->name : '' }}</a>
                                                                </span>

                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="flex flex-row">
                                                            <label class="dark:text-white"><span class="p-2 border rounded-xl">الفئات:</span></label>
                                                            <div class="flex flex-wrap space-y-2">
                                                                @foreach ($product->parts as $p)
                                                                    <a href="#" class="m-2 my-2"><span
                                                                            class="p-2 m-2 rounded-full hover:bg-m_primary-dark hover:text-light bg-m_primary text-darker">{{ $p->name }}</span></a>
                                                                @endforeach
                                                            </div>
                                                        </div>

                                                    </div>
<hr>
                                                    <div class="flex flex-col mt-4 mb-16">
                                                        <label class="dark:text-white "><span class="p-2 border rounded-xl">الوصف:</span></label>

                                                        <div x-data='{openmore:false}' x-transition :class="{'h-32 pb-12 overflow-y-hidden mb-14':!openmore}" class="relative transition-all ">

                                                            <p >




                                                                @php
                                                                echo $product->discrip;

                                                            @endphp







{{--


                                                              @php
                                                               $ccount=strlen( $product->discrip);

                                                               $beg='';

                                                               if($ccount>50)
                                                               $beg=substr($product->discrip,0,50);

                                                            @endphp



                                                                @php
                                                                echo $beg."<span x-show='!openmore' x-on:click='openmore=true' class='text-info '> ... المزيد</span>";

                                                            @endphp
                                                            <div x-show="openmore">

                                                                @php
                                                                         echo substr($product->discrip,50,(strlen($product->discrip)-1));

                                                                @endphp

                                                            </div> --}}

                                                        </p>
                                                        <div x-show="openmore"><br></div>
                                                        <div x-show='openmore==false' x-on:click='openmore=true' class="absolute left-0 z-40 justify-end underline bg-white cursor-pointer top-24 text-info ">...المزيد</div>
                                                        <div x-show="openmore" x-on:click='openmore=false' class="absolute bottom-0 left-0 right-0 z-40 justify-end underline bg-white cursor-pointer text-m_primary-100">...اخفاء</div>

                                                    </div>
                                                    </div>
                                                    <div id="_desktop_productcart_detail">
                                                        <div class="product-add-to-cart in_border">
                                                            <div class="add">
                                                                <button class="btn btn-primary add-to-cart"
                                                                    data-button-action="add-to-cart" type="submit">
                                                                    <div class="icon-cart">
                                                                        <i class="shopping-cart"></i>
                                                                    </div>
                                                                    <span>أضف للسلة</span>
                                                                </button>
                                                            </div>

                                                            <a class="addToWishlist wishlistProd_6" href="#"
                                                                data-rel="6"
                                                                onclick="WishlistCart('wishlist_block_list', 'add', '6', false, 1); return false;">
                                                                <i class="fa fa-heart"></i>
                                                                <span>Add to Wishlist</span>
                                                            </a>

                                                            <div class="clearfix"></div>

                                                            <div id="product-availability" class="mt-20 info-stock">
                                                                <label class="control-label">Availability:</label>
                                                                in stock
                                                                <i class="fa fa-check-square-o" aria-hidden="true"></i>
                                                            </div>


                                                            <p class="mt-20 product-minimal-quantity">
                                                            </p>

                                                        </div>
                                                    </div>









                                                </div>
                                                <div class="productdetail-left col-12 col-lg-6 col-md-6">


                                                    <div class="product-quantity">
                                                        <span class="control-label">الكميَّة : </span>
                                                        <div class="qty">
                                                            <div class="input-group bootstrap-touchspin"><span
                                                                    class="input-group-addon bootstrap-touchspin-prefix"
                                                                    style="display: none;"></span><input type="text"
                                                                    name="qty" id="quantity_wanted" value="1"
                                                                    class="input-group form-control" min="1"
                                                                    style="display: block;"><span
                                                                    class="input-group-addon bootstrap-touchspin-postfix"
                                                                    style="display: none;"></span><span
                                                                    class="input-group-btn-vertical"><button
                                                                        class="btn btn-touchspin js-touchspin bootstrap-touchspin-up"
                                                                        type="button"><i
                                                                            class="material-icons touchspin-up"></i></button><button
                                                                        class="btn btn-touchspin js-touchspin bootstrap-touchspin-down"
                                                                        type="button"><i
                                                                            class="material-icons touchspin-down"></i></button></span>
                                                            </div>
                                                        </div>
                                                    </div>






                                                    <div id="_mobile_productcart_detail"></div>

                                                    <div class="productbuttons">
                                                        <div class="tabs">











                                                            <h4 class="dark:text-white ">
                                                                معلومات عن البائع
                                                            </h4>

                                                            <div class="flex flex-col space-x-2 space-y-2 border rounded-lg">
                                                                <div class="py-2 mx-4 rounded-full">
                                                                    <img class="w-32 h-32 rounded-full"
                                                                        src="{{ $product->owner->avatar }}">
                                                                </div>
                                                                <div class="">
                                                                    <a href="#"><span
                                                                            class="font-bold text-darker dark:text-white">{{ $product->owner->name }}</span>
                                                                        <br>
                                                                        <span class="font-normal text-info">
                                                                            {{ '@' . $product->owner->username }}
                                                                        </span>
                                                                    </a>


                                                                    <div class="seller_info">


                                                                        @if ($product->owner_type=="App\Models\Bussinse")

                                                                        @php
                                                                            $count=(int)$product->owner->ratingsAvg_();
                                                                        @endphp

                                                                        <div class="average_rating">
                                                                            <a href="https://demo.bestprestashoptheme.com/savemart/ar/jmarketplace/2_taylor-jonson/comments"
                                                                                title="View comments about Taylor Jonson">
                                                                                @for ($i = 1; $i <= $count; $i++)
                                                                                <div class="star star_on"></div>
                                                                            @endfor
                                                                            @for ($i = 0; $i < 5 - $count; $i++)
                                                                                <div class="star">

                                                                                </div>
                                                                            @endfor
                                                                            (0)
                                                                            </a>
                                                                        </div>
                                                                        @endif
                                                                    </div>




                                                                </div>

                                                                <p class="link_seller_profile">
                                                                    <button>
                                                                    <a
                                                                        href="
                                                                        @if ($product->owner_type=="App\Models\Bussinse")
                                                                                       {{ route('b.show',$product->owner->username) }}

                                                                                       @else
                                                                                       {{ route('profile.show',$product->owner->username) }}

                                                                                       @endif
                                                                                       ">
                                                                        <i class="icon-user fa fa-user"></i>
                                                                       <span class="dark:text-white"> زيارة حساب البائع</span>
                                                                    </a>
                                                                    </button>
                                                                </p>
                                                                <p class="">

                                                                    <form method="POST" action="{{ route('create_chatroom') }}">
                                                                        @csrf
                                                                        <input type="hidden" name="type"
                                                                        value="@if ($product->owner_type=="App\Models\Bussinse")
                                                                        Bussinse
                                                                        @else
                                                                            User
                                                                        @endif"
                                                                        />
                                                                        <input type="hidden" name="chatable_id" value="{{ $product->owner->username }}"/>

                                                                        <button type="submit">
                                                                        <a title="Contact seller">
                                                                        <i class="fa fa-comment"></i>
                                                                        تواصل الان مع البائع
                                                                    </a>
                                                                        </button>
                                                                    </form>
                                                                </p>

                                                            </div>


                                                        </div>


                                                        <div class="dropdown social-sharing">
                                                            <button class="btn btn-link" type="button"
                                                                id="social-sharingButton" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                <span><i class="fa fa-share-alt"
                                                                        aria-hidden="true"></i>Share With
                                                                    :</span>
                                                            </button>
                                                            <div class="dropdown-menu"
                                                                aria-labelledby="social-sharingButton">
                                                                <a class="dropdown-item"
                                                                    href="http://www.facebook.com/sharer.php?u={{ route('product.show',$product) }}"
                                                                    title="مشاركة" target="_blank"><i
                                                                        class="fa fa-facebook"></i>Facebook</a>
                                                                <a class="dropdown-item"
                                                                    href="https://twitter.com/intent/tweet?text={{$product->name."  " .route('product.show',$product) }}"
                                                                    title="تغريدة" target="_blank"><i
                                                                        class="fa fa-twitter"></i>تغريدة</a>

                                                            </div>
                                                        </div>


                                                        <a class="btn btn-link" href="javascript:print();">
                                                            <span><i class="fa fa-print"
                                                                    aria-hidden="true"></i>Print</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex flex-col justify-around w-3/4 mx-auto"
                                                x-data="{ tap: 2 }">

                                                <div class="flex m-4 mx-auto space-x-4">
                                                    <button type="button" x-on:click="tap=1"
                                                        :class="{
                                                            'border-2 border-info bg-m_primary-dark hover:bg-m_primary hover:text-dark dark:bg-m_primary dark:text-dark': tap ==
                                                                1
                                                        }"
                                                        class="p-3 mx-8 text-xl font-bold border rounded-full cursor-pointer ">
                                                        الخصائص
                                                    </button>
                                                    <button type="button" x-on:click="tap=2"
                                                        :class="{
                                                            'border-2 bg-m_primary-dark hover:bg-m_primary hover:text-dark dark:bg-m_primary dark:text-dark border-info': tap ==
                                                                2
                                                        }"
                                                        class="p-3 text-xl font-bold border rounded-full cursor-pointer ">
                                                        التقييم
                                                    </button>


                                                </div>


                                                <div x-show="tap==1" class="flex flex-col border border-b-0 rounded-md">


                                                    @foreach ($product->note as $k => $v)
                                                        <div class="flex justify-start space-x-2">
                                                            <div class="w-1/4 h-full px-2 font-bold border-l-2 text-info">
                                                                {{ $k }}

                                                            </div>
                                                            <div class="w-3/4 px-2">
                                                                {{ $v }}

                                                            </div>

                                                        </div>
                                                        <hr class="dark:border-m_primary-50" />
                                                    @endforeach


                                                </div>


                                                <div x-show="tap==2" class="flex flex-col border border-b-0 rounded-md " x-data='rate()'>
                                                    <div x-init="onit"></div>

                                                    <x-perfect-scrollbar as="div" aria-label="main" class="h-64 px-3">


                                                        @foreach ($product->ratings()->with("model")->orderBy("updated_at","desc")->take(5)->get() as $rate)

                                                            <div class="flex space-x-2">
                                                                <div class="flex flex-col w-1/4 h-full px-2 font-bold border-l-2 text-info">

                                                                   <span  class="flex p-4 mx-auto space-x-2 text-4xl text-center rounded-full bg-info-100">
                                                                    {{ $rate->value }}

                                                                <x-heroicon-s-star class="w-8 h-8 text-yellow-500"/>
                                                                </span>
{{--
                                                               <span class="text-lg text-dark" x-text='ratee.model.name'></span> --}}

                                                                </div>
                                                                <div  class="relative w-3/4 p-4">
                                                                    <span >{{ $rate->comment }}</span>
                                                                    <span class="absolute left-0 px-2 text-lg font-bold border rounded-full border-info-darker bottom-1 text-info-darker">
                                                                        {{ $rate->updated_at }}

                                                                    </span>
                                                                </div>

                                                            </div>
                                                            <hr class="dark:border-m_primary-50" />

                                                        @endforeach
                                                    </x-perfect-scrollbar>
                                                    <hr>

                                                    <div class="flex flex-col p-4 mt-12 space-y-4 border rounded-lg" >
                                                       <form x-on:submit.prevent="submitForm">
                                                        <h1 class="text-4xl font-bold text-darker">اضف تقييمك </h1>

                                                        <div class="flex mx-auto text-center" >


                                                            <div x-show="show_r">
                                                            </div>



                                                            <template x-for="i in selected" key="i">

                                                                <div x-init=" if(ii<5) ii=i+1;">

                                                                    <x-heroicon-s-star  x-on:click="show_r=true" x-on:mousemove="if(show_r!=true) { unselected=5-i; selected=5-unselected;}" class="w-12 h-12 mx-2 text-yellow-600"/>
                                                                    </div>
                                                            </template>



                                                            <template x-for="i in 5-selected">


                                                                    <div >
                                                                    <x-heroicon-o-star x-on:mousemove="if(show_r!=true) {unselected=5-ii; selected=5-unselected;}" class="w-12 h-12 mx-2 text-yellow-600"/>
                                                                    </div>



                                                            </template>


{{--
                                                            <template x-for="i in 5-unselected">
                                                                <div>
                                                                    <span x-text="i"></span>
                                                                    <x-heroicon-s-star class="w-12 h-12 mx-2 text-yellow-600"/>
                                                                    </div>
                                                                </template>
                                                          <template x-for="i in 5-selected">
                                                            <div>
                                                                <h1 x-text="selected"></h1>
                                                            <span x-text="i"></span>
                                                            <x-heroicon-o-star x-on:mousemove="unselected=5-i; selected=5-unselected" class="w-12 h-12 mx-2 text-yellow-600"/>
                                                            </div>

                                                      </template> --}}

                                                        </div>
                                                        <textarea x-model='comment' rows="3" placeholder="اكتب تعليقك" class="w-full rounded-lg text-darker dark:text-darker">

                                                        </textarea>

                                                        <div class="flex">
                                                        <button type="submit" class="p-4 mx-auto text-white bg-blue-500 rounded-full">

                                                            تعليق
                                                        </button>
                                                        </div>

                                                       </form>

                                                        @section('script')
                                                        <script>

                                                            const FORM_URL="{{ route('product.rate') }}";

                                                            function rate(){

                                                                return {
                                                                    selected:0,
                                                                    unselected:5,
                                                                    ii:1,
                                                                    show_r:false,
                                                                    comment:'',


                                                                    submitForm() {

            fetch(FORM_URL, {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
              "Accept": "application/json",
              'X-CSRF-TOKEN': '{{csrf_token()}}'

            },
            body: JSON.stringify({'product_id':"{{ $product->id }}","value":this.selected,"comment":this.comment}),


          }).then(response=>{
              if(!response.ok){
            //   this.formMessage="اعدالمحاولة";
            console.log(response)
              return null;
              }
              return response.json()
          }).then(data => {
              if(data!=null){

              if(data.status==true){

                this.comment='';
                // this.formMessage=data.message;
                // this.showbutton=false;

              }
              else{

                // this.formMessage=data.message;

              }


              }
              console.log(data);

            }).catch((e) => {
                console.log(e);
            });

        }
                                                                }



                                                            }



                                                        </script>

                                                        @endsection

                                                    </div>























                                                </div>


                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </section>

















                {{-- هنا المشابهه --}}





































            </div>
        </div>

    </div>





@endsection

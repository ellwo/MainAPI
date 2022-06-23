
    <section id="content" class="page-home  pagehome-three">
        <x-button @click="setColors('mycolor')">
            Dark

        </x-button>
        <div class="container">
            <div class="row">

    <div class="nov-row   col-lg-12 col-xs-12" ><div class="nov-row-wrap row">
        <!-- begin /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/novpagemanage/views/source/countdown_product.tpl -->
        <div class="nov-productlist nov-countdown-productlist col-xl-4 col-lg-4 col-md-4  col-xs-12 col-md-12">
            <div class="block block-product clearfix">
                <h2 class="title_block">
                    FLASH DEALS
                </h2>
                <div class="block_content">
                    <div id="productlist706506225" class="product_list countdown-productlist countdown-column-1 owl-carousel owl-theme" data-autoplay="false" data-autoplayTimeout="6000" data-loop="false" data-margin="30" data-dots="false" data-nav="true" data-items="1" data-items_large="1" data-items_tablet="2" data-items_mobile="1">







                        @foreach ($r_products as $product)



                        <div class="item item-list">
                            <div class="product-miniature js-product-miniature first_item" data-id-product="{{ $product->id }}" data-id-product-attribute="{{ $product->id }}" itemscope itemtype="http://schema.org/Product">



                                <div class="thumbnail-container">

                                    <a href="http://demo.bestprestashoptheme.com/savemart/ar/home-appliance/12-232-nam-volutpat-justo-a-vehicula.html#/1-الحجم-ص/11-اللون_-اسود" class="thumbnail product-thumbnail two-image">
                                        <img class="img-fluid image-cover" src = "{{ $product->img }}"
                                             alt = ""
                                             data-full-size-image-url = "http://demo.bestprestashoptheme.com/savemart/79-large_default/nam-volutpat-justo-a-vehicula.jpg"
                                             width="600"
                                             height="600"
                                        >
                                        <img
                                            class="img-fluid image-secondary"
                                            src = "{{ $product->imgs[0] }}"
                                            alt = ""
                                            data-full-size-image-url = "http://demo.bestprestashoptheme.com/savemart/80-large_default/nam-volutpat-justo-a-vehicula.jpg"
                                            width="600"
                                            height="600"
                                        >
                                    </a>


                                    {{-- <div class="product-flags discount">Sale</div> --}}




                                </div>


                                <div class="product-description">
                                    <div class="product-groups">

                                        <div class="product-title" itemprop="name"><a >{{ $product->name }}</a></div>


                                        <!-- begin modules/novproductcomments/novproductcomments_reviews.tpl -->
                                        <div class="product-comments">
                                            <div class="star_content">




                                                @php
                                                    $count=(int)$product->ratingsAvg();
                                                @endphp
                                                @for($i = 1; $i <=$count; $i++)

                                                <div class="star star_on"></div>
                                                @endfor
                                                @for ($i=0; $i<5-$count; $i++)

                                                <div class="star"></div>
                                                @endfor


                                            </div>
                                            <span>{{ $product->ratingsCount()." تقييم" }}</span>
                                        </div>
                                        <!-- end modules/novproductcomments/novproductcomments_reviews.tpl -->

                                        <!-- begin /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/jmarketplace/views/templates/hook/product-list.tpl -->
                                        <p class="seller_name">
                                            <a title="View seller profile" >
                                                <i class="fa fa-user"></i>
                                                {{ $product->owner->name }}
                                            </a>
                                        </p>

                                        <!-- end /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/jmarketplace/views/templates/hook/product-list.tpl -->

                                        <div class="product-group-price">

                                            <div class="product-price-and-shipping">
                                                <span itemprop="price" class="price">{{ $product->price }}</span>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="flex space-x-4 justify-between items-center" >


                                        <!-- begin /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/novblockwishlist/novblockwishlist_button.tpl -->

                                        <a class="mx-4" href="#" >
                                            <i class="fa fa-heart"></i>
                                            <span></span>
                                        </a>
                                        <!-- end /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/novblockwishlist/novblockwishlist_button.tpl -->

                                        <a href="#" class="mx-4">
                                            <i class="fa fa-search"></i><span> نظرة سريعة</span>
                                        </a>
                                    </div>

                                </div>

                                <!-- begin modules/novthemeconfig/views/templates/hook/countdown.tpl -->
                                {{--  قوييييييييي مفيده <div class="countdownfree d-flex" data-date="2022/06/24"></div> --}}

                                <!-- end modules/novthemeconfig/views/templates/hook/countdown.tpl -->

                            </div>
                        </div>




                        @endforeach















                    </div>
                </div>
            </div>
        </div>

        <!-- end /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/novpagemanage/views/source/countdown_product.tpl -->

        <!-- begin /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/novpagemanage/views/source/productlist.tpl -->

        <div class="nov-productlist  productlist-rows     col-xl-8 col-lg-8 col-md-8 col-xs-12 col-md-12">
            <div class="block block-product clearfix">
                <h2 class="title_block">
                    NEW ARRIVALS hh
                </h2>
                <div class="block_content">
                    <div id="productlist1693764381" class="product_list grid owl-carousel owl-theme multi-row" data-autoplay="false" data-autoplayTimeout="6000" data-loop="false" data-margin="30" data-dots="false" data-nav="true" data-items="2" data-items_large="2" data-items_tablet="3" data-items_mobile="1" >





                        @foreach ($l_products->take(2) as $product)
                        <div class="item  text-center">


                           <div class="d-flex flex-wrap align-items-center product-miniature js-product-miniature item-row first_item" data-id-product="{{ $product->id }}" data-id-product-attribute="{{ $product->id }}" itemscope itemtype="http://schema.org/Product">
                                <div class="col-12 col-w40 pl-0">
                                    <div class="thumbnail-container">

                                        <a  class="thumbnail product-thumbnail two-image">
                                            <img
                                                class="img-fluid image-cover"
                                                src = "{{ $product->img }}"
                                                alt = ""
                                                data-full-size-image-url = "{{ $product->img }}"
                                                width="600"
                                                height="600"
                                            >
                                            <img
                                                class="img-fluid image-secondary"
                                                src = "{{ $product->imgs[0] }}"
                                                alt = ""
                                                data-full-size-image-url = "{{ $product->imgs[0] }}"
                                                width="600"
                                                height="600"
                                            >
                                        </a>

                                    </div>
                                </div>
                                <div class="col-12 col-w60 no-padding">
                                    <div class="product-description">
                                        <div class="product-groups">

                                            <!-- begin modules/novproductcomments/novproductcomments_reviews.tpl -->
                                            <div class="product-comments">
                                                <div class="star_content">

                                                @php
                                                $count=(int)$product->ratingsAvg();
                                            @endphp
                                            @for($i = 1; $i <=$count; $i++)

                                            <div class="star star_on"></div>
                                            @endfor
                                            @for ($i=0; $i<5-$count; $i++)

                                            <div class="star"></div>
                                            @endfor
                                                </div>
                                                <span>{{ $product->ratingsCount()." تقييم" }}</span>
                                            </div>
                                            <!-- end modules/novproductcomments/novproductcomments_reviews.tpl -->

                                            <!-- begin /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/jmarketplace/views/templates/hook/product-list.tpl -->
                                            <p class="seller_name">
                                                <a title="View seller profile" >
                                                    <i class="fa fa-user"></i>
                                                    {{ $product->owner->name }}
                                                    <br/>
                                                    {{ "@".$product->owner->username }}
                                                </a>
                                            </p>

                                            <!-- end /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/jmarketplace/views/templates/hook/product-list.tpl -->


                                            <div class="product-title" itemprop="name"><a >
                                                {{ $product->name }}</a></div>

                                            <div class="product-group-price">

                                                <div class="product-price-and-shipping">



                                                    <span itemprop="price" class="price">{{ $product->price."ر.ي" }}</span>





                                                </div>

                                            </div>
                                        </div>
                                        <div class="product-buttons d-flex justify-content-center" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                            <form action="http://demo.bestprestashoptheme.com/savemart/ar/عربة التسوق" method="post" class="formAddToCart">
                                                <input type="hidden" name="token" value="28add935523ef131c8432825597b9928{{ $product->id }}">
                                                <input type="hidden" name="id_product" value="{{ $product->id }}">
                                                <a class="add-to-cart" href="#" data-button-action="add-to-cart"><i class="novicon-cart"></i><span>أضف للسلة</span></a>
                                            </form>

                                            <!-- begin /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/novblockwishlist/novblockwishlist_button.tpl -->

                                            <a class="addToWishlist wishlistProd_{{ $product->id }}" href="#" data-rel="{{ $product->id }}" onclick="WishlistCart('wishlist_block_list', 'add', '{{ $product->id }}', false, 1); return false;">
                                                <i class="fa fa-heart"></i>
                                                <span>Add to Wishlist</span>
                                            </a>
                                            <!-- end /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/novblockwishlist/novblockwishlist_button.tpl -->

                                            <a href="#" class="quick-view hidden-sm-down" data-link-action="quickview">
                                                <i class="fa fa-search"></i><span> نظرة سريعة</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>







                        </div>

                        @endforeach

                    </div>
                    <div id="productlist1693764381" class="product_list grid owl-carousel owl-theme multi-row" data-autoplay="false" data-autoplayTimeout="6000" data-loop="false" data-margin="30" data-dots="false" data-nav="true" data-items="2" data-items_large="2" data-items_tablet="3" data-items_mobile="1" >





                        @foreach ($l_products->skip(2)->take(2) as $product)
                        <div class="item  text-center">


                           <div class="d-flex flex-wrap align-items-center product-miniature js-product-miniature item-row first_item" data-id-product="{{ $product->id }}" data-id-product-attribute="{{ $product->id }}" itemscope itemtype="http://schema.org/Product">
                                <div class="col-12 col-w40 pl-0">
                                    <div class="thumbnail-container">

                                        <a  class="thumbnail product-thumbnail two-image">
                                            <img
                                                class="img-fluid image-cover"
                                                src = "{{ $product->img }}"
                                                alt = ""
                                                data-full-size-image-url = "{{ $product->img }}"
                                                width="600"
                                                height="600"
                                            >
                                            <img
                                                class="img-fluid image-secondary"
                                                src = "{{ $product->imgs[0] }}"
                                                alt = ""
                                                data-full-size-image-url = "{{ $product->imgs[0] }}"
                                                width="600"
                                                height="600"
                                            >
                                        </a>

                                    </div>
                                </div>
                                <div class="col-12 col-w60 no-padding">
                                    <div class="product-description">
                                        <div class="product-groups">

                                            <!-- begin modules/novproductcomments/novproductcomments_reviews.tpl -->
                                            <div class="product-comments">
                                                <div class="star_content">

                                                @php
                                                $count=(int)$product->ratingsAvg();
                                            @endphp
                                            @for($i = 1; $i <=$count; $i++)

                                            <div class="star star_on"></div>
                                            @endfor
                                            @for ($i=0; $i<5-$count; $i++)

                                            <div class="star"></div>
                                            @endfor
                                                </div>
                                                <span>{{ $product->ratingsCount()." تقييم" }}</span>
                                            </div>
                                            <!-- end modules/novproductcomments/novproductcomments_reviews.tpl -->

                                            <!-- begin /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/jmarketplace/views/templates/hook/product-list.tpl -->
                                            <p class="seller_name">
                                                <a title="View seller profile" >
                                                    <i class="fa fa-user"></i>
                                                    {{ $product->owner->name }}
                                                    <br/>
                                                    {{ "@".$product->owner->username }}
                                                </a>
                                            </p>

                                            <!-- end /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/jmarketplace/views/templates/hook/product-list.tpl -->


                                            <div class="product-title" itemprop="name"><a >
                                                {{ $product->name }}</a></div>

                                            <div class="product-group-price">

                                                <div class="product-price-and-shipping">



                                                    <span itemprop="price" class="price">{{ $product->price."ر.ي" }}</span>





                                                </div>

                                            </div>
                                        </div>
                                        <div class="product-buttons d-flex justify-content-center" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                            <form action="http://demo.bestprestashoptheme.com/savemart/ar/عربة التسوق" method="post" class="formAddToCart">
                                                <input type="hidden" name="token" value="28add935523ef131c8432825597b9928{{ $product->id }}">
                                                <input type="hidden" name="id_product" value="{{ $product->id }}">
                                                <a class="add-to-cart" href="#" data-button-action="add-to-cart"><i class="novicon-cart"></i><span>أضف للسلة</span></a>
                                            </form>

                                            <!-- begin /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/novblockwishlist/novblockwishlist_button.tpl -->

                                            <a class="addToWishlist wishlistProd_{{ $product->id }}" href="#" data-rel="{{ $product->id }}" onclick="WishlistCart('wishlist_block_list', 'add', '{{ $product->id }}', false, 1); return false;">
                                                <i class="fa fa-heart"></i>
                                                <span>Add to Wishlist</span>
                                            </a>
                                            <!-- end /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/novblockwishlist/novblockwishlist_button.tpl -->

                                            <a href="#" class="quick-view hidden-sm-down" data-link-action="quickview">
                                                <i class="fa fa-search"></i><span> نظرة سريعة</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>







                        </div>

                        @endforeach

                    </div>


                    <div id="productlist1693764381" class="product_list grid owl-carousel owl-theme multi-row" data-autoplay="false" data-autoplayTimeout="6000" data-loop="false" data-margin="30" data-dots="false" data-nav="true" data-items="2" data-items_large="2" data-items_tablet="3" data-items_mobile="1" >





                        @foreach ($l_products->skip(4)->take(2) as $product)
                        <div class="item  text-center">


                           <div class="d-flex flex-wrap align-items-center product-miniature js-product-miniature item-row first_item" data-id-product="{{ $product->id }}" data-id-product-attribute="{{ $product->id }}" itemscope itemtype="http://schema.org/Product">
                                <div class="col-12 col-w40 pl-0">
                                    <div class="thumbnail-container">

                                        <a  class="thumbnail product-thumbnail two-image">
                                            <img
                                                class="img-fluid image-cover"
                                                src = "{{ $product->img }}"
                                                alt = ""
                                                data-full-size-image-url = "{{ $product->img }}"
                                                width="600"
                                                height="600"
                                            >
                                            <img
                                                class="img-fluid image-secondary"
                                                src = "{{ $product->imgs[0] }}"
                                                alt = ""
                                                data-full-size-image-url = "{{ $product->imgs[0] }}"
                                                width="600"
                                                height="600"
                                            >
                                        </a>

                                    </div>
                                </div>
                                <div class="col-12 col-w60 no-padding">
                                    <div class="product-description">
                                        <div class="product-groups">

                                            <!-- begin modules/novproductcomments/novproductcomments_reviews.tpl -->
                                            <div class="product-comments">
                                                <div class="star_content">

                                                @php
                                                $count=(int)$product->ratingsAvg();
                                            @endphp
                                            @for($i = 1; $i <=$count; $i++)

                                            <div class="star star_on"></div>
                                            @endfor
                                            @for ($i=0; $i<5-$count; $i++)

                                            <div class="star"></div>
                                            @endfor
                                                </div>
                                                <span>{{ $product->ratingsCount()." تقييم" }}</span>
                                            </div>
                                            <!-- end modules/novproductcomments/novproductcomments_reviews.tpl -->

                                            <!-- begin /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/jmarketplace/views/templates/hook/product-list.tpl -->
                                            <p class="seller_name">
                                                <a title="View seller profile" >
                                                    <i class="fa fa-user"></i>
                                                    {{ $product->owner->name }}
                                                    <br/>
                                                    {{ "@".$product->owner->username }}
                                                </a>
                                            </p>

                                            <!-- end /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/jmarketplace/views/templates/hook/product-list.tpl -->


                                            <div class="product-title" itemprop="name"><a >
                                                {{ $product->name }}</a></div>

                                            <div class="product-group-price">

                                                <div class="product-price-and-shipping">



                                                    <span itemprop="price" class="price">{{ $product->price."ر.ي" }}</span>





                                                </div>

                                            </div>
                                        </div>
                                        <div class="product-buttons d-flex justify-content-center" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                            <form action="http://demo.bestprestashoptheme.com/savemart/ar/عربة التسوق" method="post" class="formAddToCart">
                                                <input type="hidden" name="token" value="28add935523ef131c8432825597b9928{{ $product->id }}">
                                                <input type="hidden" name="id_product" value="{{ $product->id }}">
                                                <a class="add-to-cart" href="#" data-button-action="add-to-cart"><i class="novicon-cart"></i><span>أضف للسلة</span></a>
                                            </form>

                                            <!-- begin /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/novblockwishlist/novblockwishlist_button.tpl -->

                                            <a class="addToWishlist wishlistProd_{{ $product->id }}" href="#" data-rel="{{ $product->id }}" onclick="WishlistCart('wishlist_block_list', 'add', '{{ $product->id }}', false, 1); return false;">
                                                <i class="fa fa-heart"></i>
                                                <span>Add to Wishlist</span>
                                            </a>
                                            <!-- end /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/novblockwishlist/novblockwishlist_button.tpl -->

                                            <a href="#" class="quick-view hidden-sm-down" data-link-action="quickview">
                                                <i class="fa fa-search"></i><span> نظرة سريعة</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>







                        </div>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>

        <!-- end /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/novpagemanage/views/source/productlist.tpl -->
    </div>
</div>
    </section>

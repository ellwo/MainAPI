  <div class="text-center item">
        <div class="border rounded-lg border-dark hover:border-m_primary product-miniature js-product-miniature item-two first_item" data-id-product="{{ $product->id }}"
            data-id-product-attribute="60" itemscope="" itemtype="http://schema.org/Product">
            <div class="product-cat-content">

                <div class="category-title"><a
                        href="#">
                        <span class="dark:text-gray-400">{{ $product->department!=null ? $product->department->name:"" }}</span>
                    </a></div>


                <div class="product-title" itemprop="name"><a
                        href="{{ route($routename,$product) }}">
                       <span class="dark:text-gray-300"> {{ $product->name }}</span></a></div>

            </div>
            <div class="thumbnail-container">

                <a href="{{ route($routename,$product) }}"
                    class="thumbnail product-thumbnail two-image">
                    <img class="img-fluid image-cover"
                        src="{{ $product->img }}"
                        alt=""
                        data-full-size-image-url="{{ $product->img }}"
                        width="600" height="600">
                    <img class="img-fluid image-secondary"
                        src="{{ $product->imgs!=null?$product->imgs[rand(0,(count($product->imgs)-1))]:$product->img }}"
                        alt=""
                        data-full-size-image-url="{{ $product->imgs!=null ? $product->imgs[rand(0,(count($product->imgs)-1))]:$product->img }}"
                        width="600" height="600">
                </a>





            </div>
            <div class="product-description">
                <div class="product-groups">
                    <div class="product-group-price">

                        <div class="product-price-and-shipping">



                            <span itemprop="price" class="price">{{ $product->price }}</span>





                        </div>

                    </div>
                    <div class="product-comments">
                        <div class="star_content">
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
                        <span>0 review</span>
                    </div>
                    <p class="seller_name">
                        <a title="View seller profile"
                            href="#">
                            <i class="fa fa-user"></i>
                            David James
                        </a>
                    </p>

                </div>
                <div class="product-buttons d-flex justify-content-start" itemprop="offers"
                    itemscope="" itemtype="http://schema.org/Offer">
                        <a style="bottom: 23px;" class="p-2 rounded-full bg-m_primary-dark " href="#" >

                            <x-heroicon-o-heart class="w-8 h-8 text-m_primary"/>
                          </a>


                    <a class="addToWishlist wishlistProd_2" href="#" data-rel="2"
                        onclick="WishlistCart('wishlist_block_list', 'add', '2', false, 1); return false;">
                        <i class="fa fa-heart"></i>
                        <span>Add to Wishlist</span>
                    </a>
                    <a href="#" class="quick-view hidden-sm-down" data-link-action="quickview">
                        <i class="fa fa-search"></i><span> نظرة سريعة</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

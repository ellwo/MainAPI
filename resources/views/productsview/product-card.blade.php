  <div class="text-center item">
        <div class="border rounded-lg border-dark hover:border-m_primary product-miniature js-product-miniature item-two first_item" data-id-product="{{ $product->id }}"
            data-id-product-attribute="60" itemscope="" itemtype="http://schema.org/Product">
            <div class="relative flex justify-between w-full p-1">
                <div class="flex   ">
                    <div class=" mx-1 rounded-full">
                        <img class="w-16 h-16 rounded-full"
                            src="{{ $product->owner->avatar }}">
                    </div>
                    <div class="text-right">
                        <a href=" @if ($product->owner_type=="App\Models\Bussinse")
                            {{ route('b.show',$product->owner->username) }}

                            @else
                            {{ route('profile.show',$product->owner->username) }}

                            @endif" class="flex flex-col">
                            <span
                                class="font-bold text-darker  dark:text-white">{{ $product->owner->name }}</span>

                            <span class="font-bold text-blue-900">
                                {{ '@' . $product->owner->username }}
                            </span>
                        </a>
                    </div>

                </div>
            </div>
            <hr>
            <div class="product-cat-content mb-0 mt-2">

                <div class="category-title flex-col flex">


                    <a href="#">
                        <span class="dark:text-gray-400  text-blue-900"><span class="text-darker font-bold">القسم/</span>{{ $product->department!=null ? $product->department->name:"" }}</span>
                    </a>
                </div>


                <div class="product-title mb-0" itemprop="name"><a
                        href="{{ route($routename,$product) }}">
                       <span class="dark:text-gray-300"> {{ $product->name }}</span></a></div>

            </div>
            <div class="thumbnail-container relative">

                <a href="{{ route($routename,$product) }}"
                    class="thumbnail product-thumbnail two-image">
                    <img class="img-fluid image-cover"
                        src="{{ $product->img }}"
                        alt=""
                        data-full-size-image-url="{{ $product->img }}"
                        width="400" height="400">
                    <img class="img-fluid image-secondary"
                        src="{{ $product->imgs!=null?$product->imgs[rand(0,(count($product->imgs)-1))]:$product->img }}"
                        alt=""
                        data-full-size-image-url="{{ $product->imgs!=null ? $product->imgs[rand(0,(count($product->imgs)-1))]:$product->img }}"
                        width="400" height="400">
                </a>



							<span class="px-2 absolute top-4 left-2 @if($product->status==0) bg-green-400 @else bg-m_primary-lighter  @endif rounded-md text-darker">@php
                                echo  $product->status==0?"جديد":"مستخدم";
                            @endphp</span>





            </div>
            <div class="product-description pb-0">
                <div class="product-groups">
                    <div class="product-group-price">

                        <div class="product-price-and-shipping flex relative flex-wrap justify-between" >



                            <span itemprop="price" class="price  text-dark rounded-full p-2 bg-yellow-300 ">{{ $product->price."/ر.ي" }}</span>

                            <span class="text-dark rounded-full p-3 font-bold bg-yellow-300 ">
                                <span class="text-md text-m_primary-onprimary">
                                سنة الصنع
                                </span>
                                {{ $product->year_created }}</span>






                        </div>

                    </div>
                    <div class="product-comments">
                        <div class="star_content flex">
                            @php
                            $count = (int) $product->ratings_value_avg;
                        @endphp
                        @for ($i = 1; $i <= $count; $i++)
                            <x-heroicon-s-star class="h-10 w-10 inline-flex text-m_primary"/>
                        @endfor
                        @for ($i = 0; $i < 5 - $count; $i++)

                        <x-heroicon-o-star class="h-10 w-10 inline-flex text-m_primary"/>
                        @endfor

                        </div>
                    </div>
                    <div class="flex justify-between space-x-2">
                        <div class="h-10 text-darker dark:text-white text-xl font-semibold">
                            {{ $product->vzt()->count()."/زيارة" }}</div>

                    <div class="h-10 text-darker dark:text-white text-xl font-semibold">
                        {{ $product->updated_at}}</div>
                    </div>


                </div>
                <div style="bottom:8rem !important" class="product-buttons d-flex justify-content-start " itemprop="offers"
                    itemscope="" itemtype="http://schema.org/Offer">

                    <a class="addToWishlist wishlistProd_2" href="#" data-rel="2">

                    <div  class="h-full flex justify-center flex-col rounded-full bg-m_primary-dark " >

                            <x-heroicon-o-heart class="w-8 h-8 mx-auto text-m_primary"/>
                    </div>
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

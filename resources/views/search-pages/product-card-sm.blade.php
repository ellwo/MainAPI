<div class="flex flex-row rounded-md border mb-0  product-miniature js-product-miniature  " data-id-product="1"
    data-id-product-attribute="40" itemscope="" itemtype="http://schema.org/Product">


    <div class="col-12 mt-16 col-w27 no-padding">
        <div class="thumbnail-container">

            <a href="{{ route($routename,$product) }}"
                class="thumbnail product-thumbnail two-image">
                <img class="rounded-full border-m_primary-100 border"
                    src="{{ $product->img }}"
                    alt=""
                    data-full-size-image-url="{{ $product->img }}"
                    width="600" height="600">
                <img class="img-fluid image-secondary"
                    src="{{ $product->imgs!=null?$product->imgs[rand(0,count($product->imgs)-1)]:$product->img }}"
                    alt=""
                    data-full-size-image-url="{{ $product->imgs!=null?$product->imgs[rand(0,count($product->imgs)-1)]:$product->img }}"
                    width="600" height="600">
            </a>

        </div>
    </div>
    <div class="col-12 col-w73 no-padding">
        <div class="product-description">
            <div class="product-groups">
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
                    <span>5 review</span>
                </div>
                <p class="">
                    <a title="View seller profile"
                        href="
                        @if ($product->owner_type=="App\Models\Bussinse")
                                       {{ route('b.show',$product->owner->username) }}

                                       @else
                                       {{ route('profile.show',$product->owner->username) }}

                                       @endif">
                        <div class="dark:text-light flex">
                            <span class="flex flex-row space-x-2">
                            <x-heroicon-s-user class="h-6 w-6 text-gray-600"/>
                            {{ $product->owner->name }}
                        </span>
</div>
                    </a>
                </p>



                <div class="product-title" itemprop="name"><a
                        href="{{ route($routename,$product) }}">
                        <div class="dark:text-light">
                        {{$product->name}}</div></a></div>

                <div class="product-group-price">

                    <div class="product-price-and-shipping">



                        <span itemprop="price" class="price"><div class="dark:text-light">{{ $product->price."/ر.ي" }}</div></span>





                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

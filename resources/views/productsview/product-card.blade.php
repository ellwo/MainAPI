  <div class="text-center item">
        <div class="border rounded-lg border-dark hover:border-m_primary product-miniature js-product-miniature item-two first_item" data-id-product="{{ $product->id }}"
            data-id-product-attribute="60" itemscope="" >
            <div class="relative flex justify-between w-full p-1">
                <div class="flex ">
                    <div class="mx-1 rounded-full ">
                        <img class="w-16 h-16 rounded-full"
                            src="{{ $product->owner->avatar }}">
                    </div>
                    <div class="text-right">
                        <a href=" @if ($product->owner_type==="App\Models\Bussinse")
                            {{ route('b.show',$product->owner->username) }}

                            @else
                            {{ route('profile.show',$product->owner->username) }}

                            @endif" class="flex flex-col">
                            <span
                                class="font-bold text-darker dark:text-white">{{ $product->owner->name }}</span>

                            <span class="font-bold text-blue-900">
                                {{ '@' . $product->owner->username }}
                            </span>
                        </a>
                    </div>

                </div>
            </div>
            <hr>
            <div class="mt-2 mb-0 product-cat-content">

                <div class="flex flex-col category-title">


                    <a href="{{ route('search',['dept'=>$product->department_id]) }}">
                        <span class="text-blue-900 dark:text-gray-400"><span class="font-bold text-darker dark:text-light">القسم/</span>{{ $product->department!=null ? $product->department->name:"" }}</span>
                    </a>
                </div>


                <div class="mb-0 product-title" itemprop="name"><a
                        href="{{ route($routename,$product) }}">
                       <span class="dark:text-gray-300"> {{ $product->name }}</span></a></div>

            </div>
            <div class="relative thumbnail-container">

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




                @if (get_class($product)==="App\Models\Product")

                <span class="px-2 absolute top-4 left-2 @if($product->status==0) bg-green-400 @else bg-m_primary-lighter  @endif rounded-md text-darker">@php
                    echo  $product->status==0?"جديد":"مستخدم";
                @endphp</span>
                @endif





            </div>
            <div class="pb-0 product-description">
                <div class="product-groups">
                    <div class="product-group-price">

                        <div class="relative flex flex-wrap justify-between product-price-and-shipping" >



                            <span itemprop="price" class="p-2 bg-yellow-300 rounded-full price text-dark ">{{ $product->price."/ر.ي" }}</span>

                            @if (get_class($product)==="App\Models\Product")

                            <span class="p-3 font-bold bg-yellow-300 rounded-full text-dark ">
                                <span class="text-md text-m_primary-onprimary">
                                سنة الصنع
                                </span>
                                {{ $product->year_created }}</span>
                                @else
                                <span class="p-3 font-bold bg-yellow-300 rounded-full text-dark ">
                                    <span class="text-md text-m_primary-onprimary">
                        المدة
                                    </span>
                                    {{ $product->how_long }}</span>

                                @endif






                        </div>

                    </div>
                    <div class="product-comments">
                        <div class="flex star_content">
                            @php
                            $count = (int) $product->ratings_value_avg;
                        @endphp
                        @for ($i = 1; $i <= $count; $i++)
                            <x-heroicon-s-star class="inline-flex w-10 h-10 text-m_primary"/>
                        @endfor
                        @for ($i = 0; $i < 5 - $count; $i++)

                        <x-heroicon-o-star class="inline-flex w-10 h-10 text-m_primary"/>
                        @endfor

                        </div>
                    </div>
                    <div class="flex justify-between space-x-2">
                        <div class="h-10 text-xl font-semibold text-darker dark:text-white">
                            {{ $product->vzt()->count()."/زيارة" }}</div>

                    <div class="h-10 text-xl font-semibold text-darker dark:text-white">
                        {{ $product->updated_at}}</div>
                    </div>


                </div>
                <div style="bottom:10rem !important" class="product-buttons d-flex justify-content-start " itemprop="offers"
                    itemscope="" itemtype="http://schema.org/Offer">

                    <div class="flex flex-col justify-center p-2 rounded-full h-14 w-14 dark:bg-white bg-m_primary-dark">
                        @livewire('cart.add-to-cart-button', ['p' => $product,'routename'=>$routename=="product.show"?'product.show':'service.show'], key(time()))
                    </div>

                    <div class="flex flex-col justify-center p-2 rounded-full h-14 w-14 dark:bg-white bg-m_primary-dark">
                        @livewire('wishlist.add-to-wishlist-button', ['p' => $product,'routename'=>$routename=="product.show"?'product.show':'service.show'], key(time()))
                    </div>

                    <a href="{{ route('search',['dept'=>$product->department_id,'search'=>$product->name]) }}"  class="m-1 " >

                    <div  class="flex flex-col justify-center h-full p-2 rounded-full dark:bg-white bg-m_primary-dark " >
                        <x-heroicon-o-search class="w-8 h-8 mx-auto text-m_primary"/>
                </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
